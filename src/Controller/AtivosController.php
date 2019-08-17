<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;

/**
 * Ativos Controller
 *
 * @property \App\Model\Table\AtivosTable $Ativos
 *
 * @method \App\Model\Entity\Ativo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AtivosController extends AppController
{

    public function isAuthorized($user){
        $action = $this->request->getParam('action');
        //por enquanto libera todas ações para quem estiver logado
        if (in_array($action, ['add', 'edit', 'index', 'view', 'dashboard', 'arquivo', 'vender'])) {
            return true;
        }
        return false;
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Titulos', 'Users']
        ];
        $ativos = $this->paginate($this->Ativos);

        $this->set(compact('ativos'));
    }

    public function dashboard(){
        $ativos = $this->Ativos->find()
            ->where(['Ativos.user_id' => $this->Auth->user('id'), 'dt_venda is null'])
            ->contain(['Titulos','Carteiras', 'Cotacaos' => ['sort' => ['Cotacaos.data' => 'DESC']]])
            ->order(['carteira_id' => 'asc', 'dt_compra' => 'desc'])
            ->all();
        //converter saldos para moeda padrão do usuário e guardar em cada ativo
        $ativos = $this->converterMoeda($ativos);

        $graficoPorMoeda = $this->somaPorMoeda($ativos);
        $saldo = $this->formatarSaldos($this->calcularSaldo($ativos));
        $pieGeralLabels = $this->arrayLabels($ativos);
        $pieGeralValores = $this->arrayValores($ativos);
        $somaPorTipo = $this->somaPorTipo();
        $somaPorCarteira = $this->somaPorCarteira();
        $this->set(compact('ativos', 'saldo', 'pieGeralLabels', 'pieGeralValores', 'graficoPorMoeda', 
        'somaPorTipo', 'somaPorCarteira'));
    }

    /**
     * Exibe ativos já vendidos.
     * @since 20190121
     */
    public function arquivo(){
        $ativos = $this->Ativos->find()
            ->where(['Ativos.user_id' => $this->Auth->user('id'), 'dt_venda is not null'])
            ->contain(['Titulos','Carteiras', 'Cotacaos' => ['sort' => ['Cotacaos.data' => 'DESC']]])
            ->order(['carteira_id' => 'asc', 'dt_compra' => 'desc'])
            ->all();
        $this->set(compact('ativos'));
    }

    /**
     * Pega a moeda padrão e gera saldo para todos ativos naquela moeda padrão.
     * @since 20190121
     */
    private function converterMoeda($ativos){
        //pegar moeda do usuário
        $moedaPadrao = $this->Auth->user('moeda');
        $this->loadModel('IndiceCotacaos');
        
        foreach ($ativos as $ativo) {
            //se moedaPadrao !== moeda do ativo->titulo,
            if($moedaPadrao !== $ativo->titulo->moeda){
                $cotacao = $this->cotacaoMaisRecenteEmReal($ativo->titulo->moeda);
                if($cotacao){
                    $ativo->saldoMoeda = $ativo->saldoSemMoeda * $cotacao;
                }
            } else{
                //else $ativo->saldoMoeda = $ativo->saldo
                $ativo->saldoMoeda = $ativo->saldoSemMoeda;
            }
        }
        return $ativos;
    }

    /**
     * Pegar a cotação mais recente do índice $moeda (em real)
     * @since 20190713
     */
    private function cotacaoMaisRecenteEmReal($moeda){
        $cotacao = $this->IndiceCotacaos->find()->contain(['Indices'])->where([
            'Indices.nome' => $moeda.' (em real)',
            'IndiceCotacaos.created <=' => Time::now()
            ])->order(['IndiceCotacaos.created' => 'DESC'])->first();
        if($cotacao)
            return $cotacao->valor;
        return 0;
    }

    /**
     * Retorna o saldo do usuário por tipo de título.
     * @author Braulio
     * @since 20190115
     */
    private function somaPorTipo(){
        $cotacaoDolar = $this->cotacaoMaisRecenteEmReal('dolar');
        $connection = ConnectionManager::get('default');
        $results = $connection->execute(
        'select consulta.descricao, SUM(consulta.saldoatual) as saldoatual
        from 
        (
        select u.id, tt.descricao, t.nome, if(t.moeda = \'dolar\', (cotacaoatual.valor * a.quantidade) * '.$cotacaoDolar.', (cotacaoatual.valor * a.quantidade)) as saldoatual
        from tipo_titulos tt
        join titulos t
          on tt.id = t.tipo_titulo_id
        join ativos a
          on t.id = a.titulo_id
        join users u
          on u.id = a.user_id
        join
            (select c.ativo_id, c.valor from cotacaos c
            Join
            (
              select ativo_id, max(data) as maxdata
              from cotacaos
              group by ativo_id
            ) maxdtct
            on c.data = maxdtct.maxdata
                and c.ativo_id = maxdtct.ativo_id) cotacaoatual
          on cotacaoatual.ativo_id = a.id
        where a.user_id = \''.$this->Auth->user('id').'\' 
        and a.dt_venda is null
        
        ) consulta
        group by consulta.descricao'
        
        )->fetchAll('assoc');
        return $results;
    }

    /**
     * Retorna o saldo do usuário por carteira.
     * @since 20190115
     */
    private function somaPorCarteira(){
        $cotacaoDolar = $this->cotacaoMaisRecenteEmReal('dolar');
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('select consulta.cartnome, SUM(consulta.saldoatual) as saldoatual
        from 
        (
        select u.id, cart.nome as cartnome, t.nome, if(t.moeda = \'dolar\', (cotacaoatual.valor * a.quantidade) * '.$cotacaoDolar.', (cotacaoatual.valor * a.quantidade)) as saldoatual
        from carteiras cart
        join ativos a
          on cart.id = a.carteira_id
        join titulos t
          on a.titulo_id = t.id
        join users u
          on u.id = a.user_id
        join
            (select c.ativo_id, c.valor from cotacaos c
            Join
            (
              select ativo_id, max(data) as maxdata
              from cotacaos
              group by ativo_id
            ) maxdtct
            on c.data = maxdtct.maxdata
                and c.ativo_id = maxdtct.ativo_id) cotacaoatual
          on cotacaoatual.ativo_id = a.id
        where a.user_id = \''.$this->Auth->user('id').'\'  
        and a.dt_venda is null) consulta
        group by consulta.cartnome')->fetchAll('assoc');
        return $results;
    }
    /**
     * Retorna um array contendo o nome da moeda e a soma do valor em carteira para aquela moeda
     * @since 20190112
     */
    private function somaPorMoeda($ativos){
        $retorno = [];
        foreach($ativos as $at){
            if(!isset($at->dt_venda) && sizeof($at->cotacaos)>0){
                if(!array_key_exists($at->titulo->moeda, $retorno)){
                    $retorno[$at->titulo->moeda] = $at->saldoSemMoeda;
                }else{
                    $retorno[$at->titulo->moeda]+= $at->saldoSemMoeda;
                }
            }
        }
        return $retorno;
    }

    private function arrayLabels($ativos){
        $ret = [];
        foreach($ativos as $atv){
            if(!isset($atv->dt_venda)){
                array_push($ret, $atv->titulo->nome);
            }
        }
        return $ret;
    }    
    private function arrayValores($ativos){
        $ret = [];
        foreach($ativos as $atv){
            if(!isset($atv->dt_venda)){
                array_push($ret, $atv->saldoMoeda);
            }
        }
        return $ret;
    }

    private function calcularSaldo($ativos){
        $retorno = [];
        //gerar saldos por moeda
        foreach($ativos as $atv){
            //apenas calcular o saldo do que não tiver sido vendido ainda, ou seja, o que estiver na carteira
            if(!isset($atv->dt_venda)){
                $sld = explode(' ',$atv->saldo);
                if(array_key_exists($sld[0], $retorno)){
                    $retorno[$sld[0]]+= $sld[1];
                }else{
                    $retorno[$sld[0]]= $sld[1];
                }
            }
        }
        //gerar saldo total
        $retorno['total'] = 0;
        foreach($ativos as $atv){
            if($atv->saldoMoeda){
                $retorno['total']+= $atv->saldoMoeda;
            }
        }

        return $retorno;
    }

    private function formatarSaldos($saldos){
        $retorno = '';
        foreach($saldos as $moeda => $sal){
            if(strlen($retorno)>0) $retorno .=', ';
            $retorno .= $this->formatarMoeda($moeda).' '.$sal;
        }
        return $retorno;
    }

    /**
     * Gatinho simples para exibir moedas de modo mais belo, quando possível
     * @since 20190624
     */
    private function formatarMoeda($mo){
        if($mo==='dolar') return 'US$';
        if($mo==='real') return 'R$';
        if($mo==='total') return 'Total R$';
        return $mo;
    }

    /**
     * View method
     *
     * @param string|null $id Ativo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ativo = $this->Ativos->get($id, [
            'contain' => [
                'Titulos', 
                'Users', 
                'Carteiras',
                'Cotacaos' => ['sort' => ['Cotacaos.data' => 'DESC']], 
                'Operacaos' => ['sort' => ['Operacaos.created' => 'DESC']], 
                'Proventos' => ['sort' => ['Proventos.created' => 'DESC']]
            ]
        ]);

        $this->set('ativo', $ativo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ativo = $this->Ativos->newEntity();
        if ($this->request->is('post')) {
            $ativo = $this->Ativos->patchEntity($ativo, $this->request->getData());
            $ativo->user_id = $this->Auth->user('id');
            $operacaoInicial = $this->Ativos->Operacaos->newEntity();
            $operacaoInicial->tipo = 1;
            $operacaoInicial->quantidade = $ativo->quantidade;
            $ativo->operacaos = array();
            array_push($ativo->operacaos, $operacaoInicial);
            if ($this->Ativos->save($ativo)) {
                $this->Flash->success(__('The ativo has been saved.'));

                return $this->redirect(['action' => 'dashboard']);
            }
            $this->Flash->error(__('The ativo could not be saved. Please, try again.'));
        }
        $titulos = $this->Ativos->Titulos->find('list', ['conditions' => ['OR' => [
            ['user_id is null'],
            ['user_id' => $this->Auth->user('id')]
        ]]]);
        $carteiras = $this->Ativos->Carteiras->find('list', ['conditions' => ['user_id' => $this->Auth->user('id')]]);
        //$this->Auth->user('id')
        $users = $this->Ativos->Users->find('list', ['limit' => 200]);
        $this->set(compact('ativo', 'titulos', 'users', 'carteiras'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ativo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ativo = $this->Ativos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ativo = $this->Ativos->patchEntity($ativo, $this->request->getData());
            if ($this->Ativos->save($ativo)) {
                $this->Flash->success(__('The ativo has been saved.'));

                return $this->redirect(['action' => 'dashboard']);
            }
            $this->Flash->error(__('The ativo could not be saved. Please, try again.'));
        }
        $titulos = $this->Ativos->Titulos->find('list', ['conditions' => ['OR' => [
            ['user_id is null'],
            ['user_id' => $this->Auth->user('id')]
        ]]]);
        $carteiras = $this->Ativos->Carteiras->find('list', ['conditions' => ['user_id' => $this->Auth->user('id')]]);
        $users = $this->Ativos->Users->find('list', ['limit' => 200]);
        $this->set(compact('ativo', 'titulos', 'users', 'carteiras'));
    }

    public function vender($id){
        $ativo = $this->Ativos->get($id);
        $ativo->dt_venda = Time::now();
        if ($this->Ativos->save($ativo)) {
            $this->Flash->success('O ativo foi vendido!');
            return $this->redirect(['action' => 'dashboard']);
        }
        $this->Flash->error('Houve um erro e o ativo não foi vendido. Tente novamente.');
    }

    /**
     * Delete method
     *
     * @param string|null $id Ativo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ativo = $this->Ativos->get($id);
        if ($this->Ativos->delete($ativo)) {
            $this->Flash->success(__('The ativo has been deleted.'));
        } else {
            $this->Flash->error(__('The ativo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'dashboard']);
    }*/
}

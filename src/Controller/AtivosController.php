<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

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
        if (in_array($action, ['add', 'edit', 'index', 'delete', 'view', 'dashboard'])) {
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
        $graficoPorMoeda = $this->somaPorMoeda($ativos);
        $saldo = $this->formatarSaldos($this->calcularSaldo($ativos));
        $pieGeralLabels = $this->arrayLabels($ativos);
        $pieGeralValores = $this->arrayValores($ativos);
        $this->set(compact('ativos', 'saldo', 'pieGeralLabels', 'pieGeralValores', 'graficoPorMoeda'));
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
                array_push($ret, $atv->titulo->nome.' ('.$atv->titulo->moeda.')');
            }
        }
        return $ret;
    }    
    private function arrayValores($ativos){
        $ret = [];
        foreach($ativos as $atv){
            if(!isset($atv->dt_venda)){
                array_push($ret, $atv->saldoSemMoeda);
            }
        }
        return $ret;
    }

    private function calcularSaldo($ativos){
        $retorno = [];
        foreach($ativos as $atv){
            if(!isset($atv->dt_venda)){
                $sld = explode(' ',$atv->saldo);
                if(array_key_exists($sld[0], $retorno)){
                    $retorno[$sld[0]]+= $sld[1];
                }else{
                    $retorno[$sld[0]]= $sld[1];
                }
            }
        }
        return $retorno;
    }

    private function formatarSaldos($saldos){
        $retorno = '';
        foreach($saldos as $moeda => $sal){
            if(strlen($retorno)>0) $retorno .=', ';
            $retorno .= $moeda.' '.$sal;
        }
        return $retorno;
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

    /**
     * Delete method
     *
     * @param string|null $id Ativo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ativo = $this->Ativos->get($id);
        if ($this->Ativos->delete($ativo)) {
            $this->Flash->success(__('The ativo has been deleted.'));
        } else {
            $this->Flash->error(__('The ativo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'dashboard']);
    }
}

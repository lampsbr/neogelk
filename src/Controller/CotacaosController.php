<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Http\Client;
use Cake\Core\Configure;
use Cake\Log\Log;

/**
 * Cotacaos Controller
 *
 * @property \App\Model\Table\CotacaosTable $Cotacaos
 *
 * @method \App\Model\Entity\Cotacao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CotacaosController extends AppController
{

    public function isAuthorized($user){
        $action = $this->request->getParam('action');
        //por enquanto libera todas ações para quem estiver logado
        if (in_array($action, ['add', 'quickadd', 'edit', 'index', 'delete', 'view', 'obtercotacao'])) {
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
            'contain' => ['Ativos' => ['Titulos']]
        ];
        $cotacaos = $this->paginate($this->Cotacaos);

        $this->set(compact('cotacaos'));
    }

    /**
     * View method
     *
     * @param string|null $id Cotacao id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cotacao = $this->Cotacaos->get($id, [
            'contain' => ['Ativos']
        ]);

        $this->set('cotacao', $cotacao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cotacao = $this->Cotacaos->newEntity();
        if ($this->request->is('post')) {
            $cotacao = $this->Cotacaos->patchEntity($cotacao, $this->request->getData());
            if ($this->Cotacaos->save($cotacao)) {
                $this->Flash->success(__('The cotacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cotacao could not be saved. Please, try again.'));
        }
        $ativos = $this->Cotacaos->Ativos->find('list', ['keyField' => 'id', 'valueField' => 'titulo.nome'])->contain(['Titulos']);
        $this->set(compact('cotacao', 'ativos'));
    }

    public function quickadd(){
        $cotacao = $this->Cotacaos->newEntity();
        $dados = $this->request->getData();
        $agora = Time::now();
        $dados['data'] = [
            'year' => $agora->year,
            'month' => $agora->month,
            'day' => $agora->day,
            'hour' => $agora->hour,
            'minute' => $agora->minute
        ];
        if ($this->request->is('post')) {
            $cotacao = $this->Cotacaos->patchEntity($cotacao, $dados);
            if ($this->Cotacaos->save($cotacao)) {
                $this->Flash->success('A nova cotação foi salva!');
            } else{
                $this->Flash->error('Houve algum problema ao salvar a cotação. Você colocou mesmo um valor decimal?');
            }
            return $this->redirect(['controller' => 'ativos', 'action' => 'dashboard']);
        }
    }

    private function tratarticker($ticker){
        if(strpos($ticker, '/')){
            $ticker = substr($ticker, (strpos($ticker, '/')+1));
        }        
        if(strpos($ticker, ':')){
            $ticker = substr($ticker, (strpos($ticker, ':')+1));
        }
        return trim($ticker);
    }

    public function obtercotacao($idAtivo){
        $ativo = $this->Cotacaos->Ativos->get($idAtivo, ['contain' => ['Titulos']]);
        $chave_api = env('CHAVE_ALPHAVANTAGE', 'DEMO');
        $ticker = $this->tratarticker($ativo->titulo->ticker);
        $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=$ticker&apikey=$chave_api";
        $http = new Client();
        $response = $http->get($url);
        if($response->isOk()){
            $jsonResp = $response->getJson();
        
            //if is array and has 'price' value, save it and flash success.
            if(is_array($jsonResp['Global Quote']) && isset($jsonResp['Global Quote']['05. price'])){
                $cotacao = $this->Cotacaos->newEntity();
                $cotacao->ativo_id = $ativo->id;
                $cotacao->data = Time::now();
                $cotacao->valor = $jsonResp['Global Quote']['05. price'];
                if($this->Cotacaos->save($cotacao)){
                    $this->Flash->success('Salvamos a cotação mais recente do ativo!');
                }else{
                    Log::write('error', $cotacao);
                    $this->Flash->error('Deu ruim e o auto-cotação não foi salva');
                }
            }else{
                Log::write('error', $jsonResp);
                $this->Flash->error('Deu ruim e o auto-cotação não funcionou. Erro: '+$response->getBody());
            }
        } else{
            Log::write('error', $response);
            $this->Flash->error('Deu ruim e o auto-cotação não funcionou.');
        }
        return $this->redirect($this->referer());
    }

    /**
     * Edit method
     *
     * @param string|null $id Cotacao id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cotacao = $this->Cotacaos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cotacao = $this->Cotacaos->patchEntity($cotacao, $this->request->getData());
            if ($this->Cotacaos->save($cotacao)) {
                $this->Flash->success(__('The cotacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cotacao could not be saved. Please, try again.'));
        }
        $ativos = $this->Cotacaos->Ativos->find('list', ['limit' => 200]);
        $this->set(compact('cotacao', 'ativos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cotacao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cotacao = $this->Cotacaos->get($id);
        if ($this->Cotacaos->delete($cotacao)) {
            $this->Flash->success(__('The cotacao has been deleted.'));
        } else {
            $this->Flash->error(__('The cotacao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;

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
            ->where(['Ativos.user_id' => $this->Auth->user('id')])
            ->contain(['Titulos', 'Cotacaos' => ['sort' => ['Cotacaos.data' => 'DESC']]])
            ->order(['dt_venda' => 'asc', 'dt_compra' => 'desc'])
            ->all();
        $this->set(compact('ativos'));
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
            'contain' => ['Titulos', 'Users', 'Cotacaos' => ['sort' => ['Cotacaos.data' => 'DESC']]]
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
            if ($this->Ativos->save($ativo)) {
                $this->Flash->success(__('The ativo has been saved.'));

                return $this->redirect(['action' => 'dashboard']);
            }
            $this->Flash->error(__('The ativo could not be saved. Please, try again.'));
        }
        $titulos = $this->Ativos->Titulos->find('list', ['limit' => 200]);
        $users = $this->Ativos->Users->find('list', ['limit' => 200]);
        $this->set(compact('ativo', 'titulos', 'users'));
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
        $titulos = $this->Ativos->Titulos->find('list', ['limit' => 200]);
        $users = $this->Ativos->Users->find('list', ['limit' => 200]);
        $this->set(compact('ativo', 'titulos', 'users'));
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

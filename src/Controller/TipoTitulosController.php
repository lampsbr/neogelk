<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoTitulos Controller
 *
 * @property \App\Model\Table\TipoTitulosTable $TipoTitulos
 *
 * @method \App\Model\Entity\TipoTitulo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoTitulosController extends AppController
{

    public function isAuthorized($user){
        $action = $this->request->getParam('action');
        //por enquanto libera todas ações para quem estiver logado
        if (in_array($action, ['add', 'edit', 'index', 'delete', 'view'])) {
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
            'contain' => ['Users']
        ];
        $tipoTitulos = $this->paginate($this->TipoTitulos);

        $this->set(compact('tipoTitulos'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Titulo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoTitulo = $this->TipoTitulos->get($id, [
            'contain' => ['Users', 'Titulos']
        ]);

        $this->set('tipoTitulo', $tipoTitulo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoTitulo = $this->TipoTitulos->newEntity();
        if ($this->request->is('post')) {
            $tipoTitulo = $this->TipoTitulos->patchEntity($tipoTitulo, $this->request->getData());
            $tipoTitulo->user_id = $this->Auth->user('id');
            if ($this->TipoTitulos->save($tipoTitulo)) {
                $this->Flash->success(__('The tipo titulo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo titulo could not be saved. Please, try again.'));
        }
        $users = $this->TipoTitulos->Users->find('list', ['limit' => 200]);
        $this->set(compact('tipoTitulo', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Titulo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoTitulo = $this->TipoTitulos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoTitulo = $this->TipoTitulos->patchEntity($tipoTitulo, $this->request->getData());
            if ($this->TipoTitulos->save($tipoTitulo)) {
                $this->Flash->success(__('The tipo titulo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo titulo could not be saved. Please, try again.'));
        }
        $users = $this->TipoTitulos->Users->find('list', ['limit' => 200]);
        $this->set(compact('tipoTitulo', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Titulo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoTitulo = $this->TipoTitulos->get($id);
        if ($this->TipoTitulos->delete($tipoTitulo)) {
            $this->Flash->success(__('The tipo titulo has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo titulo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

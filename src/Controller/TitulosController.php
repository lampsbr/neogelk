<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Titulos Controller
 *
 * @property \App\Model\Table\TitulosTable $Titulos
 *
 * @method \App\Model\Entity\Titulo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TitulosController extends AppController
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
            'contain' => ['TipoTitulos', 'Users']
        ];
        $titulos = $this->paginate($this->Titulos);

        $this->set(compact('titulos'));
    }

    /**
     * View method
     *
     * @param string|null $id Titulo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $titulo = $this->Titulos->get($id, [
            'contain' => ['TipoTitulos', 'Users', 'Ativos']
        ]);

        $this->set('titulo', $titulo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $titulo = $this->Titulos->newEntity();
        if ($this->request->is('post')) {
            $titulo = $this->Titulos->patchEntity($titulo, $this->request->getData());
            if ($this->Titulos->save($titulo)) {
                $this->Flash->success(__('The titulo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The titulo could not be saved. Please, try again.'));
        }
        $tipoTitulos = $this->Titulos->TipoTitulos->find('list', ['limit' => 200]);
        $users = $this->Titulos->Users->find('list', ['limit' => 200]);
        $this->set(compact('titulo', 'tipoTitulos', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Titulo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $titulo = $this->Titulos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $titulo = $this->Titulos->patchEntity($titulo, $this->request->getData());
            if ($this->Titulos->save($titulo)) {
                $this->Flash->success(__('The titulo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The titulo could not be saved. Please, try again.'));
        }
        $tipoTitulos = $this->Titulos->TipoTitulos->find('list', ['limit' => 200]);
        $users = $this->Titulos->Users->find('list', ['limit' => 200]);
        $this->set(compact('titulo', 'tipoTitulos', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Titulo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $titulo = $this->Titulos->get($id);
        if ($this->Titulos->delete($titulo)) {
            $this->Flash->success(__('The titulo has been deleted.'));
        } else {
            $this->Flash->error(__('The titulo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

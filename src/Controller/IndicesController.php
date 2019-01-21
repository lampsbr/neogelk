<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Indices Controller
 *
 * @property \App\Model\Table\IndicesTable $Indices
 *
 * @method \App\Model\Entity\Index[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IndicesController extends AppController
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
        $indices = $this->paginate($this->Indices);

        $this->set(compact('indices'));
    }

    /**
     * View method
     *
     * @param string|null $id Index id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $index = $this->Indices->get($id, [
            'contain' => []
        ]);

        $this->set('index', $index);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $index = $this->Indices->newEntity();
        if ($this->request->is('post')) {
            $index = $this->Indices->patchEntity($index, $this->request->getData());
            if ($this->Indices->save($index)) {
                $this->Flash->success(__('The index has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The index could not be saved. Please, try again.'));
        }
        $this->set(compact('index'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Index id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $index = $this->Indices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $index = $this->Indices->patchEntity($index, $this->request->getData());
            if ($this->Indices->save($index)) {
                $this->Flash->success(__('The index has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The index could not be saved. Please, try again.'));
        }
        $this->set(compact('index'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Index id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $index = $this->Indices->get($id);
        if ($this->Indices->delete($index)) {
            $this->Flash->success(__('The index has been deleted.'));
        } else {
            $this->Flash->error(__('The index could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

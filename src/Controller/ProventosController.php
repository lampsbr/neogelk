<?php
namespace App\Controller;

use App\Controller\AppController;

class ProventosController extends AppController{

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
            'contain' => ['Ativos']
        ];
        $proventos = $this->paginate($this->Proventos);

        $this->set(compact('proventos'));
    }

    /**
     * View method
     *
     * @param string|null $id Provento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $provento = $this->Proventos->get($id, [
            'contain' => ['Ativos']
        ]);

        $this->set('provento', $provento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $provento = $this->Proventos->newEntity();
        if ($this->request->is('post')) {
            $provento = $this->Proventos->patchEntity($provento, $this->request->getData());
            if ($this->Proventos->save($provento)) {
                $this->Flash->success(__('The provento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provento could not be saved. Please, try again.'));
        }
        $ativos = $this->Proventos->Ativos->find('list', ['limit' => 200]);
        $this->set(compact('provento', 'ativos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Provento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $provento = $this->Proventos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $provento = $this->Proventos->patchEntity($provento, $this->request->getData());
            if ($this->Proventos->save($provento)) {
                $this->Flash->success(__('The provento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provento could not be saved. Please, try again.'));
        }
        $ativos = $this->Proventos->Ativos->find('list', ['limit' => 200]);
        $this->set(compact('provento', 'ativos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Provento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $provento = $this->Proventos->get($id);
        if ($this->Proventos->delete($provento)) {
            $this->Flash->success(__('The provento has been deleted.'));
        } else {
            $this->Flash->error(__('The provento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

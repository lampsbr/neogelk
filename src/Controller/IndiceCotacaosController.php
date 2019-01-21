<?php
namespace App\Controller;

use App\Controller\AppController;

class IndiceCotacaosController extends AppController{

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
            'contain' => ['Indices']
        ];
        $indiceCotacaos = $this->paginate($this->IndiceCotacaos);

        $this->set(compact('indiceCotacaos'));
    }

    /**
     * View method
     *
     * @param string|null $id Indice Cotacao id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $indiceCotacao = $this->IndiceCotacaos->get($id, [
            'contain' => ['Indices']
        ]);

        $this->set('indiceCotacao', $indiceCotacao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $indiceCotacao = $this->IndiceCotacaos->newEntity();
        if ($this->request->is('post')) {
            $indiceCotacao = $this->IndiceCotacaos->patchEntity($indiceCotacao, $this->request->getData());
            if ($this->IndiceCotacaos->save($indiceCotacao)) {
                $this->Flash->success(__('The indice cotacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The indice cotacao could not be saved. Please, try again.'));
        }
        $indices = $this->IndiceCotacaos->Indices->find('list', ['limit' => 200]);
        $this->set(compact('indiceCotacao', 'indices'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Indice Cotacao id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $indiceCotacao = $this->IndiceCotacaos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $indiceCotacao = $this->IndiceCotacaos->patchEntity($indiceCotacao, $this->request->getData());
            if ($this->IndiceCotacaos->save($indiceCotacao)) {
                $this->Flash->success(__('The indice cotacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The indice cotacao could not be saved. Please, try again.'));
        }
        $indices = $this->IndiceCotacaos->Indices->find('list', ['limit' => 200]);
        $this->set(compact('indiceCotacao', 'indices'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Indice Cotacao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $indiceCotacao = $this->IndiceCotacaos->get($id);
        if ($this->IndiceCotacaos->delete($indiceCotacao)) {
            $this->Flash->success(__('The indice cotacao has been deleted.'));
        } else {
            $this->Flash->error(__('The indice cotacao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

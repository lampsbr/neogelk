<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Carteiras Controller
 *
 * @property \App\Model\Table\CarteirasTable $Carteiras
 *
 * @method \App\Model\Entity\Carteira[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarteirasController extends AppController
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
        $carteiras = $this->paginate($this->Carteiras);

        $this->set(compact('carteiras'));
    }

    /**
     * View method
     *
     * @param string|null $id Carteira id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carteira = $this->Carteiras->get($id, [
            'contain' => ['Ativos' => ['Titulos']]
        ]);

        $this->set('carteira', $carteira);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carteira = $this->Carteiras->newEntity();
        if ($this->request->is('post')) {
            $carteira = $this->Carteiras->patchEntity($carteira, $this->request->getData());
            $carteira->user_id = $this->Auth->user('id');
            if ($this->Carteiras->save($carteira)) {
                $this->Flash->success(__('The carteira has been saved.'));

                return $this->redirect(['controller' => 'ativos','action' => 'dashboard']);
            }
            $this->Flash->error(__('The carteira could not be saved. Please, try again.'));
        }
        $this->set(compact('carteira'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Carteira id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carteira = $this->Carteiras->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carteira = $this->Carteiras->patchEntity($carteira, $this->request->getData());
            if ($this->Carteiras->save($carteira)) {
                $this->Flash->success(__('The carteira has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carteira could not be saved. Please, try again.'));
        }
        $this->set(compact('carteira'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Carteira id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carteira = $this->Carteiras->get($id);
        if ($this->Carteiras->delete($carteira)) {
            $this->Flash->success(__('The carteira has been deleted.'));
        } else {
            $this->Flash->error(__('The carteira could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

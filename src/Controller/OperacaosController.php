<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Operacaos Controller
 *
 * @property \App\Model\Table\OperacaosTable $Operacaos
 *
 * @method \App\Model\Entity\Operacao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OperacaosController extends AppController
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
            'contain' => ['Ativos']
        ];
        $operacaos = $this->paginate($this->Operacaos);

        $this->set(compact('operacaos'));
    }

    /**
     * View method
     *
     * @param string|null $id Operacao id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operacao = $this->Operacaos->get($id, [
            'contain' => ['Ativos']
        ]);

        $this->set('operacao', $operacao);
    }

    public function add($idAtivo){
        $operacao = $this->Operacaos->newEntity();
        if($idAtivo){
            $ativo = $this->Operacaos->Ativos->get($idAtivo);
            $operacao->ativo_id = $idAtivo;
            $operacao->ativo = $ativo;
        }
        if ($this->request->is('post')) {
            $dados = $this->request->getData();
            $operacao = $this->Operacaos->patchEntity($operacao, $dados);
            $operacao->ativo->quantidade += $operacao->quantidade;
            if ($this->Operacaos->save($operacao)) {
                $this->Flash->success('Operação cadastrada!');
            } else{
                $this->Flash->error('Houve um erro ao cadastrar a operação! Tente novamente, ou então anote o horário e avise a Bruno.');
            }
            return $this->redirect(['controller' => 'ativos', 'action' => 'view', $operacao->ativo_id]);
        }
        $operacao->ativo_id = $idAtivo;
        $this->set(compact('operacao'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Operacao id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operacao = $this->Operacaos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operacao = $this->Operacaos->patchEntity($operacao, $this->request->getData());
            if ($this->Operacaos->save($operacao)) {
                $this->Flash->success(__('The operacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The operacao could not be saved. Please, try again.'));
        }
        $ativos = $this->Operacaos->Ativos->find('list', ['limit' => 200]);
        $this->set(compact('operacao', 'ativos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Operacao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operacao = $this->Operacaos->get($id);
        if ($this->Operacaos->delete($operacao)) {
            $this->Flash->success(__('The operacao has been deleted.'));
        } else {
            $this->Flash->error(__('The operacao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

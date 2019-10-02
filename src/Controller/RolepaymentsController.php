<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rolepayments Controller
 *
 * @property \App\Model\Table\RolepaymentsTable $Rolepayments
 *
 * @method \App\Model\Entity\Rolepayment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolepaymentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $rolepayments = $this->paginate($this->Rolepayments);

        $this->set(compact('rolepayments'));
    }

    /**
     * View method
     *
     * @param string|null $id Rolepayment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rolepayment = $this->Rolepayments->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('rolepayment', $rolepayment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rolepayment = $this->Rolepayments->newEntity();
        if ($this->request->is('post')) {
            $rolepayment = $this->Rolepayments->patchEntity($rolepayment, $this->request->getData());
            if ($this->Rolepayments->save($rolepayment)) {
                $this->Flash->success(__('The rolepayment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rolepayment could not be saved. Please, try again.'));
        }
        $roles = $this->Rolepayments->Roles->find('list', ['limit' => 200]);
        $this->set(compact('rolepayment', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rolepayment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rolepayment = $this->Rolepayments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rolepayment = $this->Rolepayments->patchEntity($rolepayment, $this->request->getData());
            if ($this->Rolepayments->save($rolepayment)) {
                $this->Flash->success(__('The rolepayment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rolepayment could not be saved. Please, try again.'));
        }
        $roles = $this->Rolepayments->Roles->find('list', ['limit' => 200]);
        $this->set(compact('rolepayment', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rolepayment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rolepayment = $this->Rolepayments->get($id);
        if ($this->Rolepayments->delete($rolepayment)) {
            $this->Flash->success(__('The rolepayment has been deleted.'));
        } else {
            $this->Flash->error(__('The rolepayment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

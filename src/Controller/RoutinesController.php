<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Routines Controller
 *
 * @property \App\Model\Table\RoutinesTable $Routines
 *
 * @method \App\Model\Entity\Routine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoutinesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Competitions', 'Users']
        ];
        $routines = $this->paginate($this->Routines);

        $this->set(compact('routines'));
    }

    /**
     * View method
     *
     * @param string|null $id Routine id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $routine = $this->Routines->get($id, [
            'contain' => ['Competitions', 'Users']
        ]);

        $this->set('routine', $routine);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $routine = $this->Routines->newEntity();
        if ($this->request->is('post')) {
            $routine = $this->Routines->patchEntity($routine, $this->request->getData());
            if ($this->Routines->save($routine)) {
                $this->Flash->success(__('The routine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routine could not be saved. Please, try again.'));
        }
        $competitions = $this->Routines->Competitions->find('list', ['limit' => 200]);
        $users = $this->Routines->Users->find('list', ['limit' => 200]);
        $this->set(compact('routine', 'competitions', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Routine id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $routine = $this->Routines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $routine = $this->Routines->patchEntity($routine, $this->request->getData());
            if ($this->Routines->save($routine)) {
                $this->Flash->success(__('The routine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routine could not be saved. Please, try again.'));
        }
        $competitions = $this->Routines->Competitions->find('list', ['limit' => 200]);
        $users = $this->Routines->Users->find('list', ['limit' => 200]);
        $this->set(compact('routine', 'competitions', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Routine id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $routine = $this->Routines->get($id);
        if ($this->Routines->delete($routine)) {
            $this->Flash->success(__('The routine has been deleted.'));
        } else {
            $this->Flash->error(__('The routine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

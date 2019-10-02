<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Routinegrades Controller
 *
 * @property \App\Model\Table\RoutinegradesTable $Routinegrades
 *
 * @method \App\Model\Entity\Routinegrade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoutinegradesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Routines', 'Users']
        ];
        $routinegrades = $this->paginate($this->Routinegrades);

        $this->set(compact('routinegrades'));
    }

    /**
     * View method
     *
     * @param string|null $id Routinegrade id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $routinegrade = $this->Routinegrades->get($id, [
            'contain' => ['Routines', 'Users']
        ]);

        $this->set('routinegrade', $routinegrade);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $routinegrade = $this->Routinegrades->newEntity();
        if ($this->request->is('post')) {
            $routinegrade = $this->Routinegrades->patchEntity($routinegrade, $this->request->getData());
            if ($this->Routinegrades->save($routinegrade)) {
                $this->Flash->success(__('The routinegrade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routinegrade could not be saved. Please, try again.'));
        }
        $routines = $this->Routinegrades->Routines->find('list', ['limit' => 200]);
        $users = $this->Routinegrades->Users->find('list', ['limit' => 200]);
        $this->set(compact('routinegrade', 'routines', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Routinegrade id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $routinegrade = $this->Routinegrades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $routinegrade = $this->Routinegrades->patchEntity($routinegrade, $this->request->getData());
            if ($this->Routinegrades->save($routinegrade)) {
                $this->Flash->success(__('The routinegrade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routinegrade could not be saved. Please, try again.'));
        }
        $routines = $this->Routinegrades->Routines->find('list', ['limit' => 200]);
        $users = $this->Routinegrades->Users->find('list', ['limit' => 200]);
        $this->set(compact('routinegrade', 'routines', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Routinegrade id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $routinegrade = $this->Routinegrades->get($id);
        if ($this->Routinegrades->delete($routinegrade)) {
            $this->Flash->success(__('The routinegrade has been deleted.'));
        } else {
            $this->Flash->error(__('The routinegrade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

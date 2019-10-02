<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Routinediscounts Controller
 *
 * @property \App\Model\Table\RoutinediscountsTable $Routinediscounts
 *
 * @method \App\Model\Entity\Routinediscount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoutinediscountsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Routines', 'Users', 'Competitionrules']
        ];
        $routinediscounts = $this->paginate($this->Routinediscounts);

        $this->set(compact('routinediscounts'));
    }

    /**
     * View method
     *
     * @param string|null $id Routinediscount id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $routinediscount = $this->Routinediscounts->get($id, [
            'contain' => ['Routines', 'Users', 'Competitionrules']
        ]);

        $this->set('routinediscount', $routinediscount);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $routinediscount = $this->Routinediscounts->newEntity();
        if ($this->request->is('post')) {
            $routinediscount = $this->Routinediscounts->patchEntity($routinediscount, $this->request->getData());
            if ($this->Routinediscounts->save($routinediscount)) {
                $this->Flash->success(__('The routinediscount has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routinediscount could not be saved. Please, try again.'));
        }
        $routines = $this->Routinediscounts->Routines->find('list', ['limit' => 200]);
        $users = $this->Routinediscounts->Users->find('list', ['limit' => 200]);
        $competitionrules = $this->Routinediscounts->Competitionrules->find('list', ['limit' => 200]);
        $this->set(compact('routinediscount', 'routines', 'users', 'competitionrules'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Routinediscount id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $routinediscount = $this->Routinediscounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $routinediscount = $this->Routinediscounts->patchEntity($routinediscount, $this->request->getData());
            if ($this->Routinediscounts->save($routinediscount)) {
                $this->Flash->success(__('The routinediscount has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The routinediscount could not be saved. Please, try again.'));
        }
        $routines = $this->Routinediscounts->Routines->find('list', ['limit' => 200]);
        $users = $this->Routinediscounts->Users->find('list', ['limit' => 200]);
        $competitionrules = $this->Routinediscounts->Competitionrules->find('list', ['limit' => 200]);
        $this->set(compact('routinediscount', 'routines', 'users', 'competitionrules'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Routinediscount id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $routinediscount = $this->Routinediscounts->get($id);
        if ($this->Routinediscounts->delete($routinediscount)) {
            $this->Flash->success(__('The routinediscount has been deleted.'));
        } else {
            $this->Flash->error(__('The routinediscount could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

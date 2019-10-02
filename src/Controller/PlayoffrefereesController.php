<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Playoffreferees Controller
 *
 * @property \App\Model\Table\PlayoffrefereesTable $Playoffreferees
 *
 * @method \App\Model\Entity\Playoffreferee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlayoffrefereesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Playoffs', 'Users']
        ];
        $playoffreferees = $this->paginate($this->Playoffreferees);

        $this->set(compact('playoffreferees'));
    }

    /**
     * View method
     *
     * @param string|null $id Playoffreferee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $playoffreferee = $this->Playoffreferees->get($id, [
            'contain' => ['Playoffs', 'Users']
        ]);

        $this->set('playoffreferee', $playoffreferee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $playoffreferee = $this->Playoffreferees->newEntity();
        if ($this->request->is('post')) {
            $playoffreferee = $this->Playoffreferees->patchEntity($playoffreferee, $this->request->getData());
            if ($this->Playoffreferees->save($playoffreferee)) {
                $this->Flash->success(__('The playoffreferee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The playoffreferee could not be saved. Please, try again.'));
        }
        $playoffs = $this->Playoffreferees->Playoffs->find('list', ['limit' => 200]);
        $users = $this->Playoffreferees->Users->find('list', ['limit' => 200]);
        $this->set(compact('playoffreferee', 'playoffs', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Playoffreferee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $playoffreferee = $this->Playoffreferees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $playoffreferee = $this->Playoffreferees->patchEntity($playoffreferee, $this->request->getData());
            if ($this->Playoffreferees->save($playoffreferee)) {
                $this->Flash->success(__('The playoffreferee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The playoffreferee could not be saved. Please, try again.'));
        }
        $playoffs = $this->Playoffreferees->Playoffs->find('list', ['limit' => 200]);
        $users = $this->Playoffreferees->Users->find('list', ['limit' => 200]);
        $this->set(compact('playoffreferee', 'playoffs', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Playoffreferee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $playoffreferee = $this->Playoffreferees->get($id);
        if ($this->Playoffreferees->delete($playoffreferee)) {
            $this->Flash->success(__('The playoffreferee has been deleted.'));
        } else {
            $this->Flash->error(__('The playoffreferee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

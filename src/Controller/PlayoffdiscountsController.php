<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Playoffdiscounts Controller
 *
 * @property \App\Model\Table\PlayoffdiscountsTable $Playoffdiscounts
 *
 * @method \App\Model\Entity\Playoffdiscount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlayoffdiscountsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Rules']
        ];
        $playoffdiscounts = $this->paginate($this->Playoffdiscounts);

        $this->set(compact('playoffdiscounts'));
    }

    /**
     * View method
     *
     * @param string|null $id Playoffdiscount id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $playoffdiscount = $this->Playoffdiscounts->get($id, [
            'contain' => ['Users', 'Rules']
        ]);

        $this->set('playoffdiscount', $playoffdiscount);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $playoffdiscount = $this->Playoffdiscounts->newEntity();
        if ($this->request->is('post')) {
            $playoffdiscount = $this->Playoffdiscounts->patchEntity($playoffdiscount, $this->request->getData());
            if ($this->Playoffdiscounts->save($playoffdiscount)) {
                $this->Flash->success(__('The playoffdiscount has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The playoffdiscount could not be saved. Please, try again.'));
        }
        $users = $this->Playoffdiscounts->Users->find('list', ['limit' => 200]);
        $rules = $this->Playoffdiscounts->Rules->find('list', ['limit' => 200]);
        $this->set(compact('playoffdiscount', 'users', 'rules'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Playoffdiscount id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $playoffdiscount = $this->Playoffdiscounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $playoffdiscount = $this->Playoffdiscounts->patchEntity($playoffdiscount, $this->request->getData());
            if ($this->Playoffdiscounts->save($playoffdiscount)) {
                $this->Flash->success(__('The playoffdiscount has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The playoffdiscount could not be saved. Please, try again.'));
        }
        $users = $this->Playoffdiscounts->Users->find('list', ['limit' => 200]);
        $rules = $this->Playoffdiscounts->Rules->find('list', ['limit' => 200]);
        $this->set(compact('playoffdiscount', 'users', 'rules'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Playoffdiscount id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $playoffdiscount = $this->Playoffdiscounts->get($id);
        if ($this->Playoffdiscounts->delete($playoffdiscount)) {
            $this->Flash->success(__('The playoffdiscount has been deleted.'));
        } else {
            $this->Flash->error(__('The playoffdiscount could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

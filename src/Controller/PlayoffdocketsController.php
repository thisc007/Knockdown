<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Playoffdockets Controller
 *
 * @property \App\Model\Table\PlayoffdocketsTable $Playoffdockets
 *
 * @method \App\Model\Entity\Playoffdocket[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlayoffdocketsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Playoffs']
        ];
        $playoffdockets = $this->paginate($this->Playoffdockets);

        $this->set(compact('playoffdockets'));
    }

    /**
     * View method
     *
     * @param string|null $id Playoffdocket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $playoffdocket = $this->Playoffdockets->get($id, [
            'contain' => ['Users', 'Playoffs']
        ]);

        $this->set('playoffdocket', $playoffdocket);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $playoffdocket = $this->Playoffdockets->newEntity();
        if ($this->request->is('post')) {
            $playoffdocket = $this->Playoffdockets->patchEntity($playoffdocket, $this->request->getData());
            if ($this->Playoffdockets->save($playoffdocket)) {
                $this->Flash->success(__('The playoffdocket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The playoffdocket could not be saved. Please, try again.'));
        }
        $users = $this->Playoffdockets->Users->find('list', ['limit' => 200]);
        $playoffs = $this->Playoffdockets->Playoffs->find('list', ['limit' => 200]);
        $this->set(compact('playoffdocket', 'users', 'playoffs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Playoffdocket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $playoffdocket = $this->Playoffdockets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $playoffdocket = $this->Playoffdockets->patchEntity($playoffdocket, $this->request->getData());
            if ($this->Playoffdockets->save($playoffdocket)) {
                $this->Flash->success(__('The playoffdocket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The playoffdocket could not be saved. Please, try again.'));
        }
        $users = $this->Playoffdockets->Users->find('list', ['limit' => 200]);
        $playoffs = $this->Playoffdockets->Playoffs->find('list', ['limit' => 200]);
        $this->set(compact('playoffdocket', 'users', 'playoffs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Playoffdocket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $playoffdocket = $this->Playoffdockets->get($id);
        if ($this->Playoffdockets->delete($playoffdocket)) {
            $this->Flash->success(__('The playoffdocket has been deleted.'));
        } else {
            $this->Flash->error(__('The playoffdocket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

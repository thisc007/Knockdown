<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Championships Controller
 *
 * @property \App\Model\Table\ChampionshipsTable $Championships
 *
 * @method \App\Model\Entity\Championship[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChampionshipsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Associations']
        ];
        $championships = $this->paginate($this->Championships);

        $this->set(compact('championships'));
    }

    /**
     * View method
     *
     * @param string|null $id Championship id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $championship = $this->Championships->get($id, [
            'contain' => ['Associations']
        ]);
        
        $sponsors = TableRegistry::get('sponsors')
                ->find()
                ->select([
                    'id' => 'sponsors.id',
                    'csid' => 'cs.id',
                    'alias' => 'sponsors.alias',
                    'type' => 'cs.type'
                ])
                ->join([
                    'table' => 'championshipsponsors',
                    'alias' => 'cs',
                    'type' => 'inner',
                    'conditions' => 'cs.sponsors_id = sponsors.id'
                ])
                ->where('cs.championships_id = ' . $id);
        
        $competitions = TableRegistry::get('competitions')
                ->find()
                ->select([
                    'id' => 'competitions.id',
                    'name',
                    'type',
                    'ccid' => 'cc.id'
                ])
                ->join([
                    'table' => 'championshipcompetitions',
                    'alias' => 'cc',
                    'type' => 'inner',
                    'conditions' => 'cc.competitions_id = competitions.id'
                ])
                ->where('cc.championships_id = ' . $id);
        $this->set(compact('championship', 'sponsors', 'competitions'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $championship = $this->Championships->newEntity();
        if ($this->request->is('post'))
        {
            $championship = $this->Championships->patchEntity($championship, $this->request->getData());
            $insert = TableRegistry::get('Championships')
                    ->query()
                    ->insert([
                        'associations_id', 'subscriptiondateini', 'subscriptiondateend', 'championshipdate', 'title', 'description','value'
                    ])
                    ->values([
                        'associations_id' => $championship->associations_id, 
                        'subscriptiondateini' => substr($this->request->data('subsdateini'), 6, 4) . '-' . substr($this->request->data('subsdateini'), 3, 2) . '-' . substr($this->request->data('subsdateini'), 0, 2), 
                        'subscriptiondateend' =>  substr($this->request->data('subsdateend'), 6, 4) . '-' . substr($this->request->data('subsdateend'), 3, 2) . '-' . substr($this->request->data('subsdateend'), 0, 2), 
                        'championshipdate' =>  substr($this->request->data('champdate'), 6, 4) . '-' . substr($this->request->data('champdate'), 3, 2) . '-' . substr($this->request->data('champdate'), 0, 2), 
                        'title' => $championship->title, 
                        'description' => $championship->description,
                        'value' => $championship->value
                    ]);
            
            if ($insert->execute())
            {
                $this->Flash->success(__('Campeonato Inserido.' ));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível inserir campeonato. Tente novamente.'));
        }
        //$associations = $this->Championships->Associations->find('list', ['limit' => 200]);
        $ass = TableRegistry::get('users')
                ->find()
                ->where('id = ' . $this->request->Session()->read('Auth.User.id'));

        if ($ass->isEmpty())
        {
            $uassociations = 0;
        }
        else
        {
            foreach ($ass as $a)
            {
                $uassociations = $a->associations_id;
            }
        }

        $this->set(compact('championship', 'uassociations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Championship id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $championship = $this->Championships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $championship = $this->Championships->patchEntity($championship, $this->request->getData());
            $update = TableRegistry::get('Championships')
                    ->query()
                    ->update()
                    ->set([
                        
                        'subscriptiondateini' => substr($this->request->data('subsdateini'), 6, 4) . '-' . substr($this->request->data('subsdateini'), 3, 2) . '-' . substr($this->request->data('subsdateini'), 0, 2), 
                        'subscriptiondateend' =>  substr($this->request->data('subsdateend'), 6, 4) . '-' . substr($this->request->data('subsdateend'), 3, 2) . '-' . substr($this->request->data('subsdateend'), 0, 2), 
                        'championshipdate' =>  substr($this->request->data('champdate'), 6, 4) . '-' . substr($this->request->data('champdate'), 3, 2) . '-' . substr($this->request->data('champdate'), 0, 2), 
                        'title' => $championship->title, 
                        'description' => $championship->description,
                        'value' => $championship->value
                    ])
                    ->where('id = ' . $id);
            if ($update->execute())
            {
                $this->Flash->success(__('Campeonato alterado.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('Não foi possível alterar o campeonato.'));
        }
        $ass = TableRegistry::get('users')
                ->find()
                ->where('id = ' . $this->request->Session()->read('Auth.User.id'));

        if ($ass->isEmpty())
        {
            $uassociations = 0;
        }
        else
        {
            foreach ($ass as $a)
            {
                $uassociations = $a->associations_id;
            }
        }

        $this->set(compact('championship', 'uassociations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Championship id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $championship = $this->Championships->get($id);
        if ($this->Championships->delete($championship))
        {
            $this->Flash->success(__('The championship has been deleted.'));
        }
        else
        {
            $this->Flash->error(__('The championship could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}

<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Competitions Controller
 *
 * @property \App\Model\Table\CompetitionsTable $Competitions
 *
 * @method \App\Model\Entity\Competition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompetitionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
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
        $this->paginate = [
            'contain' => ['Associations']
        ];
        $competitions = $this->paginate($this->Competitions->find()->where('Competitions.associations_id = ' . $uassociations));

        $this->set(compact('competitions'));
    }

    /**
     * View method
     *
     * @param string|null $id Competition id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $competition = $this->Competitions->get($id, [
            'contain' => ['Associations']
        ]);
        
        $rules = TableRegistry::get('rules')
                ->find()
                ->join([
                    'table' => 'competitionrules',
                    'alias' => 'cr',
                    'type' => 'inner',
                    'conditions' => 'cr.rules_id = rules.id'
                ])
                ->where('cr.competitions_id = ' . $id);

        $this->set(compact('competition', 'rules'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $competition = $this->Competitions->newEntity();
        if ($this->request->is('post'))
        {
            $competition = $this->Competitions->patchEntity($competition, $this->request->getData());
            if ($this->Competitions->save($competition))
            {
                $this->Flash->success(__('Competição inserida.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível inserir competição.'));
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
        $this->set(compact('competition', 'uassociations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Competition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $competition = $this->Competitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $competition = $this->Competitions->patchEntity($competition, $this->request->getData());
            if ($this->Competitions->save($competition))
            {
                $this->Flash->success(__('Competição editada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível editar competição.'));
        }
        $associations = $this->Competitions->Associations->find('list', ['limit' => 200]);
        $this->set(compact('competition', 'associations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Competition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $competition = $this->Competitions->get($id);
        if ($this->Competitions->delete($competition))
        {
            $this->Flash->success(__('The competition has been deleted.'));
        }
        else
        {
            $this->Flash->error(__('The competition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}

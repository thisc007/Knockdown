<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Sponsors Controller
 *
 * @property \App\Model\Table\SponsorsTable $Sponsors
 *
 * @method \App\Model\Entity\Sponsor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SponsorsController extends AppController
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
        $sponsors = $this->paginate($this->Sponsors->find()->where('sponsors.associations_id = ' . $uassociations));

        $this->set(compact('sponsors'));
    }

    /**
     * View method
     *
     * @param string|null $id Sponsor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sponsor = $this->Sponsors->get($id, [
            'contain' => ['Associations']
        ]);

        $addresses = TableRegistry::get('addresses')
                ->find()
                ->select([
                    'id' => 'addresses.id',
                    'address',
                    'number',
                    'complement',
                    'instructions',
                    'district',
                    'city',
                    'state' => 's.abbreviation',
                    'country' => 'c.abbreviation',
                    'zipcode'
                ])
                ->join([
                    'table' => 'states',
                    'alias' => 's',
                    'conditions' => 's.id = addresses.states_id',
                    'type' => 'inner'
                ])
                ->join([
                    'table' => 'countries',
                    'alias' => 'c',
                    'conditions' => 'c.id = s.countries_id',
                    'type' => 'inner'
                ])
                ->where('controller = \'' . $this->request->param('controller') . '\'')
                ->andWhere('controllerid = ' . $id);
        $phones = TableRegistry::get('phones')
                ->find()
                ->where('controller = \'' . $this->request->param('controller') . '\'')
                ->andWhere('controllerid = ' . $id);
         $pics = TableRegistry::get('files')
                ->find()
                ->where('controller = \'' . $this->request->param('controller') . '\'')
                ->andWhere('controllerId=' . $id);
        $this->set(compact('sponsor', 'phones', 'addresses','pics'));
        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sponsor = $this->Sponsors->newEntity();
        if ($this->request->is('post'))
        {
            $sponsor = $this->Sponsors->patchEntity($sponsor, $this->request->getData());
            if ($this->Sponsors->save($sponsor))
            {
                $this->Flash->success(__('Patrocinador inserido com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sponsor could not be saved. Please, try again.'));
        }
        //$associations = $this->Sponsors->Associations->find('list', ['limit' => 200]);

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

        $this->set(compact('sponsor', 'uassociations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sponsor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sponsor = $this->Sponsors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $sponsor = $this->Sponsors->patchEntity($sponsor, $this->request->getData());
            if ($this->Sponsors->save($sponsor))
            {
                $this->Flash->success(__('Patrocinador Atualizado.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The sponsor could not be saved. Please, try again.'));
        }
        //$associations = $this->Sponsors->Associations->find('list', ['limit' => 200]);

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
        $this->set(compact('sponsor', 'uassociations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sponsor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sponsor = $this->Sponsors->get($id);
        if ($this->Sponsors->delete($sponsor))
        {
            $this->Flash->success(__('The sponsor has been deleted.'));
        }
        else
        {
            $this->Flash->error(__('The sponsor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}

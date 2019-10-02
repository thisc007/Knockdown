<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Associations Controller
 *
 * @property \App\Model\Table\AssociationsTable $Associations
 *
 * @method \App\Model\Entity\Association[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssociationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->Session()->read('Auth.User.type') == 3)
        {
            $associations = $this->paginate($this->Associations);
        }
        else
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
            $associations = $this->paginate($this->Associations->find()->where('id = ' . $uassociations));
        }

        $this->set(compact('associations'));
    }

    /**
     * View method
     *
     * @param string|null $id Association id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $association = $this->Associations->get($id, [
            'contain' => []
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

        $this->set(compact('association', 'addresses', 'phones', 'pics'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $association = $this->Associations->newEntity();
        if ($this->request->is('post'))
        {
            $association = $this->Associations->patchEntity($association, $this->request->getData());
            if ($this->Associations->save($association))
            {
                $this->Flash->success(__('Federação inserida.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível inserir.'));
        }
        $this->set(compact('association'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Association id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $association = $this->Associations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $association = $this->Associations->patchEntity($association, $this->request->getData());
            if ($this->Associations->save($association))
            {
                $this->Flash->success(__('Federação editada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível editar federação.'));
        }
        $this->set(compact('association'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Association id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $association = $this->Associations->get($id);
        if ($this->Associations->delete($association))
        {
            $this->Flash->success(__('Federação excluída.'));
        }
        else
        {
            $this->Flash->error(__('The association could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}

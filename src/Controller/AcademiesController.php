<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Academies Controller
 *
 * @property \App\Model\Table\AcademiesTable $Academies
 *
 * @method \App\Model\Entity\Academy[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AcademiesController extends AppController
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
        switch ($this->request->Session()->read('Auth.User.type'))
        {
            case 3:
                $academies = $this->paginate($this->Academies);
                break;
            case 2:
                $academies = $this->paginate($this->Academies->find()->where('Academies.associations_id = ' . $uassociations));
                break;
            
        }        
        

        $this->set(compact('academies'));
    }

    /**
     * View method
     *
     * @param string|null $id Academy id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $academy = $this->Academies->get($id, [
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
            
        $this->set(compact('academy', 'phones', 'addresses','pics'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $academy = $this->Academies->newEntity();
        if ($this->request->is('post'))
        {
            $academy = $this->Academies->patchEntity($academy, $this->request->getData());
            if ($this->Academies->save($academy))
            {
                $this->Flash->success(__('Academia inserida.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The academy could not be saved. Please, try again.'));
        }
        $associations = $this->Academies->Associations->find('list', ['limit' => 200]);
        $this->set(compact('academy', 'associations'));
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

        $this->set('uassociations', $uassociations);
    }

    /**
     * Edit method
     *
     * @param string|null $id Academy id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $academy = $this->Academies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $academy = $this->Academies->patchEntity($academy, $this->request->getData());
            if ($this->Academies->save($academy))
            {
                $this->Flash->success(__('Academia editada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The academy could not be saved. Please, try again.'));
        }
        $associations = $this->Academies->Associations->find('list', ['limit' => 200]);
        $this->set(compact('academy', 'associations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Academy id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $academy = $this->Academies->get($id);
        if ($this->Academies->delete($academy))
        {
            $this->Flash->success(__('Academia excluída.'));
        }
        else
        {
            $this->Flash->error(__('The academy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function ajaxacademies($id) //id da associação/federação
    {
        $academies = $this->Academies->find('list')
                ->where('associations_id = ' . $id);
        $this->set('academies',$academies);
    }

}

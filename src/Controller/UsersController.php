<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Database\Type;

Type::build('date')->setLocaleFormat('dd/MM/yyyy');

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public $components = ['Flash', 'Auth'];

    public function newuser()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post'))
        {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $insert = TableRegistry::get('users')
                    ->query()
                    ->insert([
                        'firstname', 'nickname', 'lastname', 'email', 'gender', 'academies_id', 'created', 'modified', 'borndate', 'weight', 'height', 'enrollment_date', 'active', 'annuity', 'password', 'borncity', 'states_id', 'token', 'accesses', 'type', 'countries_id'
                    ])
                    ->values([
                'firstname' => $user->firstname,
                'nickname' => $user->nickname,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'gender' => $user->gender,
                'academies_id' => $user->academies_id,
                'created' => date('Y-m-d'),
                'modified' => date('Y-m-d'),
                'borndate' => substr($this->request->data('bornd'), 0, 4) . '-' . substr($this->request->data('bornd'), 6, 2) . '-' . substr($this->request->data('bornd'), 8, 2),
                'weight' => $user->weight,
                'height' => $user->height,
                'enrollment_date' => date('Y-m-d'),
                'active' => 1,
                'annuity' => 1,
                'password' => $user->password,
                'borncity' => $user->borncity,
                'states_id' => $user->states_id,
                'token' => '',
                'accesses' => 0,
                'type' => 4,
                'countries_id' => $this->request->data('countries_id')
            ]);
            if ($insert->execute())
            {
                $this->Flash->warning(__('Usuário inicial criado'));
                return $this->redirect(['action' => 'login']);
            }
            else
            {
                $this->Flash->error(__('Não foi possível criar usuário'));
            }
        }
        $academies = $this->Users->Academies->find('list', ['limit' => 200]);
        //$states = $this->Users->States->find('list', ['limit' => 200]);
        $countries = $this->Users->countries->find('list');
        $this->set(compact('user', 'academies', 'countries'));
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout']);
    }

    public function login()
    {
        if ($this->request->is('post'))
        {

            if ($this->Auth->identify())
            {
                $user = $this->Auth->identify();
                $this->Auth->setUser($user);

                if ($this->request->query('redirect'))
                {
                    //$this->Flash->error($this->request->query('redirect'));

                    return $this->redirect($this->Auth->redirectUrl(['controller' => 'Dashboards', 'action' => 'check', '?' => ['redirect' => $this->request->query('redirect')]]));
                }
                else
                {
                    return $this->redirect($this->Auth->redirectUrl(['controller' => 'Dashboards', 'action' => 'check']));
                }
            }

            //$this->Flash->error($user);
            $this->Flash->error(__('Usuário Inválido ou Senha incorreta, tente novamente'));
        }
    }

    public function logout()
    {
        $this->Flash->success(__('Usuário saiu do sistema'));
        $this->redirect($this->Auth->logout());
    }

    public function editpassword($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user))
            {
                $subject = 'Knockdown - Senha alterada com sucesso!';

                $this->Flash->success(__($subject));


                return $this->redirect(['action' => 'aboutme', $id]);
            }
            else
            {
                $this->Flash->error(__('Não foi possível editar a senha. Verifique os erros e tente novamente!'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

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
            'contain' => ['Academies', 'States', 'Countries']
        ];
        switch ($this->request->Session()->read('Auth.User.type'))
        {
            case 3:
                $users = $this->paginate($this->Users);
                break;
            case 2:
                $users = $this->paginate($this->Users->find()->where('users.associations_id = ' . $uassociations));
                break;
            case 1:
                $users = $this->paginate($this->Users->find()->where('academies_id = ' . $this->request->Session()->read('Auth.User.academies_id')));
                break;
        }

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Academies', 'States']
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

        $this->set(compact('user', 'phones', 'addresses'));

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
        $pics = TableRegistry::get('files')
                ->find()
                ->where('controller = \'' . $this->request->param('controller') . '\'')
                ->andWhere('controllerId=' . $id);

        $this->set(compact('user', 'phones', 'addresses', 'pics'));
        $this->set('uassociations', $uassociations);
    }

    public function aboutme($id = null)
    {
        if ($this->request->Session()->read('Auth.User.id') != $id)
        {
            $this->Flash->warning('AÇÃO NÃO PERMITIDA!');
            return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
        }
        $user = $this->Users->get($id, [
            'contain' => ['Academies', 'States']
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

        $this->set(compact('user', 'phones', 'addresses', 'pics'));

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
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post'))
        {

            $user = $this->Users->patchEntity($user, $this->request->getData());
            $insert = TableRegistry::get('users')
                    ->query()
                    ->insert([
                        'firstname', 'nickname', 'lastname', 'email', 'gender', 'academies_id', 'created', 'modified', 'borndate', 'weight', 'height', 'enrollment_date', 'active', 'annuity', 'password', 'borncity', 'states_id', 'token', 'accesses', 'type', 'countries_id', 'associations_id'
                    ])
                    ->values([
                'firstname' => $user->firstname,
                'nickname' => $user->nickname,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'gender' => $user->gender,
                'academies_id' => $user->academies_id,
                'created' => date('Y-m-d'),
                'modified' => date('Y-m-d'),
                'borndate' => substr($this->request->data('bornd'), 6, 4) . '-' . substr($this->request->data('bornd'), 3, 2) . '-' . substr($this->request->data('bornd'), 0, 2),
                'weight' => $user->weight,
                'height' => $user->height,
                'enrollment_date' => substr($this->request->data('enrolld'), 6, 4) . '-' . substr($this->request->data('enrolld'), 3, 2) . '-' . substr($this->request->data('enrolld'), 0, 2),
                'active' => $user->active,
                'annuity' => $user->annuity,
                'password' => $user->password,
                'borncity' => $user->borncity,
                'states_id' => $user->states_id,
                'token' => '',
                'accesses' => 0,
                'type' => $this->request->data('type'),
                'countries_id' => $this->request->data('countries_id'),
                'associations_id' => $this->request->data('associations_id'),
            ]);
            if ($insert->execute())
            {
                $this->Flash->success(__('Usuário inicial criado'));
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error(__('Não foi possível criar usuário'));
            }
        }
        $academies = $this->Users->Academies->find('list', ['limit' => 200]);
        $associations = TableRegistry::get('associations')
                ->find('list');

        //$states = $this->Users->States->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list');
        $this->set(compact('user', 'academies', 'countries', 'associations'));
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
        $uacademies = $this->request->Session()->read('Auth.User.academies_id');

        $this->set(compact('uassociations', 'uacademies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $update = TableRegistry::get('users')
                    ->query()
                    ->update()
                    ->set([
                        'firstname' => $user->firstname,
                        'nickname' => $user->nickname,
                        'lastname' => $user->lastname,
                        'email' => $user->email,
                        'gender' => $user->gender,
                        'academies_id' => $user->academies_id,
                        'created' => date('Y-m-d'),
                        'modified' => date('Y-m-d'),
                        'borndate' => substr($this->request->data('bornd'), 6, 4) . '-' . substr($this->request->data('bornd'), 3, 2) . '-' . substr($this->request->data('bornd'), 0, 2),
                        'weight' => $user->weight,
                        'height' => $user->height,
                        'enrollment_date' => substr($this->request->data('enrolld'), 6, 4) . '-' . substr($this->request->data('enrolld'), 3, 2) . '-' . substr($this->request->data('enrolld'), 0, 2),
                        'active' => $user->active,
                        'annuity' => $user->annuity,
                        'borncity' => $user->borncity,
                        'states_id' => $user->states_id,
                        'countries_id' => $this->request->data('countries_id')
                    ])
                    ->where('id = ' . $id);
            if ($update->execute())
            {
                $this->Flash->success(__('Usuário alterado.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('Não foi possível alterar usuário.'));
        }
        $academies = $this->Users->Academies->find('list', ['limit' => 200]);
        $associations = TableRegistry::get('associations')
                ->find('list');

        //$states = $this->Users->States->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list');
        $this->set(compact('user', 'academies', 'countries', 'associations'));
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
        $uacademies = $this->request->Session()->read('Auth.User.academies_id');

        $this->set(compact('uassociations', 'uacademies'));
    }

    public function edit2($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $update = TableRegistry::get('users')
                    ->query()
                    ->update()
                    ->set([
                        'firstname' => $user->firstname,
                        'nickname' => $user->nickname,
                        'lastname' => $user->lastname,
                        'email' => $user->email,
                        'gender' => $user->gender,
                        'academies_id' => $user->academies_id,
                        'created' => date('Y-m-d'),
                        'modified' => date('Y-m-d'),
                        'borndate' => substr($this->request->data('bornd'), 6, 4) . '-' . substr($this->request->data('bornd'), 3, 2) . '-' . substr($this->request->data('bornd'), 0, 2),
                        'weight' => $user->weight,
                        'height' => $user->height,
                        'enrollment_date' => substr($this->request->data('enrolld'), 6, 4) . '-' . substr($this->request->data('enrolld'), 3, 2) . '-' . substr($this->request->data('enrolld'), 0, 2),
                        'active' => $user->active,
                        'annuity' => $user->annuity,
                        'borncity' => $user->borncity,
                        'states_id' => $user->states_id,
                        'countries_id' => $this->request->data('countries_id')
                    ])
                    ->where('id = ' . $id);
            if ($update->execute())
            {
                $this->Flash->success(__('Usuário alterado.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('Não foi possível alterar usuário.'));
        }
        $academies = $this->Users->Academies->find('list', ['limit' => 200]);
        $associations = TableRegistry::get('associations')
                ->find('list');

        //$states = $this->Users->States->find('list', ['limit' => 200]);
        $countries = $this->Users->Countries->find('list');
        $this->set(compact('user', 'academies', 'countries', 'associations'));
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
        $uacademies = $this->request->Session()->read('Auth.User.academies_id');

        $this->set(compact('uassociations', 'uacademies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user))
        {
            $this->Flash->success(__('The user has been deleted.'));
        }
        else
        {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}

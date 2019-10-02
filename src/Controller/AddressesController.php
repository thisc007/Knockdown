<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Addresses Controller
 *
 * @property \App\Model\Table\AddressesTable $Addresses
 *
 * @method \App\Model\Entity\Address[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AddressesController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $address = $this->Addresses->newEntity();
        if ($this->request->is('post'))
        {
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            if ($this->Addresses->save($address))
            {
                $this->Flash->success(__('Endereço inserido.'));

                return $this->redirect(['controller' => $this->request->query('controller'), 'action' => $this->request->query('action'), $this->request->query('controllerid')]);
            }
            $this->Flash->error(__('Não foi possível inserir.'));
        }
        //$states = $this->Addresses->States->find('list', ['limit' => 200]);
        $countries =  $this->Addresses->Countries->find('list', ['limit' => 200]);
        $rs = TableRegistry::get('modules')
                ->find()
                ->where('controller =\'' . $this->request->query('controller') . '\'' );
        
        $controller = $this->request->query('controller');
        $controllerid = $this->request->query('controllerid');
        $this->set(compact('address', 'countries','rs','controller','controllerid'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $address = $this->Addresses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            if ($this->Addresses->save($address))
            {
                $this->Flash->success(__('Endereço Alterado.'));

                return $this->redirect(['controller' => $this->request->query('controller'), 'action' => $this->request->query('action'), $this->request->query('controllerid')]);
            }
            $this->Flash->error(__('Não foi possível alterar.'));
        }
        //$states = $this->Addresses->States->find('list', ['limit' => 200]);
        $countries =  $this->Addresses->Countries->find('list', ['limit' => 200]);
        $rs = TableRegistry::get('modules')
                ->find()
                ->where('controller =\'' . $this->request->query('controller') . '\'' );
        
        $controller = $this->request->query('controller');
        $controllerid = $this->request->query('controllerid');
        $this->set(compact('address', 'countries','rs','controller','controllerid'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $address = $this->Addresses->get($id);
        if ($this->Addresses->delete($address))
        {
            $this->Flash->success(__('Endereço excluído.'));
        }
        else
        {
            $this->Flash->error(__('Não foi possível excluir endereço, tente novamente!'));
        }

        return $this->redirect(['controller' => $this->request->query('controller'), 'action' => $this->request->query('action'), $this->request->query('controllerid')]);
    }

}

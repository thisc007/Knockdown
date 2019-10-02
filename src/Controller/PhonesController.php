<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Phones Controller
 *
 * @property \App\Model\Table\PhonesTable $Phones
 *
 * @method \App\Model\Entity\Phone[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhonesController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $phone = $this->Phones->newEntity();
        if ($this->request->is('post'))
        {
            $phone = $this->Phones->patchEntity($phone, $this->request->getData());
            $insert = TableRegistry::get('phones')
                    ->query()
                    ->insert(['countrycode', 'areacode', 'number', 'extension', 'type', 'controller', 'controllerid'])
                    ->values([
                        'countrycode' => $phone->countrycode, 
                        'areacode' => $phone->areacode, 
                        'number' => $phone->number, 
                        'extension' => $phone->extension, 
                        'type' => $phone->type, 
                        'controller' =>  $this->request->query('controller'), 
                        'controllerid' =>  $this->request->query('controllerid')]);
            if($insert->execute())
            {
                $this->Flash->success(__('Telefone inserido.'));
                return $this->redirect(['controller' => $this->request->query('controller'), 'action' => $this->request->query('action'), $this->request->query('controllerid')]);
            }
            else
            {
                $this->Flash->error(__('Não foi possível inserir. Tente novamente.'));
            }
                            
            
            
        }
        
        $rs = TableRegistry::get('modules')
                ->find()
                ->where('controller =\'' . $this->request->query('controller') . '\'' );
        
        $this->set(compact('phone','rs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $phone = $this->Phones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $phone = $this->Phones->patchEntity($phone, $this->request->getData());
            $update = TableRegistry::get('phones')
                    ->query()
                    ->update()
                    ->set([
                        'countrycode' => $phone->countrycode, 
                        'areacode' => $phone->areacode, 
                        'number' => $phone->number, 
                        'extension' => $phone->extension, 
                        'type' => $phone->type, 
                        'controller' =>  $this->request->query('controller'), 
                        'controllerid' =>  $this->request->query('controllerid')])
                    ->where(['id = ' . $id]);
            if($update->execute())
            {
                $this->Flash->success(__('Telefone alterado.'));

                return $this->redirect(['controller' => $this->request->query('controller'), 'action' => $this->request->query('action'), $this->request->query('controllerid')]);
            }
            $this->Flash->error(__('Não foi possível alterar. Tente novamente.'));
        }
        $rs = TableRegistry::get('modules')
                ->find()
                ->where('controller =\'' . $this->request->query('controller') . '\'' );
        
        $this->set(compact('phone','rs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $phone = $this->Phones->get($id);
        if ($this->Phones->delete($phone))
        {
            $this->Flash->success(__('Telefone apagado.'));
        }
        else
        {
            $this->Flash->error(__('Não foi possível apagar telefone.'));
        }

        return $this->redirect(['controller' => $this->request->query('controller'), 'action' => $this->request->query('action'), $this->request->query('controllerid')]);
    }

}

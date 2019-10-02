<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Rules Controller
 *
 * @property \App\Model\Table\RulesTable $Rules
 *
 * @method \App\Model\Entity\Rule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RulesController extends AppController
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
        
        $rules = $this->paginate($this->Rules->find()->where('Rules.associations_id = ' . $uassociations));

        $this->set(compact('rules'));
    }

    /**
     * View method
     *
     * @param string|null $id Rule id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rule = $this->Rules->get($id, [
            'contain' => []
        ]);

        $this->set('rule', $rule);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rule = $this->Rules->newEntity();
        if ($this->request->is('post'))
        {
            $rule = $this->Rules->patchEntity($rule, $this->request->getData());
            if ($this->Rules->save($rule))
            {
                $this->Flash->success(__('Regra inserida com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível inserir. Tente novamente.'));
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

       
        $this->set(compact('rule','uassociations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rule = $this->Rules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $rule = $this->Rules->patchEntity($rule, $this->request->getData());
            if ($this->Rules->save($rule))
            {
                $this->Flash->success(__('Regra alterada com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível alterar. Tente novamente.'));
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

       
        $this->set(compact('rule','uassociations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $rule = $this->Rules->get($id);
        if ($this->Rules->delete($rule))
        {
            $this->Flash->success(__('Regra excluída'));
        }
        else
        {
            $this->Flash->error(__('Não foi possível excluir regra.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}

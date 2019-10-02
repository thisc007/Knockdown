<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DashboardsController
 *
 * @author thiago.cruz
 */

namespace App\Controller;

use Cake\ORM\TableRegistry;

class DashboardsController extends AppController
{

    public $components = ['Flash', 'Auth'];

    public function index()
    {
        $rs = TableRegistry::get('users')
                ->find()
                ->where('id = ' . $this->request->Session()->read('Auth.User.id'))
        ;

        foreach ($rs as $r)
        {
            $qt = $r->accesses + 1;
        }

        $update = TableRegistry::get('users')
                ->query()
                ->update()
                ->set(['accesses' => $qt])
                ->where(['id' => $this->request->Session()->read('Auth.User.id')])
                ->execute();
        
        $this->set('rs',$rs);
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
        
        $championships = TableRegistry::get('championships')
                ->find()
                ->where('associations_id = ' . $uassociations)
                ->andWhere('now() between subscriptiondateini and subscriptiondateend')
                ->orderDesc('championshipdate');
        $this->set(compact('championships'));
        
    }

   public function check()
    {

        $rs = TableRegistry::get('users')
                ->find()
                ->where('id = ' . $this->request->Session()->read('Auth.User.id'))
        ;

        foreach ($rs as $r)
        {
            $qt = $r->accesses;
        }


        //$this->Flash->warning(__('Passou pela funcao.' . $qt));
        if ($qt == 0)
        {
            $this->Flash->warning(__('Antes de começar a usar o sistema, altere sua senha!'));
            return $this->redirect(['controller' => 'users', 'action' => 'editpassword', $this->request->Session()->read('Auth.User.id')]);
        }
        else
        {
            if ($this->request->query('redirect'))
            {
                 return $this->redirect($this->request->query('redirect'));
            }
            else
            {
                return $this->redirect(['action' => 'index']);
            }
        }
    }

    

}

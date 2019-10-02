<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Championshipcompetitions Controller
 *
 * @property \App\Model\Table\ChampionshipcompetitionsTable $Championshipcompetitions
 *
 * @method \App\Model\Entity\Championshipcompetition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChampionshipcompetitionsController extends AppController
{

   

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $championshipcompetition = $this->Championshipcompetitions->newEntity();
        if ($this->request->is('post'))
        {
            $championshipcompetition = $this->Championshipcompetitions->patchEntity($championshipcompetition, $this->request->getData());
            if ($this->Championshipcompetitions->save($championshipcompetition))
            {
                $this->Flash->success(__('Competição vinculada.'));

               return $this->redirect(['controller' => 'championships','action' => 'view', $id]);
            }
            $this->Flash->error(__('Não foi possível vincular. Tente novamente'));
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
        $championships = $id;
        $competitions = $this->Championshipcompetitions->Competitions->find('list')
                ->where('Competitions.id not in (select x.Competitions_id from Championshipcompetitions x where x.championships_id = ' . $id .')')
                ->andWhere('Competitions.associations_id = ' . $uassociations);
        $this->set(compact('championshipcompetition', 'championships', 'competitions'));
    }

    
    /**
     * Delete method
     *
     * @param string|null $id Championshipcompetition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        
        $championshipcompetition = $this->Championshipcompetitions->get($id);
        if ($this->Championshipcompetitions->delete($championshipcompetition))
        {
            $this->Flash->success(__('Competição desvinculada'));
        }
        else
        {
            $this->Flash->error(__('Não foi possível desvincular. Tente novamente.'));
        }

        return $this->redirect(['controller' => 'championships','action' => 'view', $championshipcompetition->championships_id]);
    }

}

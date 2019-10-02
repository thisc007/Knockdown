<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Competitionrules Controller
 *
 * @property \App\Model\Table\CompetitionrulesTable $Competitionrules
 *
 * @method \App\Model\Entity\Competitionrule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompetitionrulesController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $competitionrule = $this->Competitionrules->newEntity();
        if ($this->request->is('post'))
        {
            $competitionrule = $this->Competitionrules->patchEntity($competitionrule, $this->request->getData());
            if ($this->Competitionrules->save($competitionrule))
            {
                $this->Flash->success(__('Regra vinculada.'));

                return $this->redirect(['action' => 'view', $id, 'controller' => 'competitions']);
            }
            $this->Flash->error(__('The competitionrule could not be saved. Please, try again.'));
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
        $competitions = $id;
        $rules = $this->Competitionrules->Rules->find('list')->where('rules.associations_id = ' . $uassociations)
                ->andWhere('rules.id not in (select x.rules_id from Competitionrules x inner join rules y on y.id = x.rules_id where y.associations_id = ' . $uassociations .')');
        $this->set(compact('competitionrule', 'competitions', 'rules'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Competitionrule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $competitionrule = $this->Competitionrules->get($id);
        if ($this->Competitionrules->delete($competitionrule))
        {
            $this->Flash->success(__('The competitionrule has been deleted.'));
        }
        else
        {
            $this->Flash->error(__('The competitionrule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'view', $competitionrule->competitions_id, 'controller' => 'competitions']);
    }

}

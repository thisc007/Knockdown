<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Championshipsponsors Controller
 *
 * @property \App\Model\Table\ChampionshipsponsorsTable $Championshipsponsors
 *
 * @method \App\Model\Entity\Championshipsponsor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChampionshipsponsorsController extends AppController
{
    

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $championshipsponsor = $this->Championshipsponsors->newEntity();
        if ($this->request->is('post'))
        {
            $championshipsponsor = $this->Championshipsponsors->patchEntity($championshipsponsor, $this->request->getData());
            if ($this->Championshipsponsors->save($championshipsponsor))
            {
                switch ($championshipsponsor->type)
                {
                    case 0: 
                        $type = 'Patrocinador ';
                        break;
                    case 1: 
                        $type = 'Apoiador ';
                        break;
                    case 2: 
                        $type = 'Parceiro ';
                        break;
                }
                $this->Flash->success(__($type . 'vinculado'));

                return $this->redirect(['controller' => 'championships','action' => 'view', $id]);
            }
            $this->Flash->error(__('Não foi possível vincular, tente novamente!'));
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
        $championship = $id;
        $sponsors = $this->Championshipsponsors->Sponsors->find('list')
                ->where('sponsors.id not in (select x.sponsors_id from Championshipsponsors x where x.championships_id = ' . $id .')')
                ->andWhere('sponsors.associations_id = ' . $uassociations);
        $this->set(compact('championshipsponsor', 'championship', 'sponsors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Championshipsponsor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $championshipsponsor = $this->Championshipsponsors->get($id);
        if ($this->Championshipsponsors->delete($championshipsponsor))
        {
            $this->Flash->success(__('Patrocinador desvinculado.'));
        }
        else
        {
            $this->Flash->error(__('The championshipsponsor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'championships','action' => 'view', $championshipsponsor->championships_id]);
    }

}

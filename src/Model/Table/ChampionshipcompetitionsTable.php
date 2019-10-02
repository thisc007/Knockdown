<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Championshipcompetitions Model
 *
 * @property \App\Model\Table\ChampionshipsTable|\Cake\ORM\Association\BelongsTo $Championships
 * @property \App\Model\Table\CompetitionsTable|\Cake\ORM\Association\BelongsTo $Competitions
 *
 * @method \App\Model\Entity\Championshipcompetition get($primaryKey, $options = [])
 * @method \App\Model\Entity\Championshipcompetition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Championshipcompetition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Championshipcompetition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Championshipcompetition saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Championshipcompetition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Championshipcompetition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Championshipcompetition findOrCreate($search, callable $callback = null, $options = [])
 */
class ChampionshipcompetitionsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('championshipcompetitions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Championships', [
            'foreignKey' => 'championships_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Competitions', [
            'foreignKey' => 'competitions_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['championships_id'], 'Championships'));
        $rules->add($rules->existsIn(['competitions_id'], 'Competitions'));

        return $rules;
    }
}

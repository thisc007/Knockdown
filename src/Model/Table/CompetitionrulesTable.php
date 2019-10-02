<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Competitionrules Model
 *
 * @property \App\Model\Table\CompetitionsTable|\Cake\ORM\Association\BelongsTo $Competitions
 * @property \App\Model\Table\RulesTable|\Cake\ORM\Association\BelongsTo $Rules
 *
 * @method \App\Model\Entity\Competitionrule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Competitionrule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Competitionrule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Competitionrule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Competitionrule saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Competitionrule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Competitionrule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Competitionrule findOrCreate($search, callable $callback = null, $options = [])
 */
class CompetitionrulesTable extends Table
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

        $this->setTable('competitionrules');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Competitions', [
            'foreignKey' => 'competitions_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Rules', [
            'foreignKey' => 'rules_id',
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
        $rules->add($rules->existsIn(['competitions_id'], 'Competitions'));
        $rules->add($rules->existsIn(['rules_id'], 'Rules'));

        return $rules;
    }
}

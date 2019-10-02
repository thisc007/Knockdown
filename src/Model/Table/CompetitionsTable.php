<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Competitions Model
 *
 * @property \App\Model\Table\AssociationsTable|\Cake\ORM\Association\BelongsTo $Associations
 *
 * @method \App\Model\Entity\Competition get($primaryKey, $options = [])
 * @method \App\Model\Entity\Competition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Competition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Competition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Competition saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Competition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Competition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Competition findOrCreate($search, callable $callback = null, $options = [])
 */
class CompetitionsTable extends Table
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

        $this->setTable('competitions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Associations', [
            'foreignKey' => 'associations_id',
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

        $validator
            ->scalar('name')
            ->maxLength('name', 45)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->integer('minage')
            ->allowEmptyString('minage', false);

        $validator
            ->integer('maxage')
            ->allowEmptyString('maxage', false);

        $validator
            ->decimal('minweight')
            ->allowEmptyString('minweight', false);

        $validator
            ->decimal('maxweight')
            ->allowEmptyString('maxweight', false);

        $validator
            ->integer('mintrainingage')
            ->allowEmptyString('mintrainingage', false);

        $validator
            ->integer('maxtrainingage')
            ->allowEmptyString('maxtrainingage', false);

        $validator
            ->decimal('value')
            ->allowEmptyString('value');

        $validator
            ->boolean('type')
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        $validator
            ->boolean('thirdplace')
            ->requirePresence('thirdplace', 'create')
            ->allowEmptyString('thirdplace', false);

        $validator
            ->boolean('recap')
            ->requirePresence('recap', 'create')
            ->allowEmptyString('recap', false);

        $validator
            ->integer('roundnumbers')
            ->allowEmptyString('roundnumbers');

        $validator
            ->integer('referees')
            ->requirePresence('referees', 'create')
            ->allowEmptyString('referees', false);

        $validator
            ->integer('area')
            ->allowEmptyString('area');

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
        $rules->add($rules->existsIn(['associations_id'], 'Associations'));

        return $rules;
    }
}

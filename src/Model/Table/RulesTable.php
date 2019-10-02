<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rules Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Associations
 *
 * @method \App\Model\Entity\Rule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rule saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rule findOrCreate($search, callable $callback = null, $options = [])
 */
class RulesTable extends Table
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

        $this->setTable('rules');
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
            ->maxLength('name', 65)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->integer('type')
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        $validator
            ->numeric('value')
            ->allowEmptyString('value', false);

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

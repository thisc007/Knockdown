<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Championships Model
 *
 * @property \App\Model\Table\AssociationsTable|\Cake\ORM\Association\BelongsTo $Associations
 *
 * @method \App\Model\Entity\Championship get($primaryKey, $options = [])
 * @method \App\Model\Entity\Championship newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Championship[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Championship|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Championship saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Championship patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Championship[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Championship findOrCreate($search, callable $callback = null, $options = [])
 */
class ChampionshipsTable extends Table
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

        $this->setTable('championships');
        $this->setDisplayField('title');
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
            ->scalar('title')
            ->maxLength('title', 100)
            ->requirePresence('title', 'create')
            ->allowEmptyString('title', false);

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->allowEmptyString('description', false);

        $validator
            ->date('subscriptiondateini')
            ->requirePresence('subscriptiondateini', 'create')
            ->allowEmptyDate('subscriptiondateini', false);

        $validator
            ->date('subscriptiondateend')
            ->requirePresence('subscriptiondateend', 'create')
            ->allowEmptyDate('subscriptiondateend', false);

        $validator
            ->date('championshipdate')
            ->requirePresence('championshipdate', 'create')
            ->allowEmptyDate('championshipdate', false);

        $validator
            ->decimal('value')
            ->requirePresence('value', 'create')
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

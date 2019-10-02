<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Addresses Model
 *
 * @property \App\Model\Table\StatesTable|\Cake\ORM\Association\BelongsTo $States
 * @property |\Cake\ORM\Association\BelongsTo $Countries
 *
 * @method \App\Model\Entity\Address get($primaryKey, $options = [])
 * @method \App\Model\Entity\Address newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Address[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Address|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Address saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Address patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Address[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Address findOrCreate($search, callable $callback = null, $options = [])
 */
class AddressesTable extends Table
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

        $this->setTable('addresses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('States', [
            'foreignKey' => 'states_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'countries_id',
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
            ->scalar('address')
            ->maxLength('address', 120)
            ->requirePresence('address', 'create')
            ->allowEmptyString('address', false);

        $validator
            ->scalar('number')
            ->maxLength('number', 45)
            ->requirePresence('number', 'create')
            ->allowEmptyString('number', false);

        $validator
            ->scalar('complement')
            ->maxLength('complement', 100)
            ->allowEmptyString('complement');

        $validator
            ->scalar('instructions')
            ->allowEmptyString('instructions');

        $validator
            ->scalar('district')
            ->maxLength('district', 45)
            ->requirePresence('district', 'create')
            ->allowEmptyString('district', false);

        $validator
            ->scalar('city')
            ->maxLength('city', 55)
            ->requirePresence('city', 'create')
            ->allowEmptyString('city', false);

        $validator
            ->scalar('zipcode')
            ->maxLength('zipcode', 45)
            ->requirePresence('zipcode', 'create')
            ->allowEmptyString('zipcode', false);

        $validator
            ->scalar('controller')
            ->maxLength('controller', 45)
            ->requirePresence('controller', 'create')
            ->allowEmptyString('controller', false);

        $validator
            ->integer('controllerid')
            ->requirePresence('controllerid', 'create')
            ->allowEmptyString('controllerid', false);

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
        $rules->add($rules->existsIn(['states_id'], 'States'));
        $rules->add($rules->existsIn(['countries_id'], 'Countries'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Associationaddresses Model
 *
 * @property \App\Model\Table\AssociationsTable|\Cake\ORM\Association\BelongsTo $Associations
 *
 * @method \App\Model\Entity\Associationaddress get($primaryKey, $options = [])
 * @method \App\Model\Entity\Associationaddress newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Associationaddress[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Associationaddress|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Associationaddress saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Associationaddress patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Associationaddress[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Associationaddress findOrCreate($search, callable $callback = null, $options = [])
 */
class AssociationaddressesTable extends Table
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

        $this->setTable('associationaddresses');
        $this->setDisplayField('id');
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
            ->scalar('address')
            ->maxLength('address', 100)
            ->requirePresence('address', 'create')
            ->allowEmptyString('address', false);

        $validator
            ->integer('number')
            ->allowEmptyString('number');

        $validator
            ->scalar('complement')
            ->maxLength('complement', 45)
            ->allowEmptyString('complement');

        $validator
            ->scalar('zipcode')
            ->maxLength('zipcode', 8)
            ->requirePresence('zipcode', 'create')
            ->allowEmptyString('zipcode', false);

        $validator
            ->scalar('observations')
            ->maxLength('observations', 240)
            ->allowEmptyString('observations');

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

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Associationphones Model
 *
 * @property \App\Model\Table\AssociationsTable|\Cake\ORM\Association\BelongsTo $Associations
 *
 * @method \App\Model\Entity\Associationphone get($primaryKey, $options = [])
 * @method \App\Model\Entity\Associationphone newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Associationphone[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Associationphone|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Associationphone saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Associationphone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Associationphone[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Associationphone findOrCreate($search, callable $callback = null, $options = [])
 */
class AssociationphonesTable extends Table
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

        $this->setTable('associationphones');
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
            ->integer('countrycode')
            ->requirePresence('countrycode', 'create')
            ->allowEmptyString('countrycode', false);

        $validator
            ->integer('areacode')
            ->requirePresence('areacode', 'create')
            ->allowEmptyString('areacode', false);

        $validator
            ->integer('number')
            ->requirePresence('number', 'create')
            ->allowEmptyString('number', false);

        $validator
            ->integer('extension')
            ->allowEmptyString('extension');

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

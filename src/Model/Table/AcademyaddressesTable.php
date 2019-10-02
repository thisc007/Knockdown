<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Academyaddresses Model
 *
 * @property \App\Model\Table\AcademiesTable|\Cake\ORM\Association\BelongsTo $Academies
 *
 * @method \App\Model\Entity\Academyaddress get($primaryKey, $options = [])
 * @method \App\Model\Entity\Academyaddress newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Academyaddress[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Academyaddress|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Academyaddress saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Academyaddress patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Academyaddress[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Academyaddress findOrCreate($search, callable $callback = null, $options = [])
 */
class AcademyaddressesTable extends Table
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

        $this->setTable('academyaddresses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Academies', [
            'foreignKey' => 'academies_id',
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
        $rules->add($rules->existsIn(['academies_id'], 'Academies'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Academyphones Model
 *
 * @property \App\Model\Table\AcademiesTable|\Cake\ORM\Association\BelongsTo $Academies
 *
 * @method \App\Model\Entity\Academyphone get($primaryKey, $options = [])
 * @method \App\Model\Entity\Academyphone newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Academyphone[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Academyphone|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Academyphone saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Academyphone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Academyphone[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Academyphone findOrCreate($search, callable $callback = null, $options = [])
 */
class AcademyphonesTable extends Table
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

        $this->setTable('academyphones');
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
        $rules->add($rules->existsIn(['academies_id'], 'Academies'));

        return $rules;
    }
}

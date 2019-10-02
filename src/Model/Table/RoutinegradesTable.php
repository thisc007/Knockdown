<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Routinegrades Model
 *
 * @property \App\Model\Table\RoutinesTable|\Cake\ORM\Association\BelongsTo $Routines
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Routinegrade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Routinegrade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Routinegrade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Routinegrade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Routinegrade saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Routinegrade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Routinegrade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Routinegrade findOrCreate($search, callable $callback = null, $options = [])
 */
class RoutinegradesTable extends Table
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

        $this->setTable('routinegrades');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Routines', [
            'foreignKey' => 'routines_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
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
            ->decimal('grade')
            ->requirePresence('grade', 'create')
            ->allowEmptyString('grade', false);

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
        $rules->add($rules->existsIn(['routines_id'], 'Routines'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}

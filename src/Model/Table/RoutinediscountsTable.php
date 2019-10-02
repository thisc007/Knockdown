<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Routinediscounts Model
 *
 * @property \App\Model\Table\RoutinesTable|\Cake\ORM\Association\BelongsTo $Routines
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CompetitionrulesTable|\Cake\ORM\Association\BelongsTo $Competitionrules
 *
 * @method \App\Model\Entity\Routinediscount get($primaryKey, $options = [])
 * @method \App\Model\Entity\Routinediscount newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Routinediscount[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Routinediscount|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Routinediscount saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Routinediscount patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Routinediscount[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Routinediscount findOrCreate($search, callable $callback = null, $options = [])
 */
class RoutinediscountsTable extends Table
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

        $this->setTable('routinediscounts');
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
        $this->belongsTo('Competitionrules', [
            'foreignKey' => 'competitionrules_id',
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
        $rules->add($rules->existsIn(['routines_id'], 'Routines'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['competitionrules_id'], 'Competitionrules'));

        return $rules;
    }
}

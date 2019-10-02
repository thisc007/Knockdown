<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Playoffreferees Model
 *
 * @property \App\Model\Table\PlayoffsTable|\Cake\ORM\Association\BelongsTo $Playoffs
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Playoffreferee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Playoffreferee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Playoffreferee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Playoffreferee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Playoffreferee saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Playoffreferee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Playoffreferee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Playoffreferee findOrCreate($search, callable $callback = null, $options = [])
 */
class PlayoffrefereesTable extends Table
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

        $this->setTable('playoffreferees');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Playoffs', [
            'foreignKey' => 'playoffs_id',
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
            ->integer('resultfighter1')
            ->requirePresence('resultfighter1', 'create')
            ->allowEmptyString('resultfighter1', false);

        $validator
            ->integer('resultfighter2')
            ->requirePresence('resultfighter2', 'create')
            ->allowEmptyString('resultfighter2', false);

        $validator
            ->integer('round')
            ->allowEmptyString('round');

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
        $rules->add($rules->existsIn(['playoffs_id'], 'Playoffs'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}

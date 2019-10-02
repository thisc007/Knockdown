<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Playoffdiscounts Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RulesTable|\Cake\ORM\Association\BelongsTo $Rules
 *
 * @method \App\Model\Entity\Playoffdiscount get($primaryKey, $options = [])
 * @method \App\Model\Entity\Playoffdiscount newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Playoffdiscount[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Playoffdiscount|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Playoffdiscount saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Playoffdiscount patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Playoffdiscount[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Playoffdiscount findOrCreate($search, callable $callback = null, $options = [])
 */
class PlayoffdiscountsTable extends Table
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

        $this->setTable('playoffdiscounts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Rules', [
            'foreignKey' => 'rules_id',
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
            ->boolean('fighter')
            ->requirePresence('fighter', 'create')
            ->allowEmptyString('fighter', false);

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
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['rules_id'], 'Rules'));

        return $rules;
    }
}

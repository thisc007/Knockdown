<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Playoffdockets Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\PlayoffsTable|\Cake\ORM\Association\BelongsTo $Playoffs
 *
 * @method \App\Model\Entity\Playoffdocket get($primaryKey, $options = [])
 * @method \App\Model\Entity\Playoffdocket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Playoffdocket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Playoffdocket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Playoffdocket saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Playoffdocket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Playoffdocket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Playoffdocket findOrCreate($search, callable $callback = null, $options = [])
 */
class PlayoffdocketsTable extends Table
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

        $this->setTable('playoffdockets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Playoffs', [
            'foreignKey' => 'playoffs_id',
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

        $validator
            ->scalar('Comment')
            ->requirePresence('Comment', 'create')
            ->allowEmptyString('Comment', false);

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
        $rules->add($rules->existsIn(['playoffs_id'], 'Playoffs'));

        return $rules;
    }
}

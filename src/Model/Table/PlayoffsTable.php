<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Playoffs Model
 *
 * @property \App\Model\Table\CompetitionsTable|\Cake\ORM\Association\BelongsTo $Competitions
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\Users2sTable|\Cake\ORM\Association\BelongsTo $Users2s
 *
 * @method \App\Model\Entity\Playoff get($primaryKey, $options = [])
 * @method \App\Model\Entity\Playoff newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Playoff[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Playoff|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Playoff saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Playoff patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Playoff[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Playoff findOrCreate($search, callable $callback = null, $options = [])
 */
class PlayoffsTable extends Table
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

        $this->setTable('playoffs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Competitions', [
            'foreignKey' => 'competitions_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users2s', [
            'foreignKey' => 'users2_id'
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
            ->boolean('result')
            ->allowEmptyString('result', false);

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
        $rules->add($rules->existsIn(['competitions_id'], 'Competitions'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['users2_id'], 'Users2s'));

        return $rules;
    }
}

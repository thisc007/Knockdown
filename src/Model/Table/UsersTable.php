<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\AcademiesTable|\Cake\ORM\Association\BelongsTo $Academies
 * @property \App\Model\Table\StatesTable|\Cake\ORM\Association\BelongsTo $States
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Academies', [
            'foreignKey' => 'academies_id',
            //'joinType' => 'INNER'
        ]);
        $this->belongsTo('Associations', [
            'foreignKey' => 'Associations_id',
            //'joinType' => 'INNER'
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'states_id'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'countries_id'
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
            ->scalar('firstname')
            ->maxLength('firstname', 45)
            ->requirePresence('firstname', 'create')
            ->allowEmptyString('firstname', false);

        $validator
            ->scalar('nickname')
            ->maxLength('nickname', 45)
            ->allowEmptyString('nickname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 45)
            ->requirePresence('lastname', 'create')
            ->allowEmptyString('lastname', false);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false);

        $validator
            ->integer('gender')
            ->allowEmptyString('gender', false);

       

        $validator
            ->date('borndate')
            ->allowEmptyDate('borndate');

        $validator
            ->decimal('weight')
            ->allowEmptyString('weight');

        $validator
            ->decimal('height')
            ->allowEmptyString('height');

        $validator
            ->date('enrollment_date')
            ->requirePresence('enrollment_date', 'create')
            ->allowEmptyDate('enrollment_date', false);

        $validator
            ->boolean('active')
            ->allowEmptyString('active', false);

        $validator
            ->boolean('annuity')
            ->allowEmptyString('annuity', false);

        $validator
            ->scalar('password')
            ->maxLength('password', 256)
            ->requirePresence('password', 'create')
            ->allowEmptyString('password', false);
        
        $validator
                ->requirePresence('passwordm', 'create')
                ->notEmpty('password1')
                ->add('password1', 'no-misspelling', [
                    'rule' => ['compareWith', 'password'],
                    'message' => 'Não coincidem',
        ]);

        $validator
            ->scalar('borncity')
            ->maxLength('borncity', 60)
            ->allowEmptyString('borncity');

        $validator
            ->scalar('token')
            ->maxLength('token', 4)
            ->allowEmptyString('token');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['academies_id'], 'Academies'));
        $rules->add($rules->existsIn(['states_id'], 'States'));
        $rules->add($rules->existsIn(['countries_id'], 'Countries'));
        $rules->add($rules->existsIn(['associations_id'], 'Associations'));
        
        return $rules;
    }
}

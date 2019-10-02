<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Phones Model
 *
 * @method \App\Model\Entity\Phone get($primaryKey, $options = [])
 * @method \App\Model\Entity\Phone newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Phone[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Phone|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Phone saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Phone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Phone[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Phone findOrCreate($search, callable $callback = null, $options = [])
 */
class PhonesTable extends Table
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

        $this->setTable('phones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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

        $validator
            ->integer('type')
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        $validator
            ->scalar('controller')
            ->maxLength('controller', 45)
            ->requirePresence('controller', 'create')
            ->allowEmptyString('controller', false);

        $validator
            ->integer('controllerid')
            ->requirePresence('controllerid', 'create')
            ->allowEmptyString('controllerid', false);

        return $validator;
    }
}

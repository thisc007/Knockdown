<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Championshipsponsors Model
 *
 * @property \App\Model\Table\ChampionshipsTable|\Cake\ORM\Association\BelongsTo $Championships
 * @property \App\Model\Table\SponsorsTable|\Cake\ORM\Association\BelongsTo $Sponsors
 *
 * @method \App\Model\Entity\Championshipsponsor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Championshipsponsor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Championshipsponsor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Championshipsponsor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Championshipsponsor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Championshipsponsor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Championshipsponsor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Championshipsponsor findOrCreate($search, callable $callback = null, $options = [])
 */
class ChampionshipsponsorsTable extends Table
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

        $this->setTable('championshipsponsors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Championships', [
            'foreignKey' => 'championships_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sponsors', [
            'foreignKey' => 'sponsors_id',
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
            ->integer('type')
            ->allowEmptyString('type', false);

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
        $rules->add($rules->existsIn(['championships_id'], 'Championships'));
        $rules->add($rules->existsIn(['sponsors_id'], 'Sponsors'));

        return $rules;
    }
}

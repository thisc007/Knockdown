<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CompetitionsFixture
 */
class CompetitionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'minage' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'idade minima (caso não queira organização por idade, deixar vazio ou zero)', 'precision' => null, 'autoIncrement' => null],
        'maxage' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'idade máxima(caso não queira organização por idade ou que não haja limite, deixar vazio ou zerado)', 'precision' => null, 'autoIncrement' => null],
        'minweight' => ['type' => 'decimal', 'length' => 10, 'precision' => 3, 'unsigned' => false, 'null' => false, 'default' => '0.000', 'comment' => 'peso minimo(caso não queira organização por peso, deixar vazio ou zerado)'],
        'maxweight' => ['type' => 'decimal', 'length' => 10, 'precision' => 3, 'unsigned' => false, 'null' => false, 'default' => '0.000', 'comment' => 'peso máximo(caso não queira organização por peso ou que não haja limite, deixar vazio ou zerado)'],
        'mintrainingage' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'tempo de treino mínimo(caso não queira organização por tempo de treino, deixar vazio ou zerado)', 'precision' => null, 'autoIncrement' => null],
        'maxtrainingage' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'tempo de treino máximo(caso não queira organização por idade ou que não haja limite, deixar vazio ou zerado)', 'precision' => null, 'autoIncrement' => null],
        'value' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Valor da inscrição na competição (pode ser somado ao valor de primeira inscrição)'],
        'type' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '0 - Luta
1 - Forma', 'precision' => null],
        'thirdplace' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'Somente para lutas', 'precision' => null],
        'recap' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'Repescagem (somente luta)', 'precision' => null],
        'roundnumbers' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Somente lutas', 'precision' => null, 'autoIncrement' => null],
        'referees' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'número de árbitros laterais', 'precision' => null, 'autoIncrement' => null],
        'area' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Área de competição', 'precision' => null, 'autoIncrement' => null],
        'associations_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_competitions_associations_idx' => ['type' => 'index', 'columns' => ['associations_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_competitions_associations' => ['type' => 'foreign', 'columns' => ['associations_id'], 'references' => ['associations', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'minage' => 1,
                'maxage' => 1,
                'minweight' => 1.5,
                'maxweight' => 1.5,
                'mintrainingage' => 1,
                'maxtrainingage' => 1,
                'value' => 1.5,
                'type' => 1,
                'thirdplace' => 1,
                'recap' => 1,
                'roundnumbers' => 1,
                'referees' => 1,
                'area' => 1,
                'associations_id' => 1
            ],
        ];
        parent::init();
    }
}

<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StatesFixture
 */
class StatesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'countries_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 55, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => 'Ex: 
São Paulo
Rio de Janeiro
Paraná', 'precision' => null, 'fixed' => null],
        'abbreviation' => ['type' => 'string', 'length' => 2, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => 'Ex: 
SP
RJ
PR', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'FK_countries_states_idx' => ['type' => 'index', 'columns' => ['countries_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_countries_states' => ['type' => 'foreign', 'columns' => ['countries_id'], 'references' => ['countries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'countries_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'abbreviation' => 'Lo'
            ],
        ];
        parent::init();
    }
}

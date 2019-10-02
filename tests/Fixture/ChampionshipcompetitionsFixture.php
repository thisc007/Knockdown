<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ChampionshipcompetitionsFixture
 */
class ChampionshipcompetitionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'championships_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'competitions_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_championships_championshipcompetitions_idx' => ['type' => 'index', 'columns' => ['championships_id'], 'length' => []],
            'FK_competitions_championshipcompetitions_idx' => ['type' => 'index', 'columns' => ['competitions_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_championships_championshipcompetitions' => ['type' => 'foreign', 'columns' => ['championships_id'], 'references' => ['championships', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_competitions_championshipcompetitions' => ['type' => 'foreign', 'columns' => ['competitions_id'], 'references' => ['competitions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'championships_id' => 1,
                'competitions_id' => 1
            ],
        ];
        parent::init();
    }
}

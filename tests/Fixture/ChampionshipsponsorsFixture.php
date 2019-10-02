<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ChampionshipsponsorsFixture
 */
class ChampionshipsponsorsFixture extends TestFixture
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
        'sponsors_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'type' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '0 - Patrocínio
1 - Apoio
2 - Parceria', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_championships_championshipsponsors_idx' => ['type' => 'index', 'columns' => ['championships_id'], 'length' => []],
            'FK_sponsors_championshipsponsors_idx' => ['type' => 'index', 'columns' => ['sponsors_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_championships_championshipsponsors' => ['type' => 'foreign', 'columns' => ['championships_id'], 'references' => ['championships', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_sponsors_championshipsponsors' => ['type' => 'foreign', 'columns' => ['sponsors_id'], 'references' => ['sponsors', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'sponsors_id' => 1,
                'type' => 1
            ],
        ];
        parent::init();
    }
}

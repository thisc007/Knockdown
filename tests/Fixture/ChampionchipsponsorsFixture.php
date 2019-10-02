<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ChampionchipsponsorsFixture
 */
class ChampionchipsponsorsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'championchips_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sponsors_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_championships_championchipsponsors_idx' => ['type' => 'index', 'columns' => ['championchips_id'], 'length' => []],
            'FK_sponsors_championchipsponsors_idx' => ['type' => 'index', 'columns' => ['sponsors_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_championships_championchipsponsors' => ['type' => 'foreign', 'columns' => ['championchips_id'], 'references' => ['championships', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_sponsors_championchipsponsors' => ['type' => 'foreign', 'columns' => ['sponsors_id'], 'references' => ['sponsors', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'championchips_id' => 1,
                'sponsors_id' => 1
            ],
        ];
        parent::init();
    }
}

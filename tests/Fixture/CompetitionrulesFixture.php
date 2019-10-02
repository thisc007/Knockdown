<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CompetitionrulesFixture
 */
class CompetitionrulesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'competitions_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'rules_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_competitions_competitionrules_idx' => ['type' => 'index', 'columns' => ['competitions_id'], 'length' => []],
            'FK_rules_competitionrules_idx' => ['type' => 'index', 'columns' => ['rules_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_competitions_competitionrules' => ['type' => 'foreign', 'columns' => ['competitions_id'], 'references' => ['competitions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_rules_competitionrules' => ['type' => 'foreign', 'columns' => ['rules_id'], 'references' => ['rules', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'competitions_id' => 1,
                'rules_id' => 1
            ],
        ];
        parent::init();
    }
}

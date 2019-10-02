<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RoutinediscountsFixture
 */
class RoutinediscountsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'routines_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'users_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'Somente árbitros listados para a competição', 'precision' => null, 'autoIncrement' => null],
        'competitionrules_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'Somente o que for negativo ou desclassificatório aparecerá', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_routines_routinediscount_idx' => ['type' => 'index', 'columns' => ['routines_id'], 'length' => []],
            'FK_users_routinediscounts_idx' => ['type' => 'index', 'columns' => ['users_id'], 'length' => []],
            'fk_competitionrules_routinediscounts_idx' => ['type' => 'index', 'columns' => ['competitionrules_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_routines_routinediscount' => ['type' => 'foreign', 'columns' => ['routines_id'], 'references' => ['routines', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_users_routinediscounts' => ['type' => 'foreign', 'columns' => ['users_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_competitionrules_routinediscounts' => ['type' => 'foreign', 'columns' => ['competitionrules_id'], 'references' => ['competitionrules', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'routines_id' => 1,
                'users_id' => 1,
                'competitionrules_id' => 1
            ],
        ];
        parent::init();
    }
}

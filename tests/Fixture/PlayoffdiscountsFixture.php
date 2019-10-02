<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlayoffdiscountsFixture
 */
class PlayoffdiscountsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'users_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'árbitro', 'precision' => null, 'autoIncrement' => null],
        'fighter' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '0 - Lutador 1
1 - Lutador 2', 'precision' => null],
        'rules_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'falta', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_users_playoffdiscounts_idx' => ['type' => 'index', 'columns' => ['users_id'], 'length' => []],
            'FK_rules_playoffdiscounts_idx' => ['type' => 'index', 'columns' => ['rules_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_rules_playoffdiscounts' => ['type' => 'foreign', 'columns' => ['rules_id'], 'references' => ['rules', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_users_playoffdiscounts' => ['type' => 'foreign', 'columns' => ['users_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'users_id' => 1,
                'fighter' => 1,
                'rules_id' => 1
            ],
        ];
        parent::init();
    }
}

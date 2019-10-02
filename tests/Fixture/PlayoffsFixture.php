<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlayoffsFixture
 */
class PlayoffsFixture extends TestFixture
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
        'users_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'users2_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'result' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'Caso precise, o árbitro central poderá definir o vencedor', 'precision' => null],
        '_indexes' => [
            'FK_competitions_playoffs_idx' => ['type' => 'index', 'columns' => ['competitions_id'], 'length' => []],
            'FK_users_playoffs_idx' => ['type' => 'index', 'columns' => ['users_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_competitions_playoffs' => ['type' => 'foreign', 'columns' => ['competitions_id'], 'references' => ['competitions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_users_playoffs' => ['type' => 'foreign', 'columns' => ['users_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'users_id' => 1,
                'users2_id' => 1,
                'result' => 1
            ],
        ];
        parent::init();
    }
}

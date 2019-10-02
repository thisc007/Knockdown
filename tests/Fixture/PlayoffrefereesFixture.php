<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlayoffrefereesFixture
 */
class PlayoffrefereesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'playoffs_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'users_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'árbitro lateral', 'precision' => null, 'autoIncrement' => null],
        'resultfighter1' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'pontuação lutador 1', 'precision' => null, 'autoIncrement' => null],
        'resultfighter2' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'pontuação lutador 2', 'precision' => null, 'autoIncrement' => null],
        'round' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'round da pontuação', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_playoffs_playofffights_idx' => ['type' => 'index', 'columns' => ['playoffs_id'], 'length' => []],
            'FK_users_playofffights_idx' => ['type' => 'index', 'columns' => ['users_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_playoffs_playofffights' => ['type' => 'foreign', 'columns' => ['playoffs_id'], 'references' => ['playoffs', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_users_playofffights' => ['type' => 'foreign', 'columns' => ['users_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'playoffs_id' => 1,
                'users_id' => 1,
                'resultfighter1' => 1,
                'resultfighter2' => 1,
                'round' => 1
            ],
        ];
        parent::init();
    }
}

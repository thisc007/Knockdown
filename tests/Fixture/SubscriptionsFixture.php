<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SubscriptionsFixture
 */
class SubscriptionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'championshipcompetitions_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'Id da tabela champinshipcompetitions', 'precision' => null, 'autoIncrement' => null],
        'users_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'id de users', 'precision' => null, 'autoIncrement' => null],
        'payed' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'Pago? 
0 - não
1 - Sim', 'precision' => null],
        '_indexes' => [
            'FK_championshipcompetitions_subscriptions_idx' => ['type' => 'index', 'columns' => ['championshipcompetitions_id'], 'length' => []],
            'FK_users_subscriptions_idx' => ['type' => 'index', 'columns' => ['users_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_championshipcompetitions_subscriptions' => ['type' => 'foreign', 'columns' => ['championshipcompetitions_id'], 'references' => ['championshipcompetitions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_users_subscriptions' => ['type' => 'foreign', 'columns' => ['users_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'championshipcompetitions_id' => 1,
                'users_id' => 1,
                'payed' => 1
            ],
        ];
        parent::init();
    }
}

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoutinediscountsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoutinediscountsTable Test Case
 */
class RoutinediscountsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RoutinediscountsTable
     */
    public $Routinediscounts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Routinediscounts',
        'app.Routines',
        'app.Users',
        'app.Competitionrules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Routinediscounts') ? [] : ['className' => RoutinediscountsTable::class];
        $this->Routinediscounts = TableRegistry::getTableLocator()->get('Routinediscounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Routinediscounts);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

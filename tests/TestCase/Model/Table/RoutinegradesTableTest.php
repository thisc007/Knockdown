<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoutinegradesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoutinegradesTable Test Case
 */
class RoutinegradesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RoutinegradesTable
     */
    public $Routinegrades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Routinegrades',
        'app.Routines',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Routinegrades') ? [] : ['className' => RoutinegradesTable::class];
        $this->Routinegrades = TableRegistry::getTableLocator()->get('Routinegrades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Routinegrades);

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

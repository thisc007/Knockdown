<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoutinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoutinesTable Test Case
 */
class RoutinesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RoutinesTable
     */
    public $Routines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Routines',
        'app.Competitions',
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
        $config = TableRegistry::getTableLocator()->exists('Routines') ? [] : ['className' => RoutinesTable::class];
        $this->Routines = TableRegistry::getTableLocator()->get('Routines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Routines);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlayoffdiscountsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlayoffdiscountsTable Test Case
 */
class PlayoffdiscountsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlayoffdiscountsTable
     */
    public $Playoffdiscounts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Playoffdiscounts',
        'app.Users',
        'app.Rules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Playoffdiscounts') ? [] : ['className' => PlayoffdiscountsTable::class];
        $this->Playoffdiscounts = TableRegistry::getTableLocator()->get('Playoffdiscounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Playoffdiscounts);

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

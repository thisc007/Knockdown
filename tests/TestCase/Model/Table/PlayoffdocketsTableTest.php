<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlayoffdocketsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlayoffdocketsTable Test Case
 */
class PlayoffdocketsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlayoffdocketsTable
     */
    public $Playoffdockets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Playoffdockets',
        'app.Users',
        'app.Playoffs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Playoffdockets') ? [] : ['className' => PlayoffdocketsTable::class];
        $this->Playoffdockets = TableRegistry::getTableLocator()->get('Playoffdockets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Playoffdockets);

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

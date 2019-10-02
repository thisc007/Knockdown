<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SuspensionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SuspensionsTable Test Case
 */
class SuspensionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SuspensionsTable
     */
    public $Suspensions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Suspensions',
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
        $config = TableRegistry::getTableLocator()->exists('Suspensions') ? [] : ['className' => SuspensionsTable::class];
        $this->Suspensions = TableRegistry::getTableLocator()->get('Suspensions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Suspensions);

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

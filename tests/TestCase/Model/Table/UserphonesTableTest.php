<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserphonesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserphonesTable Test Case
 */
class UserphonesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserphonesTable
     */
    public $Userphones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Userphones',
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
        $config = TableRegistry::getTableLocator()->exists('Userphones') ? [] : ['className' => UserphonesTable::class];
        $this->Userphones = TableRegistry::getTableLocator()->get('Userphones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Userphones);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssociationphonesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssociationphonesTable Test Case
 */
class AssociationphonesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AssociationphonesTable
     */
    public $Associationphones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Associationphones',
        'app.Associations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Associationphones') ? [] : ['className' => AssociationphonesTable::class];
        $this->Associationphones = TableRegistry::getTableLocator()->get('Associationphones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Associationphones);

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

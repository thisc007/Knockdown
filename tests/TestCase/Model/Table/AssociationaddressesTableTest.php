<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssociationaddressesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssociationaddressesTable Test Case
 */
class AssociationaddressesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AssociationaddressesTable
     */
    public $Associationaddresses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Associationaddresses',
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
        $config = TableRegistry::getTableLocator()->exists('Associationaddresses') ? [] : ['className' => AssociationaddressesTable::class];
        $this->Associationaddresses = TableRegistry::getTableLocator()->get('Associationaddresses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Associationaddresses);

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

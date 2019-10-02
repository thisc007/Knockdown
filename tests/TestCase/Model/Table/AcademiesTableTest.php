<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AcademiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AcademiesTable Test Case
 */
class AcademiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AcademiesTable
     */
    public $Academies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Academies',
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
        $config = TableRegistry::getTableLocator()->exists('Academies') ? [] : ['className' => AcademiesTable::class];
        $this->Academies = TableRegistry::getTableLocator()->get('Academies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Academies);

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

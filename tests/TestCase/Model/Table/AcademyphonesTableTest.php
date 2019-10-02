<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AcademyphonesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AcademyphonesTable Test Case
 */
class AcademyphonesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AcademyphonesTable
     */
    public $Academyphones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Academyphones',
        'app.Academies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Academyphones') ? [] : ['className' => AcademyphonesTable::class];
        $this->Academyphones = TableRegistry::getTableLocator()->get('Academyphones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Academyphones);

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

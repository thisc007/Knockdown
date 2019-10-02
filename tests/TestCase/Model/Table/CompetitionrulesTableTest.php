<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompetitionrulesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompetitionrulesTable Test Case
 */
class CompetitionrulesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompetitionrulesTable
     */
    public $Competitionrules;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Competitionrules',
        'app.Competitions',
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
        $config = TableRegistry::getTableLocator()->exists('Competitionrules') ? [] : ['className' => CompetitionrulesTable::class];
        $this->Competitionrules = TableRegistry::getTableLocator()->get('Competitionrules', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Competitionrules);

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

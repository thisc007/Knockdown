<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChampionshipcompetitionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChampionshipcompetitionsTable Test Case
 */
class ChampionshipcompetitionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChampionshipcompetitionsTable
     */
    public $Championshipcompetitions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Championshipcompetitions',
        'app.Championships',
        'app.Competitions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Championshipcompetitions') ? [] : ['className' => ChampionshipcompetitionsTable::class];
        $this->Championshipcompetitions = TableRegistry::getTableLocator()->get('Championshipcompetitions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Championshipcompetitions);

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

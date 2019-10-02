<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChampionchipsponsorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChampionchipsponsorsTable Test Case
 */
class ChampionchipsponsorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChampionchipsponsorsTable
     */
    public $Championchipsponsors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Championchipsponsors',
        'app.Championships',
        'app.Sponsors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Championchipsponsors') ? [] : ['className' => ChampionchipsponsorsTable::class];
        $this->Championchipsponsors = TableRegistry::getTableLocator()->get('Championchipsponsors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Championchipsponsors);

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

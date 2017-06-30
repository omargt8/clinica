<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StressTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StressTable Test Case
 */
class StressTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StressTable
     */
    public $Stress;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stress',
        'app.patients',
        'app.allergys',
        'app.eathabits',
        'app.immunizations',
        'app.inheritances',
        'app.lifestyles',
        'app.nonpathologicals',
        'app.obstetrics',
        'app.pathologicals',
        'app.addictions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Stress') ? [] : ['className' => 'App\Model\Table\StressTable'];
        $this->Stress = TableRegistry::get('Stress', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Stress);

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

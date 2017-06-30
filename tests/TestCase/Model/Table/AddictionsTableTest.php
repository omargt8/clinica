<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddictionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AddictionsTable Test Case
 */
class AddictionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AddictionsTable
     */
    public $Addictions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.addictions',
        'app.patients',
        'app.allergys',
        'app.eathabits',
        'app.immunizations',
        'app.inheritances',
        'app.lifestyles',
        'app.nonpathologicals',
        'app.obstetrics',
        'app.pathologicals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Addictions') ? [] : ['className' => 'App\Model\Table\AddictionsTable'];
        $this->Addictions = TableRegistry::get('Addictions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Addictions);

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

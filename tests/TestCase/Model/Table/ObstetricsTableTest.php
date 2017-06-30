<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ObstetricsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ObstetricsTable Test Case
 */
class ObstetricsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ObstetricsTable
     */
    public $Obstetrics;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.obstetrics',
        'app.patients',
        'app.students',
        'app.allergys',
        'app.eathabits',
        'app.immunizations',
        'app.inheritances',
        'app.lifestyles',
        'app.nonpathologicals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Obstetrics') ? [] : ['className' => 'App\Model\Table\ObstetricsTable'];
        $this->Obstetrics = TableRegistry::get('Obstetrics', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Obstetrics);

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

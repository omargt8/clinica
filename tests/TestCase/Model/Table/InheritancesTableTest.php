<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InheritancesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InheritancesTable Test Case
 */
class InheritancesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InheritancesTable
     */
    public $Inheritances;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inheritances',
        'app.patients',
        'app.students',
        'app.allergys',
        'app.eathabits',
        'app.immunizations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Inheritances') ? [] : ['className' => 'App\Model\Table\InheritancesTable'];
        $this->Inheritances = TableRegistry::get('Inheritances', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Inheritances);

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

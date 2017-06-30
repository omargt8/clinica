<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AllergysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AllergysTable Test Case
 */
class AllergysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AllergysTable
     */
    public $Allergys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.allergys',
        'app.patients',
        'app.students'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Allergys') ? [] : ['className' => 'App\Model\Table\AllergysTable'];
        $this->Allergys = TableRegistry::get('Allergys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Allergys);

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

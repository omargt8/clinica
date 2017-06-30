<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NonpathologicalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NonpathologicalsTable Test Case
 */
class NonpathologicalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NonpathologicalsTable
     */
    public $Nonpathologicals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nonpathologicals',
        'app.patients',
        'app.students',
        'app.allergys',
        'app.eathabits',
        'app.immunizations',
        'app.inheritances',
        'app.lifestyles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Nonpathologicals') ? [] : ['className' => 'App\Model\Table\NonpathologicalsTable'];
        $this->Nonpathologicals = TableRegistry::get('Nonpathologicals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nonpathologicals);

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

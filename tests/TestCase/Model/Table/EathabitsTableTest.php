<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EathabitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EathabitsTable Test Case
 */
class EathabitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EathabitsTable
     */
    public $Eathabits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.eathabits',
        'app.patients',
        'app.students',
        'app.allergys'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Eathabits') ? [] : ['className' => 'App\Model\Table\EathabitsTable'];
        $this->Eathabits = TableRegistry::get('Eathabits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Eathabits);

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

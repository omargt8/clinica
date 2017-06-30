<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LifestylesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LifestylesTable Test Case
 */
class LifestylesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LifestylesTable
     */
    public $Lifestyles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.lifestyles',
        'app.patients',
        'app.students',
        'app.allergys',
        'app.eathabits',
        'app.immunizations',
        'app.inheritances'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Lifestyles') ? [] : ['className' => 'App\Model\Table\LifestylesTable'];
        $this->Lifestyles = TableRegistry::get('Lifestyles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lifestyles);

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

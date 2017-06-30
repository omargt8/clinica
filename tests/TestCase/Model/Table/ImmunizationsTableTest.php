<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImmunizationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImmunizationsTable Test Case
 */
class ImmunizationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ImmunizationsTable
     */
    public $Immunizations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.immunizations',
        'app.patients',
        'app.students',
        'app.allergys',
        'app.eathabits'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Immunizations') ? [] : ['className' => 'App\Model\Table\ImmunizationsTable'];
        $this->Immunizations = TableRegistry::get('Immunizations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Immunizations);

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

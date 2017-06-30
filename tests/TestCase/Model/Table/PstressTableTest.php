<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PstressTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PstressTable Test Case
 */
class PstressTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PstressTable
     */
    public $Pstress;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pstress',
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
        $config = TableRegistry::exists('Pstress') ? [] : ['className' => 'App\Model\Table\PstressTable'];
        $this->Pstress = TableRegistry::get('Pstress', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pstress);

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

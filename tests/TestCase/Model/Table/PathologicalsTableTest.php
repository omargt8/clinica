<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PathologicalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PathologicalsTable Test Case
 */
class PathologicalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PathologicalsTable
     */
    public $Pathologicals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pathologicals',
        'app.patients',
        'app.allergys',
        'app.eathabits',
        'app.immunizations',
        'app.inheritances',
        'app.lifestyles',
        'app.nonpathologicals',
        'app.obstetrics',
        'app.addictions',
        'app.pstress',
        'app.symptoms',
        'app.zoonoses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Pathologicals') ? [] : ['className' => 'App\Model\Table\PathologicalsTable'];
        $this->Pathologicals = TableRegistry::get('Pathologicals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pathologicals);

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

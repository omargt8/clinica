<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FacultiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FacultiesTable Test Case
 */
class FacultiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FacultiesTable
     */
    public $Faculties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.faculties',
        'app.careers',
        'app.patients',
        'app.addictions',
        'app.allergys',
        'app.eathabits',
        'app.immunizations',
        'app.inheritances',
        'app.lifestyles',
        'app.nonpathologicals',
        'app.obstetrics',
        'app.pathologicals',
        'app.zoonosis',
        'app.pstress',
        'app.symptoms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Faculties') ? [] : ['className' => 'App\Model\Table\FacultiesTable'];
        $this->Faculties = TableRegistry::get('Faculties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Faculties);

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
}

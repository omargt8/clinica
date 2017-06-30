<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ZoonosisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ZoonosisTable Test Case
 */
class ZoonosisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ZoonosisTable
     */
    public $Zoonosis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.zoonosis'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Zoonosis') ? [] : ['className' => 'App\Model\Table\ZoonosisTable'];
        $this->Zoonosis = TableRegistry::get('Zoonosis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Zoonosis);

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

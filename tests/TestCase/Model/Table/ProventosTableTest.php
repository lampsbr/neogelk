<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProventosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProventosTable Test Case
 */
class ProventosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProventosTable
     */
    public $Proventos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Proventos',
        'app.Ativos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Proventos') ? [] : ['className' => ProventosTable::class];
        $this->Proventos = TableRegistry::getTableLocator()->get('Proventos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Proventos);

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

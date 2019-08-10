<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OperacaosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OperacaosTable Test Case
 */
class OperacaosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OperacaosTable
     */
    public $Operacaos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Operacaos',
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
        $config = TableRegistry::getTableLocator()->exists('Operacaos') ? [] : ['className' => OperacaosTable::class];
        $this->Operacaos = TableRegistry::getTableLocator()->get('Operacaos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Operacaos);

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

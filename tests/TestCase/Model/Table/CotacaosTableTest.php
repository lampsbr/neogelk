<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CotacaosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CotacaosTable Test Case
 */
class CotacaosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CotacaosTable
     */
    public $Cotacaos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cotacaos',
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
        $config = TableRegistry::getTableLocator()->exists('Cotacaos') ? [] : ['className' => CotacaosTable::class];
        $this->Cotacaos = TableRegistry::getTableLocator()->get('Cotacaos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cotacaos);

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

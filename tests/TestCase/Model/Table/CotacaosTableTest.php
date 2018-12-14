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

    /**
     * Test query method
     *
     * @return void
     */
    public function testQuery()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test deleteAll method
     *
     * @return void
     */
    public function testDeleteAll()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getSoftDeleteField method
     *
     * @return void
     */
    public function testGetSoftDeleteField()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test hardDelete method
     *
     * @return void
     */
    public function testHardDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test hardDeleteAll method
     *
     * @return void
     */
    public function testHardDeleteAll()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test restore method
     *
     * @return void
     */
    public function testRestore()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

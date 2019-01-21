<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IndiceCotacaosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IndiceCotacaosTable Test Case
 */
class IndiceCotacaosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IndiceCotacaosTable
     */
    public $IndiceCotacaos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.IndiceCotacaos',
        'app.Indices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('IndiceCotacaos') ? [] : ['className' => IndiceCotacaosTable::class];
        $this->IndiceCotacaos = TableRegistry::getTableLocator()->get('IndiceCotacaos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IndiceCotacaos);

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

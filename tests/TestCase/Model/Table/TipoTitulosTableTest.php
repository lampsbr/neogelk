<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoTitulosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoTitulosTable Test Case
 */
class TipoTitulosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoTitulosTable
     */
    public $TipoTitulos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TipoTitulos',
        'app.Users',
        'app.Titulos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TipoTitulos') ? [] : ['className' => TipoTitulosTable::class];
        $this->TipoTitulos = TableRegistry::getTableLocator()->get('TipoTitulos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoTitulos);

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

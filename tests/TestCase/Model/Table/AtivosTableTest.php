<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AtivosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AtivosTable Test Case
 */
class AtivosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AtivosTable
     */
    public $Ativos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Ativos',
        'app.Titulos',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Ativos') ? [] : ['className' => AtivosTable::class];
        $this->Ativos = TableRegistry::getTableLocator()->get('Ativos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ativos);

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

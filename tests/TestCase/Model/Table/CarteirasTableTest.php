<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarteirasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarteirasTable Test Case
 */
class CarteirasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CarteirasTable
     */
    public $Carteiras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Carteiras',
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
        $config = TableRegistry::getTableLocator()->exists('Carteiras') ? [] : ['className' => CarteirasTable::class];
        $this->Carteiras = TableRegistry::getTableLocator()->get('Carteiras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Carteiras);

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

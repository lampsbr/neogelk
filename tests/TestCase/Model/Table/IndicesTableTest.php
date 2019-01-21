<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IndicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IndicesTable Test Case
 */
class IndicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IndicesTable
     */
    public $Indices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('Indices') ? [] : ['className' => IndicesTable::class];
        $this->Indices = TableRegistry::getTableLocator()->get('Indices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Indices);

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

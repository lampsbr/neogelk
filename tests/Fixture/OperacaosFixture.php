<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OperacaosFixture
 *
 */
class OperacaosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'deleted' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'ativo_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'tipo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '1 para compra, 2 para venda.
', 'precision' => null, 'autoIncrement' => null],
        'quantidade' => ['type' => 'decimal', 'length' => 15, 'precision' => 4, 'unsigned' => false, 'null' => false, 'default' => '0.0000', 'comment' => ''],
        '_indexes' => [
            'fk_operacaos_ativos1_idx' => ['type' => 'index', 'columns' => ['ativo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_operacaos_ativos1' => ['type' => 'foreign', 'columns' => ['ativo_id'], 'references' => ['ativos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => '92f5377e-82d6-4e34-b895-140e6c349e55',
                'created' => '2019-08-10 20:53:07',
                'modified' => '2019-08-10 20:53:07',
                'deleted' => '2019-08-10 20:53:07',
                'ativo_id' => 'e246e69d-c9a5-4fe7-ba1b-6ac1fa7568ca',
                'tipo' => 1,
                'quantidade' => 1.5
            ],
        ];
        parent::init();
    }
}

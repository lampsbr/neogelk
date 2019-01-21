<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IndiceCotacaosFixture
 *
 */
class IndiceCotacaosFixture extends TestFixture
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
        'valor' => ['type' => 'decimal', 'length' => 15, 'precision' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'indices_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_indice_cotacaos_indices1_idx' => ['type' => 'index', 'columns' => ['indices_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_indice_cotacaos_indices1' => ['type' => 'foreign', 'columns' => ['indices_id'], 'references' => ['indices', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id' => 'fa92d81b-429d-4d50-a217-addbdcf8fbfe',
                'created' => '2019-01-21 20:04:52',
                'modified' => '2019-01-21 20:04:52',
                'deleted' => '2019-01-21 20:04:52',
                'valor' => 1.5,
                'indices_id' => '036fd53d-4f0b-4baa-bcfd-52d327681fa3'
            ],
        ];
        parent::init();
    }
}

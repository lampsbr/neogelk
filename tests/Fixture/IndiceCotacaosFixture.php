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
        'indice_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_indice_cotacaos_indices1_idx' => ['type' => 'index', 'columns' => ['indice_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_indice_cotacaos_indices1' => ['type' => 'foreign', 'columns' => ['indice_id'], 'references' => ['indices', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id' => 'ebf2fea5-f921-4ab3-8a07-973acb088578',
                'created' => '2019-01-21 22:13:31',
                'modified' => '2019-01-21 22:13:31',
                'deleted' => '2019-01-21 22:13:31',
                'valor' => 1.5,
                'indice_id' => '6914dbef-5204-415f-9719-83498a794c07'
            ],
        ];
        parent::init();
    }
}

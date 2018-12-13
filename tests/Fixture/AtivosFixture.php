<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AtivosFixture
 *
 */
class AtivosFixture extends TestFixture
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
        'dt_compra' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'dt_venda' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'quantidade' => ['type' => 'decimal', 'length' => 15, 'precision' => 4, 'unsigned' => false, 'null' => false, 'default' => '0.0000', 'comment' => ''],
        'titulo_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'user_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_ativos_titulos1_idx' => ['type' => 'index', 'columns' => ['titulo_id'], 'length' => []],
            'fk_ativos_users1_idx' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_ativos_titulos1' => ['type' => 'foreign', 'columns' => ['titulo_id'], 'references' => ['titulos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ativos_users1' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id' => 'd436e072-ce0a-46e1-9169-35848a06ae99',
                'created' => '2018-12-13 20:33:33',
                'modified' => '2018-12-13 20:33:33',
                'deleted' => '2018-12-13 20:33:33',
                'dt_compra' => '2018-12-13 20:33:33',
                'dt_venda' => '2018-12-13 20:33:33',
                'quantidade' => 1.5,
                'titulo_id' => '3b30e493-4626-4130-99ac-897ac851364e',
                'user_id' => '3c27a9bb-d961-4540-a1f9-5a6da2c5d9e8'
            ],
        ];
        parent::init();
    }
}

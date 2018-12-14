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
                'id' => '0333cccf-1594-4913-88c5-c7b3f2d51aed',
                'created' => '2018-12-14 19:41:50',
                'modified' => '2018-12-14 19:41:50',
                'deleted' => '2018-12-14 19:41:50',
                'dt_compra' => '2018-12-14 19:41:50',
                'dt_venda' => '2018-12-14 19:41:50',
                'quantidade' => 1.5,
                'titulo_id' => 'c3c773b8-4d45-49e2-af94-20593cec44f1',
                'user_id' => '93730328-44f5-4dc6-8c0b-41f46129b6c1'
            ],
        ];
        parent::init();
    }
}

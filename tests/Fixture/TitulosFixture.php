<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TitulosFixture
 *
 */
class TitulosFixture extends TestFixture
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
        'nome' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ticker' => ['type' => 'string', 'length' => 15, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'tipo_titulo_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'moeda' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => 'real', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_ativos_tipo_ativos_idx' => ['type' => 'index', 'columns' => ['tipo_titulo_id'], 'length' => []],
            'fk_titulos_users1_idx' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_ativos_tipo_ativos' => ['type' => 'foreign', 'columns' => ['tipo_titulo_id'], 'references' => ['tipo_titulos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_titulos_users1' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id' => 'db5b72dd-59cc-463d-a968-a58ad804455b',
                'created' => '2018-12-13 20:33:26',
                'modified' => '2018-12-13 20:33:26',
                'deleted' => '2018-12-13 20:33:26',
                'nome' => 'Lorem ipsum dolor sit amet',
                'ticker' => 'Lorem ipsum d',
                'tipo_titulo_id' => '200da735-fbd1-499a-b38c-eb3ddad0bfbe',
                'moeda' => 'Lorem ipsum dolor sit amet',
                'user_id' => '9f89d80d-71ab-4b42-a567-8ce0ebc626a6'
            ],
        ];
        parent::init();
    }
}

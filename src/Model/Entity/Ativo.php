<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\Time;

/**
 * Ativo Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property \Cake\I18n\FrozenTime $dt_compra
 * @property \Cake\I18n\FrozenTime|null $dt_venda
 * @property float $quantidade
 * @property string $titulo_id
 * @property string $user_id
 *
 * @property \App\Model\Entity\Titulo $titulo
 * @property \App\Model\Entity\User $user
 */
class Ativo extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'dt_compra' => true,
        'dt_venda' => true,
        'quantidade' => true,
        'titulo_id' => true,
        'user_id' => true,
        'titulo' => true,
        'user' => true
    ];

    //só usar com entidade bem hidratada.
    protected function _getSaldo(){
        return $this->titulo->moeda.' '.($this->quantidade * $this->valorCotacaoMaisRecente);
    }

    protected function _getValorCotacaoMaisRecente(){
        if(is_null($this->cotacaos) || empty($this->cotacaos)){
            return 0;
        }

        //buscar a última cotação válida. 
        //Se o produto não tiver data de venda, é a mais recente. 
        //Se o produto tiver data de venda, é a mais recente que seja mais antiga que a data de venda.
        $cotacaoMaisRecente = $this->cotacaos[0];
        foreach ($this->cotacaos as $cot) {
            if($cot->data->gt($cotacaoMaisRecente->data) && ($this->dt_venda==null || $cot->data->lt($this->dt_venda))){
                $cotacaoMaisRecente = $cot;
            }
        }
        return $cotacaoMaisRecente->valor;
    }
}

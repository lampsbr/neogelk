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
        'carteira_id' => true,
        'titulo' => true,
        'user' => true
    ];

    //só usar com entidade bem hidratada.
    protected function _getSaldo(){
        return $this->titulo->moeda.' '.($this->quantidade * $this->valorCotacaoMaisRecente);
    }
    protected function _getSaldoSemMoeda(){
        return $this->quantidade * $this->valorCotacaoMaisRecente;
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

    protected function _getValorPrimeiraCotacao(){
        if(is_null($this->cotacaos) || empty($this->cotacaos)){
            return 0;
        }

        //buscar a primeira cotação válida. 
        $cotacaoMaisAntiga = $this->cotacaos[0];
        foreach ($this->cotacaos as $cot) {
            if($cot->data->lt($cotacaoMaisAntiga->data) && ($cot->data->gt($this->dt_compra))){
                $cotacaoMaisAntiga = $cot;
            }
        }
        return $cotacaoMaisAntiga->valor;
    }

    //retorna a primeira cotação do ano
    protected function _getValorPrimeiraCotacaoAno(){
        if(is_null($this->cotacaos) || empty($this->cotacaos)){
            return 0;
        }
        $comecoDoAno = Time::now();
        $comecoDoAno->month(01)->day(01)->hour(00)->minute(00)->second(01);

        //buscar a primeira cotação válida. 
        $cotacaoMaisAntiga = $this->cotacaos[0];
        foreach ($this->cotacaos as $cot) {
            if($cot->data->lt($cotacaoMaisAntiga->data) && ($cot->data->gt($comecoDoAno))){
                $cotacaoMaisAntiga = $cot;
            }
        }
        return $cotacaoMaisAntiga->valor;
    }

    protected function _getLucroTotal(){
        return round($this->quantidade * ($this->valorCotacaoMaisRecente - $this->valorPrimeiraCotacao),2);
    }

    protected function _getLucroPorcento(){
        if($this->valorPrimeiraCotacao && $this->valorPrimeiraCotacao > 0){
            return '('.round((($this->valorCotacaoMaisRecente / $this->valorPrimeiraCotacao)-1)*100,2).'%)';
        } else{
            return null;
        }
    }

    protected function _getLucroNoAno(){
        if($this->valorPrimeiraCotacao && $this->valorPrimeiraCotacao > 0){
            return round($this->quantidade * ($this->valorCotacaoMaisRecente - $this->valorPrimeiraCotacaoAno),2);
        } else {
            return null;
        }
    }

    protected function _getLucroNoAnoPorcento(){
        if($this->valorPrimeiraCotacao && $this->valorPrimeiraCotacao > 0){
            return '('.round((($this->valorCotacaoMaisRecente / $this->valorPrimeiraCotacaoAno)-1)*100,2).'%)';
        } else {
            return null;
        }
    }

    /**
     * retorna as 3 últimas cotações do ativo, em String
     */
    protected function _getUltimasCotacoes(){
        if(is_null($this->cotacaos) || empty($this->cotacaos)){
            return '';
        }
        $retorno = '';
        foreach($this->cotacaos as $indice => $cot) {
            if(!empty($retorno)){
                $retorno .= ', ';
            }
            $retorno .= $cot->valor;
            if($indice > 1) return $retorno;
        }
        return $retorno;
    }

    //somatório de proventos
    protected function _getTotalProventos(){
        $ret = 0;
        foreach($this->proventos as $prov) {
            $ret += $prov->valor_total;
        }
        return $ret;
    }
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cotacao Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property \Cake\I18n\FrozenTime $data
 * @property float $valor
 * @property string $ativo_id
 *
 * @property \App\Model\Entity\Ativo $ativo
 */
class Cotacao extends Entity
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
        'data' => true,
        'valor' => true,
        'ativo_id' => true,
        'ativo' => true
    ];
}

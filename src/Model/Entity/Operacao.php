<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Operacao Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property string $ativo_id
 * @property int $tipo
 * @property float $quantidade
 *
 * @property \App\Model\Entity\Ativo $ativo
 */
class Operacao extends Entity
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
        'ativo_id' => true,
        'tipo' => true,
        'quantidade' => true,
        'ativo' => true
    ];
}

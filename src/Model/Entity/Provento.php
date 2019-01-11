<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Provento Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property string $ativo_id
 * @property float $valor_total
 * @property string|null $descricao
 * @property float|null $valor_individual
 *
 * @property \App\Model\Entity\Ativo $ativo
 */
class Provento extends Entity
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
        'valor_total' => true,
        'descricao' => true,
        'valor_individual' => true,
        'ativo' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IndiceCotacao Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property float $valor
 * @property string $indice_id
 *
 * @property \App\Model\Entity\Index $index
 */
class IndiceCotacao extends Entity
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
        'valor' => true,
        'indice_id' => true,
        'index' => true
    ];
}

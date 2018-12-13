<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Titulo Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property string $nome
 * @property string|null $ticker
 * @property string $tipo_titulo_id
 * @property string $moeda
 * @property string|null $user_id
 *
 * @property \App\Model\Entity\TipoTitulo $tipo_titulo
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Ativo[] $ativos
 */
class Titulo extends Entity
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
        'nome' => true,
        'ticker' => true,
        'tipo_titulo_id' => true,
        'moeda' => true,
        'user_id' => true,
        'tipo_titulo' => true,
        'user' => true,
        'ativos' => true
    ];
}

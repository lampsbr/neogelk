<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Titulo $titulo
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $titulo->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $titulo->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Titulos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Tipo Titulos'), ['controller' => 'TipoTitulos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Tipo Titulo'), ['controller' => 'TipoTitulos', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $titulo->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $titulo->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Titulos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Tipo Titulos'), ['controller' => 'TipoTitulos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Tipo Titulo'), ['controller' => 'TipoTitulos', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($titulo); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Titulo']) ?></legend>
    <?php
    echo $this->Form->control('nome');
    echo $this->Form->control('ticker');
    echo $this->Form->control('tipo_titulo_id', ['options' => $tipoTitulos]);
    echo $this->Form->control('moeda');
    echo $this->Form->control('user_id', ['options' => $users, 'empty' => 'NENHUM']);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

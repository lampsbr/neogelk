<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoTitulo $tipoTitulo
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Tipo Titulos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Titulos'), ['controller' => 'Titulos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Titulo'), ['controller' => 'Titulos', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Tipo Titulos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Titulos'), ['controller' => 'Titulos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Titulo'), ['controller' => 'Titulos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($tipoTitulo); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Tipo Titulo']) ?></legend>
    <?php
    echo $this->Form->control('descricao');
    echo $this->Form->control('user_id', ['options' => $users, 'empty' => 'NENHUM']);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>

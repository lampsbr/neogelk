<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ativo $ativo
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Ativos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Titulos'), ['controller' => 'Titulos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Titulo'), ['controller' => 'Titulos', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Ativos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Titulos'), ['controller' => 'Titulos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Titulo'), ['controller' => 'Titulos', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($ativo); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Ativo']) ?></legend>
    <?php
    echo $this->Form->control('dt_compra');
    echo $this->Form->control('dt_venda',['empty' => true]);
    echo $this->Form->control('quantidade');
    echo $this->Form->control('titulo_id', ['options' => $titulos]);
    echo $this->Form->control('user_id', ['options' => $users]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>

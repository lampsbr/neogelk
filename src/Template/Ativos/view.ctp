<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Ativo'), ['action' => 'edit', $ativo->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Ativo'), ['action' => 'delete', $ativo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ativo->id)]) ?> </li>
<li><?= $this->Html->link(__('List Ativos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ativo'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Titulos'), ['controller' => 'Titulos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Titulo'), ['controller' => 'Titulos', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Ativo'), ['action' => 'edit', $ativo->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Ativo'), ['action' => 'delete', $ativo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ativo->id)]) ?> </li>
<li><?= $this->Html->link(__('List Ativos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ativo'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Titulos'), ['controller' => 'Titulos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Titulo'), ['controller' => 'Titulos', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($ativo->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($ativo->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Titulo') ?></td>
            <td><?= $ativo->has('titulo') ? $this->Html->link($ativo->titulo->nome, ['controller' => 'Titulos', 'action' => 'view', $ativo->titulo->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $ativo->has('user') ? $this->Html->link($ativo->user->email, ['controller' => 'Users', 'action' => 'view', $ativo->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Quantidade') ?></td>
            <td><?= $this->Number->format($ativo->quantidade) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($ativo->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($ativo->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($ativo->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Dt Compra') ?></td>
            <td><?= h($ativo->dt_compra) ?></td>
        </tr>
        <tr>
            <td><?= __('Dt Venda') ?></td>
            <td><?= h($ativo->dt_venda) ?></td>
        </tr>
    </table>
</div>


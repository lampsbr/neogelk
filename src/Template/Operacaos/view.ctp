<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Operacao'), ['action' => 'edit', $operacao->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Operacao'), ['action' => 'delete', $operacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operacao->id)]) ?> </li>
<li><?= $this->Html->link(__('List Operacaos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Operacao'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Operacao'), ['action' => 'edit', $operacao->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Operacao'), ['action' => 'delete', $operacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operacao->id)]) ?> </li>
<li><?= $this->Html->link(__('List Operacaos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Operacao'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($operacao->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($operacao->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Ativo') ?></td>
            <td><?= $operacao->has('ativo') ? $this->Html->link($operacao->ativo->id, ['controller' => 'Ativos', 'action' => 'view', $operacao->ativo->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Tipo') ?></td>
            <td><?= $this->Number->format($operacao->tipo) ?></td>
        </tr>
        <tr>
            <td><?= __('Quantidade') ?></td>
            <td><?= $this->Number->format($operacao->quantidade) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($operacao->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($operacao->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($operacao->deleted) ?></td>
        </tr>
    </table>
</div>


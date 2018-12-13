<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Cotacao'), ['action' => 'edit', $cotacao->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Cotacao'), ['action' => 'delete', $cotacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cotacao->id)]) ?> </li>
<li><?= $this->Html->link(__('List Cotacaos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Cotacao'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Cotacao'), ['action' => 'edit', $cotacao->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Cotacao'), ['action' => 'delete', $cotacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cotacao->id)]) ?> </li>
<li><?= $this->Html->link(__('List Cotacaos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Cotacao'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($cotacao->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($cotacao->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Ativo') ?></td>
            <td><?= $cotacao->has('ativo') ? $this->Html->link($cotacao->ativo->id, ['controller' => 'Ativos', 'action' => 'view', $cotacao->ativo->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Valor') ?></td>
            <td><?= $this->Number->format($cotacao->valor) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($cotacao->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($cotacao->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($cotacao->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Data') ?></td>
            <td><?= h($cotacao->data) ?></td>
        </tr>
    </table>
</div>


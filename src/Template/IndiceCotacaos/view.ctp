<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Indice Cotacao'), ['action' => 'edit', $indiceCotacao->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Indice Cotacao'), ['action' => 'delete', $indiceCotacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $indiceCotacao->id)]) ?> </li>
<li><?= $this->Html->link(__('List Indice Cotacaos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Indice Cotacao'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Indices'), ['controller' => 'Indices', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Index'), ['controller' => 'Indices', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Indice Cotacao'), ['action' => 'edit', $indiceCotacao->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Indice Cotacao'), ['action' => 'delete', $indiceCotacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $indiceCotacao->id)]) ?> </li>
<li><?= $this->Html->link(__('List Indice Cotacaos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Indice Cotacao'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Indices'), ['controller' => 'Indices', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Index'), ['controller' => 'Indices', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($indiceCotacao->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($indiceCotacao->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Index') ?></td>
            <td><?= $indiceCotacao->has('index') ? $this->Html->link($indiceCotacao->index->id, ['controller' => 'Indices', 'action' => 'view', $indiceCotacao->index->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Valor') ?></td>
            <td><?= $this->Number->format($indiceCotacao->valor) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($indiceCotacao->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($indiceCotacao->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($indiceCotacao->deleted) ?></td>
        </tr>
    </table>
</div>


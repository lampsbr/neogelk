<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Index'), ['action' => 'edit', $index->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Index'), ['action' => 'delete', $index->id], ['confirm' => __('Are you sure you want to delete # {0}?', $index->id)]) ?> </li>
<li><?= $this->Html->link(__('List Indices'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Index'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Index'), ['action' => 'edit', $index->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Index'), ['action' => 'delete', $index->id], ['confirm' => __('Are you sure you want to delete # {0}?', $index->id)]) ?> </li>
<li><?= $this->Html->link(__('List Indices'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Index'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($index->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($index->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Nome') ?></td>
            <td><?= h($index->nome) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($index->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($index->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($index->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Descricao') ?></td>
            <td><?= $this->Text->autoParagraph(h($index->descricao)); ?></td>
        </tr>
    </table>
</div>


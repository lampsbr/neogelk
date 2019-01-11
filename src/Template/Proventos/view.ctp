<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Provento'), ['action' => 'edit', $provento->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Provento'), ['action' => 'delete', $provento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provento->id)]) ?> </li>
<li><?= $this->Html->link(__('List Proventos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Provento'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Provento'), ['action' => 'edit', $provento->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Provento'), ['action' => 'delete', $provento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provento->id)]) ?> </li>
<li><?= $this->Html->link(__('List Proventos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Provento'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($provento->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($provento->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Ativo') ?></td>
            <td><?= $provento->has('ativo') ? $this->Html->link($provento->ativo->id, ['controller' => 'Ativos', 'action' => 'view', $provento->ativo->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Descricao') ?></td>
            <td><?= h($provento->descricao) ?></td>
        </tr>
        <tr>
            <td><?= __('Valor Total') ?></td>
            <td><?= $this->Number->format($provento->valor_total) ?></td>
        </tr>
        <tr>
            <td><?= __('Valor Individual') ?></td>
            <td><?= $this->Number->format($provento->valor_individual) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($provento->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($provento->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($provento->deleted) ?></td>
        </tr>
    </table>
</div>


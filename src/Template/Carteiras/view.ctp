<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Carteira'), ['action' => 'edit', $carteira->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Carteira'), ['action' => 'delete', $carteira->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carteira->id)]) ?> </li>
<li><?= $this->Html->link(__('List Carteiras'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Carteira'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Carteira'), ['action' => 'edit', $carteira->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Carteira'), ['action' => 'delete', $carteira->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carteira->id)]) ?> </li>
<li><?= $this->Html->link(__('List Carteiras'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Carteira'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($carteira->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($carteira->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Nome') ?></td>
            <td><?= h($carteira->nome) ?></td>
        </tr>
        <tr>
            <td><?= __('User Id') ?></td>
            <td><?= h($carteira->user_id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($carteira->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($carteira->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($carteira->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Observacao') ?></td>
            <td><?= $this->Text->autoParagraph(h($carteira->observacao)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Ativos') ?></h3>
    </div>
    <?php if (!empty($carteira->ativos)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th><?= __('Dt Compra') ?></th>
                <th><?= __('Dt Venda') ?></th>
                <th><?= __('Quantidade') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($carteira->ativos as $ativos): ?>
                <tr>
                    <td><?= $this->Html->link($ativos->titulo->nome, ['controller' => 'Ativos', 'action' => 'view', $ativos->id], ['title' => 'ver ativo']) ?></td>
                    <td><?= h($ativos->dt_compra) ?></td>
                    <td><?= h($ativos->dt_venda) ?></td>
                    <td><?= h($ativos->quantidade) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Ativos</p>
    <?php endif; ?>
</div>

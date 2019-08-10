<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Operacao'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th><?= $this->Paginator->sort('deleted'); ?></th>
            <th><?= $this->Paginator->sort('ativo_id'); ?></th>
            <th><?= $this->Paginator->sort('tipo'); ?></th>
            <th><?= $this->Paginator->sort('quantidade'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($operacaos as $operacao): ?>
        <tr>
            <td><?= h($operacao->id) ?></td>
            <td><?= h($operacao->created) ?></td>
            <td><?= h($operacao->modified) ?></td>
            <td><?= h($operacao->deleted) ?></td>
            <td>
                <?= $operacao->has('ativo') ? $this->Html->link($operacao->ativo->id, ['controller' => 'Ativos', 'action' => 'view', $operacao->ativo->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($operacao->tipo) ?></td>
            <td><?= $this->Number->format($operacao->quantidade) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $operacao->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $operacao->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $operacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operacao->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>

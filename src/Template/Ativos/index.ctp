<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Ativo'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Titulos'), ['controller' => 'Titulos', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Titulo'), ['controller' => 'Titulos', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
        <th><?= $this->Paginator->sort('titulo.nome'); ?></th>
            <th><?= $this->Paginator->sort('dt_compra'); ?></th>
            <th><?= $this->Paginator->sort('dt_venda'); ?></th>
            <th><?= $this->Paginator->sort('quantidade'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ativos as $ativo): ?>
        <tr>
        <td><?= h($ativo->titulo->nome) ?></td>
            <td><?= h($ativo->dt_compra) ?></td>
            <td><?= h($ativo->dt_venda) ?></td>
            <td><?= $this->Number->format($ativo->quantidade) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $ativo->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $ativo->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $ativo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ativo->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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

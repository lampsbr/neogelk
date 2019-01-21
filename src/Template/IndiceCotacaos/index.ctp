<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Indice Cotacao'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Indices'), ['controller' => 'Indices', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Index'), ['controller' => 'Indices', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th><?= $this->Paginator->sort('deleted'); ?></th>
            <th><?= $this->Paginator->sort('valor'); ?></th>
            <th><?= $this->Paginator->sort('indice_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($indiceCotacaos as $indiceCotacao): ?>
        <tr>
            <td><?= h($indiceCotacao->id) ?></td>
            <td><?= h($indiceCotacao->created) ?></td>
            <td><?= h($indiceCotacao->modified) ?></td>
            <td><?= h($indiceCotacao->deleted) ?></td>
            <td><?= $this->Number->format($indiceCotacao->valor) ?></td>
            <td>
                <?= $indiceCotacao->has('index') ? $this->Html->link($indiceCotacao->index->id, ['controller' => 'Indices', 'action' => 'view', $indiceCotacao->index->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $indiceCotacao->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $indiceCotacao->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $indiceCotacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $indiceCotacao->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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

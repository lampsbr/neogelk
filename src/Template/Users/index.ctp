<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New User'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List TipoTitulos'), ['controller' => 'TipoTitulos', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Tipo Titulo'), ['controller' => 'TipoTitulos', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Titulos'), ['controller' => 'Titulos', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Titulo'), ['controller' => 'Titulos', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th><?= $this->Paginator->sort('email'); ?></th>
            <th><?= $this->Paginator->sort('permissao'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->created) ?></td>
            <td><?= h($user->modified) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->permissao) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $user->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $user->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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

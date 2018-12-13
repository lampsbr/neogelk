<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Tipo Titulo'), ['action' => 'edit', $tipoTitulo->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Tipo Titulo'), ['action' => 'delete', $tipoTitulo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoTitulo->id)]) ?> </li>
<li><?= $this->Html->link(__('List Tipo Titulos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Tipo Titulo'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Titulos'), ['controller' => 'Titulos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Titulo'), ['controller' => 'Titulos', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Tipo Titulo'), ['action' => 'edit', $tipoTitulo->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Tipo Titulo'), ['action' => 'delete', $tipoTitulo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoTitulo->id)]) ?> </li>
<li><?= $this->Html->link(__('List Tipo Titulos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Tipo Titulo'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Titulos'), ['controller' => 'Titulos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Titulo'), ['controller' => 'Titulos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($tipoTitulo->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($tipoTitulo->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Descricao') ?></td>
            <td><?= h($tipoTitulo->descricao) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $tipoTitulo->has('user') ? $this->Html->link($tipoTitulo->user->id, ['controller' => 'Users', 'action' => 'view', $tipoTitulo->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($tipoTitulo->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($tipoTitulo->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($tipoTitulo->deleted) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Titulos') ?></h3>
    </div>
    <?php if (!empty($tipoTitulo->titulos)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Ticker') ?></th>
                <th><?= __('Tipo Titulo Id') ?></th>
                <th><?= __('Moeda') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tipoTitulo->titulos as $titulos): ?>
                <tr>
                    <td><?= h($titulos->id) ?></td>
                    <td><?= h($titulos->created) ?></td>
                    <td><?= h($titulos->modified) ?></td>
                    <td><?= h($titulos->deleted) ?></td>
                    <td><?= h($titulos->nome) ?></td>
                    <td><?= h($titulos->ticker) ?></td>
                    <td><?= h($titulos->tipo_titulo_id) ?></td>
                    <td><?= h($titulos->moeda) ?></td>
                    <td><?= h($titulos->user_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Titulos', 'action' => 'view', $titulos->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Titulos', 'action' => 'edit', $titulos->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Titulos', 'action' => 'delete', $titulos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $titulos->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Titulos</p>
    <?php endif; ?>
</div>

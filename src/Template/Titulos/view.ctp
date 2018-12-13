<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Titulo'), ['action' => 'edit', $titulo->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Titulo'), ['action' => 'delete', $titulo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $titulo->id)]) ?> </li>
<li><?= $this->Html->link(__('List Titulos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Titulo'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Tipo Titulos'), ['controller' => 'TipoTitulos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Tipo Titulo'), ['controller' => 'TipoTitulos', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Titulo'), ['action' => 'edit', $titulo->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Titulo'), ['action' => 'delete', $titulo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $titulo->id)]) ?> </li>
<li><?= $this->Html->link(__('List Titulos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Titulo'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Tipo Titulos'), ['controller' => 'TipoTitulos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Tipo Titulo'), ['controller' => 'TipoTitulos', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($titulo->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($titulo->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Nome') ?></td>
            <td><?= h($titulo->nome) ?></td>
        </tr>
        <tr>
            <td><?= __('Ticker') ?></td>
            <td><?= h($titulo->ticker) ?></td>
        </tr>
        <tr>
            <td><?= __('Tipo Titulo') ?></td>
            <td><?= $titulo->has('tipo_titulo') ? $this->Html->link($titulo->tipo_titulo->id, ['controller' => 'TipoTitulos', 'action' => 'view', $titulo->tipo_titulo->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Moeda') ?></td>
            <td><?= h($titulo->moeda) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $titulo->has('user') ? $this->Html->link($titulo->user->id, ['controller' => 'Users', 'action' => 'view', $titulo->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($titulo->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($titulo->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($titulo->deleted) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Ativos') ?></h3>
    </div>
    <?php if (!empty($titulo->ativos)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Dt Compra') ?></th>
                <th><?= __('Dt Venda') ?></th>
                <th><?= __('Quantidade') ?></th>
                <th><?= __('Titulo Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($titulo->ativos as $ativos): ?>
                <tr>
                    <td><?= h($ativos->id) ?></td>
                    <td><?= h($ativos->created) ?></td>
                    <td><?= h($ativos->modified) ?></td>
                    <td><?= h($ativos->deleted) ?></td>
                    <td><?= h($ativos->dt_compra) ?></td>
                    <td><?= h($ativos->dt_venda) ?></td>
                    <td><?= h($ativos->quantidade) ?></td>
                    <td><?= h($ativos->titulo_id) ?></td>
                    <td><?= h($ativos->user_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Ativos', 'action' => 'view', $ativos->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Ativos', 'action' => 'edit', $ativos->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Ativos', 'action' => 'delete', $ativos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ativos->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Ativos</p>
    <?php endif; ?>
</div>

<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Tipo Titulos'), ['controller' => 'TipoTitulos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Tipo Titulo'), ['controller' => 'TipoTitulos', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Titulos'), ['controller' => 'Titulos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Titulo'), ['controller' => 'Titulos', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Tipo Titulos'), ['controller' => 'TipoTitulos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Tipo Titulo'), ['controller' => 'TipoTitulos', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Titulos'), ['controller' => 'Titulos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Titulo'), ['controller' => 'Titulos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($user->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($user->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Email') ?></td>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <td><?= __('Permissao') ?></td>
            <td><?= h($user->permissao) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($user->deleted) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Ativos') ?></h3>
    </div>
    <?php if (!empty($user->ativos)): ?>
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
            <?php foreach ($user->ativos as $ativos): ?>
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
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related TipoTitulos') ?></h3>
    </div>
    <?php if (!empty($user->tipo_titulos)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Descricao') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($user->tipo_titulos as $tipoTitulos): ?>
                <tr>
                    <td><?= h($tipoTitulos->id) ?></td>
                    <td><?= h($tipoTitulos->created) ?></td>
                    <td><?= h($tipoTitulos->modified) ?></td>
                    <td><?= h($tipoTitulos->deleted) ?></td>
                    <td><?= h($tipoTitulos->descricao) ?></td>
                    <td><?= h($tipoTitulos->user_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'TipoTitulos', 'action' => 'view', $tipoTitulos->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'TipoTitulos', 'action' => 'edit', $tipoTitulos->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'TipoTitulos', 'action' => 'delete', $tipoTitulos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoTitulos->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related TipoTitulos</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Titulos') ?></h3>
    </div>
    <?php if (!empty($user->titulos)): ?>
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
            <?php foreach ($user->titulos as $titulos): ?>
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

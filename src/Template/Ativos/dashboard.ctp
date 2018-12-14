<?php $this->extend('../Layout/TwitterBootstrap/dashboard'); ?>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
        <th>Título</th>
        <th>Data de compra</th>
        <th>Data de venda</th>
        <th>Quantidade</th>
        <th>Saldo</th>
        <th class="actions">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ativos as $ativo): ?>
        <tr>
        <td><?= h($ativo->titulo->nome) ?></td>
            <td><?= h($ativo->dt_compra) ?></td>
            <td><?= h($ativo->dt_venda) ?></td>
            <td><?= $this->Number->format($ativo->quantidade) ?></td>
            <td><?= $ativo->saldo ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $ativo->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $ativo->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $ativo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ativo->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

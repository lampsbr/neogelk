<?php 
$this->extend('../Layout/TwitterBootstrap/dashboard'); 
$this->start('titulo');
echo 'Dashboard';
echo $this->Html->link('', ['action' => 'add'], ['title' => 'Adicionar ativo', 'class' => 'btn btn-default glyphicon glyphicon-plus pull-right']);
$this->end();
?>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>Título</th>
            <th>Data de compra</th>
            <th>Data de venda</th>
            <th>Quantidade</th>
            <th>Saldo</th>
            <th>Lucro</th>
            <th>Últimas cotações</th>
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
            <td><?= $ativo->lucroTotal.' '.$ativo->lucroPorcento ?></td>
            <td><?= $ativo->ultimasCotacoes ?></td>
            <td class="actions">
                <?php if(empty($ativo->dt_venda)){ ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <?= $this->Form->create('', ['url' => ['controller' => 'cotacaos', 'action' => 'quickadd']]) ?>
                                <?= $this->Form->hidden('ativo_id', ['value' => $ativo->id]) ?>
                                <div class="input-group">
                                    <input type="decimal" class="form-control" placeholder="Insira cotação de hoje" required="true" name="valor">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Salvar</button>
                                    </span>
                                </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                <?php } ?>


                <?= $this->Html->link('', ['action' => 'view', $ativo->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $ativo->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $ativo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ativo->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

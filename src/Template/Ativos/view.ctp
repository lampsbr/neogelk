<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('titulo');
echo 'Detalhes de ativo'; 
echo $this->Form->postLink('', ['action' => 'delete', $ativo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ativo->titulo->nome), 'title' => 'Apagar', 'class' => 'btn btn-default glyphicon glyphicon-trash pull-right']);
echo $this->Html->link('', ['action' => 'edit', $ativo->id], ['title' => 'Editar', 'class' => 'btn btn-default glyphicon glyphicon-pencil pull-right']);
$this->end(); ?>
<div class="col-sm-6 col-lg-4">
    <div class="panel panel-default">
    <!-- Panel header -->
        <div class="panel-heading">
            <h3 class="panel-title"><?= h($ativo->titulo->nome) ?></h3>
        </div>
        <table class="table table-striped" cellpadding="0" cellspacing="0">
            <tr>
                <td>Título</td>
                <td><?= $ativo->has('titulo') ? $this->Html->link($ativo->titulo->nome, ['controller' => 'Titulos', 'action' => 'view', $ativo->titulo->id]) : '' ?></td>
            </tr>
            <tr>
                <td>Carteira</td>
                <td><?= $ativo->has('carteira') ? $this->Html->link($ativo->carteira->nome, ['controller' => 'Carteiras', 'action' => 'view', $ativo->carteira->id]) : '' ?></td>
            </tr>
            <tr>
                <td><?= __('User') ?></td>
                <td><?= $ativo->has('user') ? $this->Html->link($ativo->user->email, ['controller' => 'Users', 'action' => 'view', $ativo->user->id]) : '' ?></td>
            </tr>
            <tr>
                <td><?= __('Quantidade') ?></td>
                <td><?= $this->Number->format($ativo->quantidade) ?></td>
            </tr>
            <tr>
                <td>Data de Compra</td>
                <td><?= $ativo->dt_compra->i18nFormat('yyyy-MM-dd HH:mm:ss') ?></td>
            </tr>
            <?php if($ativo->dt_venda){ ?>
                <tr>
                    <td><?= __('Dt Venda') ?></td>
                    <td><?= $ativo->dt_venda?$ativo->dt_venda->i18nFormat('yyyy-MM-dd HH:mm:ss'):'' ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td>Total de proventos</td>
                <td><?= $ativo->titulo->moeda.' '.$ativo->total_proventos ?></td>
            </tr>
        </table>
    </div>
</div>

<div class="col-sm-6 col-lg-4">
    <div class="panel panel-default">
        <!-- Panel header -->
        <div class="panel-heading">
            <h3 class="panel-title">Cotações</h3>
        </div>
        <?php if (!empty($ativo->cotacaos)): ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?= __('Data') ?></th>
                    <th><?= __('Valor') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ativo->cotacaos as $cotacaos): ?>
                    <tr>
                        <td><?= h($cotacaos->data) ?></td>
                        <td><?= h($cotacaos->valor) ?></td>
                        <td class="actions">
                            <?= $this->Form->postLink('', ['controller' => 'Cotacaos', 'action' => 'delete', $cotacaos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cotacaos->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="panel-body">no related Cotacaos</p>
        <?php endif; ?>
    </div>
</div>

<div class="col-sm-6 col-lg-4">
    <div class="panel panel-default">
        <!-- Panel header -->
        <div class="panel-heading">
            <h3 class="panel-title">Proventos</h3>
            <?php echo $this->Html->link('', ['controller' => 'proventos', 'action' => 'add', $ativo->id], ['title' => 'Cadastrar provento', 'class' => 'btn btn-default glyphicon glyphicon-plus pull-right']); ?>
        </div>
        <?php if (!empty($ativo->proventos)): ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Valor total</th>
                    <th>Obs</th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ativo->proventos as $prov): ?>
                    <tr>
                        <td><?= h($prov->created) ?></td>
                        <td><?= h($prov->valor_total) ?></td>
                        <td><?= h($prov->descricao.(isset($prov->valor_individual)?' (valor individual: '.$prov->valor_individual.')':'')) ?></td>
                        <td class="actions">
                            <?= $this->Form->postLink('', ['controller' => 'Proventos', 'action' => 'delete', $prov->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cotacaos->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="panel-body">Sem proventos cadastrados</p>
        <?php endif; ?>
    </div>
</div>
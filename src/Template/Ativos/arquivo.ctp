<?php 
$this->extend('../Layout/TwitterBootstrap/dashboard'); 
$this->start('titulo');
echo 'Arquivo';
$this->end();
?>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>Título</th>
            <th>Carteira</th>
            <th>Data de compra</th>
            <th>Data de venda</th>
            <th>Quantidade</th>
            <th>Saldo</th>
            <th>Lucro</th>
            <th>Lucro no ano</th>
            <th>Últimas cotações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ativos as $ativo): ?>
        <tr>
        <td><?= $this->Html->link($ativo->titulo->nomeCompleto, ['action' => 'view', $ativo->id], ['title' => 'Detalhes do ativo']) ?></td>
            <td><?= isset($ativo->carteira)?$ativo->carteira->nome:'' ?></td>
            <td><?= $ativo->dt_compra->i18nFormat('yyyy-MM-dd') ?></td>
            <td><?= $ativo->dt_venda->i18nFormat('yyyy-MM-dd') ?></td>
            <td><?= $this->Number->format($ativo->quantidade) ?></td>
            <td><?= $ativo->saldo ?></td>
            <td><?= $ativo->lucroTotal.' '.$ativo->lucroPorcento ?></td>
            <td><?= $ativo->lucroNoAno.' '.$ativo->lucroNoAnoPorcento ?></td>
            <td><?= $ativo->ultimasCotacoes ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
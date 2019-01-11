<?php 
echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js');
echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.5.2/randomColor.min.js');

$this->extend('../Layout/TwitterBootstrap/dashboard'); 
$this->start('titulo');
echo 'Dashboard';
echo $this->Html->link('', ['action' => 'add'], ['title' => 'Adicionar ativo', 'class' => 'btn btn-default glyphicon glyphicon-plus pull-right']);
$this->end();
echo 'Saldo atual: '.$saldo;
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
            <th>Lucro no ano</th>
            <th>Últimas cotações</th>
            <th class="actions">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ativos as $ativo): ?>
        <tr>
        <td><?= $this->Html->link($ativo->titulo->nomeCompleto, ['action' => 'view', $ativo->id], ['title' => 'Detalhes do ativo']) ?></td>
            <td><?= $ativo->dt_compra->i18nFormat('yyyy-MM-dd') ?></td>
            <td><?= $ativo->dt_venda?$ativo->dt_venda->i18nFormat('yyyy-MM-dd'):'' ?></td>
            <td><?= $this->Number->format($ativo->quantidade) ?></td>
            <td><?= $ativo->saldo ?></td>
            <td><?= $ativo->lucroTotal.' '.$ativo->lucroPorcento ?></td>
            <td><?= $ativo->lucroNoAno.' '.$ativo->lucroNoAnoPorcento ?></td>
            <td><?= $ativo->ultimasCotacoes ?></td>
            <td class="actions">
                <?php if(empty($ativo->dt_venda)){ ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $this->Form->create('', ['url' => ['controller' => 'cotacaos', 'action' => 'quickadd']]) ?>
                                <?= $this->Form->hidden('ativo_id', ['value' => $ativo->id]) ?>
                                <div class="input-group">
                                    <input type="decimal" class="form-control" placeholder="Insira cotação de hoje" required="true" name="valor" size="30">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Salvar</button>
                                    </span>
                                    <span class="input-group-btn">
                                        <?= $this->Html->link('', ['controller' => 'cotacaos', 'action' => 'obtercotacao', $ativo->id], ['title' => 'Obter cotação recente', 'class' => 'btn btn-default glyphicon glyphicon-refresh']) ?>
                                    </span>
                                </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                <?php } ?>


                
                
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<canvas id="pieGeral"></canvas>
<script>
    //var randomColor = require('randomcolor');
    var qtdCores = <?=json_encode($pieGeralLabels)?>.length;
    var coresRandom=[];
    while(qtdCores>0){
        coresRandom.push(randomColor());
        qtdCores--;
    }
    var ctx = document.getElementById("pieGeral");
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?=json_encode($pieGeralLabels)?>,
            datasets: [{
                data: <?=json_encode($pieGeralValores)?>,
                borderWidth: 1,
                backgroundColor: coresRandom
            }]
        },
        options: {
        }
    });
</script>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provento $provento
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Proventos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Proventos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($provento); ?>
<fieldset>
    <legend>Cadastrar Provento para <?=$provento->ativo->titulo->nome?></legend>
    <?php
    echo $this->Form->hidden('ativo_id');
    echo $this->Form->control('valor_total');
    echo $this->Form->control('descricao');
    echo $this->Form->control('valor_individual');
    ?>
</fieldset>
<?= $this->Form->button('Cadastrar'); ?>
<?= $this->Form->end() ?>

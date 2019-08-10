<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operacao $operacao
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $operacao->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $operacao->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Operacaos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $operacao->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $operacao->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Operacaos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($operacao); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Operacao']) ?></legend>
    <?php
    echo $this->Form->control('deleted');
    echo $this->Form->control('ativo_id', ['options' => $ativos]);
    echo $this->Form->control('tipo');
    echo $this->Form->control('quantidade');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

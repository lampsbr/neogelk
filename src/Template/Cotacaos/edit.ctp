<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cotacao $cotacao
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $cotacao->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $cotacao->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Cotacaos'), ['action' => 'index']) ?></li>
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
        ['action' => 'delete', $cotacao->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $cotacao->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Cotacaos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($cotacao, ['type'=>'post','enctype' => 'multipart/form-data']); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Cotacao']) ?></legend>
    <?php
    echo $this->Form->control('deleted');
    echo $this->Form->control('data');
    echo $this->Form->control('valor');
    echo $this->Form->control('ativos_id', ['options' => $ativos]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

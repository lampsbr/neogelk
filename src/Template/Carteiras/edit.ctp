<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carteira $carteira
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $carteira->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $carteira->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Carteiras'), ['action' => 'index']) ?></li>
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
        ['action' => 'delete', $carteira->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $carteira->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Carteiras'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($carteira); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Carteira']) ?></legend>
    <?php
    echo $this->Form->control('nome');
    echo $this->Form->control('observacao');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

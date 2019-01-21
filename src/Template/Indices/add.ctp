<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Index $index
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Indices'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Indices'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($index); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Index']) ?></legend>
    <?php
    echo $this->Form->control('nome');
    echo $this->Form->control('descricao');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>

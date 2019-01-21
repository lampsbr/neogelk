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
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $index->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $index->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Indices'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $index->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $index->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Indices'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($index); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Index']) ?></legend>
    <?php
    echo $this->Form->control('deleted');
    echo $this->Form->control('nome');
    echo $this->Form->control('descricao');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

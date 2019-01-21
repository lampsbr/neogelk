<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IndiceCotacao $indiceCotacao
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $indiceCotacao->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $indiceCotacao->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Indice Cotacaos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Indices'), ['controller' => 'Indices', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Index'), ['controller' => 'Indices', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $indiceCotacao->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $indiceCotacao->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Indice Cotacaos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Indices'), ['controller' => 'Indices', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Index'), ['controller' => 'Indices', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($indiceCotacao); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Indice Cotacao']) ?></legend>
    <?php
    echo $this->Form->control('deleted');
    echo $this->Form->control('valor');
    echo $this->Form->control('indices_id', ['options' => $indices]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

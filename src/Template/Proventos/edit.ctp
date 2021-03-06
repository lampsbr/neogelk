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
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $provento->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $provento->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Proventos'), ['action' => 'index']) ?></li>
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
        ['action' => 'delete', $provento->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $provento->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Proventos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($provento); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Provento']) ?></legend>
    <?php
    echo $this->Form->control('deleted');
    echo $this->Form->control('ativo_id', ['options' => $ativos]);
    echo $this->Form->control('valor_total');
    echo $this->Form->control('descricao');
    echo $this->Form->control('valor_individual');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

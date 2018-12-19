<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $user->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Tipo Titulos'), ['controller' => 'TipoTitulos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Tipo Titulo'), ['controller' => 'TipoTitulos', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Titulos'), ['controller' => 'Titulos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Titulo'), ['controller' => 'Titulos', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $user->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Ativos'), ['controller' => 'Ativos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ativo'), ['controller' => 'Ativos', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Tipo Titulos'), ['controller' => 'TipoTitulos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Tipo Titulo'), ['controller' => 'TipoTitulos', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Titulos'), ['controller' => 'Titulos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Titulo'), ['controller' => 'Titulos', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($user, ['type'=>'post','enctype' => 'multipart/form-data']); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['User']) ?></legend>
    <?php
    echo $this->Form->control('email');
    echo $this->Form->control('password');
    echo $this->Form->control('permissao');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

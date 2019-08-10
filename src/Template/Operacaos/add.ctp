<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operacao $operacao
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

echo $this->Form->create($operacao); ?>
<fieldset>
    <legend>Cadastrar operação</legend>
    <?php
    echo $this->Form->hidden('ativo_id');
    echo $this->Form->control('tipo');
    echo $this->Form->control('quantidade');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>

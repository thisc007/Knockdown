<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rolepayment $rolepayment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rolepayments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rolepayments form large-9 medium-8 columns content">
    <?= $this->Form->create($rolepayment) ?>
    <fieldset>
        <legend><?= __('Add Rolepayment') ?></legend>
        <?php
            echo $this->Form->control('roles_id', ['options' => $roles]);
            echo $this->Form->control('timesinayear');
            echo $this->Form->control('value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

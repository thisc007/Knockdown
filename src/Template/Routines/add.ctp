<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Routine $routine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Routines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="routines form large-9 medium-8 columns content">
    <?= $this->Form->create($routine) ?>
    <fieldset>
        <legend><?= __('Add Routine') ?></legend>
        <?php
            echo $this->Form->control('competitions_id', ['options' => $competitions]);
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('average');
            echo $this->Form->control('position');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

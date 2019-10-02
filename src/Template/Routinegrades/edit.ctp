<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Routinegrade $routinegrade
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $routinegrade->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $routinegrade->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Routinegrades'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Routines'), ['controller' => 'Routines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Routine'), ['controller' => 'Routines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="routinegrades form large-9 medium-8 columns content">
    <?= $this->Form->create($routinegrade) ?>
    <fieldset>
        <legend><?= __('Edit Routinegrade') ?></legend>
        <?php
            echo $this->Form->control('routines_id', ['options' => $routines]);
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('grade');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Routinediscount $routinediscount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $routinediscount->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $routinediscount->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Routinediscounts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Routines'), ['controller' => 'Routines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Routine'), ['controller' => 'Routines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Competitionrules'), ['controller' => 'Competitionrules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competitionrule'), ['controller' => 'Competitionrules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="routinediscounts form large-9 medium-8 columns content">
    <?= $this->Form->create($routinediscount) ?>
    <fieldset>
        <legend><?= __('Edit Routinediscount') ?></legend>
        <?php
            echo $this->Form->control('routines_id', ['options' => $routines]);
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('competitionrules_id', ['options' => $competitionrules]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

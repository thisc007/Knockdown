<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Playoffdocket $playoffdocket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Playoffdockets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Playoffs'), ['controller' => 'Playoffs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Playoff'), ['controller' => 'Playoffs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="playoffdockets form large-9 medium-8 columns content">
    <?= $this->Form->create($playoffdocket) ?>
    <fieldset>
        <legend><?= __('Add Playoffdocket') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('playoffs_id', ['options' => $playoffs]);
            echo $this->Form->control('fighter');
            echo $this->Form->control('Comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

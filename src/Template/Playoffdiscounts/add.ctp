<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Playoffdiscount $playoffdiscount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Playoffdiscounts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rules'), ['controller' => 'Rules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rule'), ['controller' => 'Rules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="playoffdiscounts form large-9 medium-8 columns content">
    <?= $this->Form->create($playoffdiscount) ?>
    <fieldset>
        <legend><?= __('Add Playoffdiscount') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('fighter');
            echo $this->Form->control('rules_id', ['options' => $rules]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

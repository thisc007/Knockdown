<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Playoffreferee $playoffreferee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Playoffreferees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Playoffs'), ['controller' => 'Playoffs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Playoff'), ['controller' => 'Playoffs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="playoffreferees form large-9 medium-8 columns content">
    <?= $this->Form->create($playoffreferee) ?>
    <fieldset>
        <legend><?= __('Add Playoffreferee') ?></legend>
        <?php
            echo $this->Form->control('playoffs_id', ['options' => $playoffs]);
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('resultfighter1');
            echo $this->Form->control('resultfighter2');
            echo $this->Form->control('round');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

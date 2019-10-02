<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Suspension $suspension
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $suspension->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $suspension->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Suspensions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="suspensions form large-9 medium-8 columns content">
    <?= $this->Form->create($suspension) ?>
    <fieldset>
        <legend><?= __('Edit Suspension') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('days');
            echo $this->Form->control('description');
            echo $this->Form->control('startdate');
            echo $this->Form->control('baned');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

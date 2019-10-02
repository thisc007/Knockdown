<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Routinegrade $routinegrade
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Routinegrade'), ['action' => 'edit', $routinegrade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Routinegrade'), ['action' => 'delete', $routinegrade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routinegrade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Routinegrades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Routinegrade'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routines'), ['controller' => 'Routines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Routine'), ['controller' => 'Routines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="routinegrades view large-9 medium-8 columns content">
    <h3><?= h($routinegrade->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Routine') ?></th>
            <td><?= $routinegrade->has('routine') ? $this->Html->link($routinegrade->routine->id, ['controller' => 'Routines', 'action' => 'view', $routinegrade->routine->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $routinegrade->has('user') ? $this->Html->link($routinegrade->user->id, ['controller' => 'Users', 'action' => 'view', $routinegrade->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($routinegrade->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grade') ?></th>
            <td><?= $this->Number->format($routinegrade->grade) ?></td>
        </tr>
    </table>
</div>

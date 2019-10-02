<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Routinediscount $routinediscount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Routinediscount'), ['action' => 'edit', $routinediscount->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Routinediscount'), ['action' => 'delete', $routinediscount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routinediscount->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Routinediscounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Routinediscount'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routines'), ['controller' => 'Routines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Routine'), ['controller' => 'Routines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Competitionrules'), ['controller' => 'Competitionrules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Competitionrule'), ['controller' => 'Competitionrules', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="routinediscounts view large-9 medium-8 columns content">
    <h3><?= h($routinediscount->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Routine') ?></th>
            <td><?= $routinediscount->has('routine') ? $this->Html->link($routinediscount->routine->id, ['controller' => 'Routines', 'action' => 'view', $routinediscount->routine->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $routinediscount->has('user') ? $this->Html->link($routinediscount->user->id, ['controller' => 'Users', 'action' => 'view', $routinediscount->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Competitionrule') ?></th>
            <td><?= $routinediscount->has('competitionrule') ? $this->Html->link($routinediscount->competitionrule->id, ['controller' => 'Competitionrules', 'action' => 'view', $routinediscount->competitionrule->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($routinediscount->id) ?></td>
        </tr>
    </table>
</div>

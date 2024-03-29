<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Routine $routine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Routine'), ['action' => 'edit', $routine->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Routine'), ['action' => 'delete', $routine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routine->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Routines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Routine'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="routines view large-9 medium-8 columns content">
    <h3><?= h($routine->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Competition') ?></th>
            <td><?= $routine->has('competition') ? $this->Html->link($routine->competition->name, ['controller' => 'Competitions', 'action' => 'view', $routine->competition->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $routine->has('user') ? $this->Html->link($routine->user->id, ['controller' => 'Users', 'action' => 'view', $routine->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($routine->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Average') ?></th>
            <td><?= $this->Number->format($routine->average) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $this->Number->format($routine->position) ?></td>
        </tr>
    </table>
</div>

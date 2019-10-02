<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Playoff $playoff
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Playoff'), ['action' => 'edit', $playoff->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Playoff'), ['action' => 'delete', $playoff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playoff->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Playoffs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Playoff'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="playoffs view large-9 medium-8 columns content">
    <h3><?= h($playoff->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Competition') ?></th>
            <td><?= $playoff->has('competition') ? $this->Html->link($playoff->competition->name, ['controller' => 'Competitions', 'action' => 'view', $playoff->competition->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $playoff->has('user') ? $this->Html->link($playoff->user->id, ['controller' => 'Users', 'action' => 'view', $playoff->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($playoff->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Users2 Id') ?></th>
            <td><?= $this->Number->format($playoff->users2_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Result') ?></th>
            <td><?= $playoff->result ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

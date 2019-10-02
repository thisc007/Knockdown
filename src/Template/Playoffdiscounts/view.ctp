<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Playoffdiscount $playoffdiscount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Playoffdiscount'), ['action' => 'edit', $playoffdiscount->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Playoffdiscount'), ['action' => 'delete', $playoffdiscount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playoffdiscount->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Playoffdiscounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Playoffdiscount'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rules'), ['controller' => 'Rules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rule'), ['controller' => 'Rules', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="playoffdiscounts view large-9 medium-8 columns content">
    <h3><?= h($playoffdiscount->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $playoffdiscount->has('user') ? $this->Html->link($playoffdiscount->user->id, ['controller' => 'Users', 'action' => 'view', $playoffdiscount->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rule') ?></th>
            <td><?= $playoffdiscount->has('rule') ? $this->Html->link($playoffdiscount->rule->name, ['controller' => 'Rules', 'action' => 'view', $playoffdiscount->rule->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($playoffdiscount->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fighter') ?></th>
            <td><?= $playoffdiscount->fighter ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

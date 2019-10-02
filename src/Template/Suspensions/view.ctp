<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Suspension $suspension
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Suspension'), ['action' => 'edit', $suspension->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Suspension'), ['action' => 'delete', $suspension->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suspension->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Suspensions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Suspension'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="suspensions view large-9 medium-8 columns content">
    <h3><?= h($suspension->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $suspension->has('user') ? $this->Html->link($suspension->user->id, ['controller' => 'Users', 'action' => 'view', $suspension->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($suspension->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Days') ?></th>
            <td><?= $this->Number->format($suspension->days) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Startdate') ?></th>
            <td><?= h($suspension->startdate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Baned') ?></th>
            <td><?= $suspension->baned ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($suspension->description)); ?>
    </div>
</div>

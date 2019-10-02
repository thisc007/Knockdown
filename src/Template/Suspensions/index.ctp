<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Suspension[]|\Cake\Collection\CollectionInterface $suspensions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Suspension'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="suspensions index large-9 medium-8 columns content">
    <h3><?= __('Suspensions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('days') ?></th>
                <th scope="col"><?= $this->Paginator->sort('startdate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('baned') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suspensions as $suspension): ?>
            <tr>
                <td><?= $this->Number->format($suspension->id) ?></td>
                <td><?= $suspension->has('user') ? $this->Html->link($suspension->user->id, ['controller' => 'Users', 'action' => 'view', $suspension->user->id]) : '' ?></td>
                <td><?= $this->Number->format($suspension->days) ?></td>
                <td><?= h($suspension->startdate) ?></td>
                <td><?= h($suspension->baned) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $suspension->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $suspension->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $suspension->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suspension->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

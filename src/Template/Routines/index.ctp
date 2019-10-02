<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Routine[]|\Cake\Collection\CollectionInterface $routines
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Routine'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="routines index large-9 medium-8 columns content">
    <h3><?= __('Routines') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('competitions_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('average') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($routines as $routine): ?>
            <tr>
                <td><?= $this->Number->format($routine->id) ?></td>
                <td><?= $routine->has('competition') ? $this->Html->link($routine->competition->name, ['controller' => 'Competitions', 'action' => 'view', $routine->competition->id]) : '' ?></td>
                <td><?= $routine->has('user') ? $this->Html->link($routine->user->id, ['controller' => 'Users', 'action' => 'view', $routine->user->id]) : '' ?></td>
                <td><?= $this->Number->format($routine->average) ?></td>
                <td><?= $this->Number->format($routine->position) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $routine->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $routine->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $routine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routine->id)]) ?>
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

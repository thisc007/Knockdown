<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Playoff[]|\Cake\Collection\CollectionInterface $playoffs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Playoff'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="playoffs index large-9 medium-8 columns content">
    <h3><?= __('Playoffs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('competitions_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users2_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('result') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($playoffs as $playoff): ?>
            <tr>
                <td><?= $this->Number->format($playoff->id) ?></td>
                <td><?= $playoff->has('competition') ? $this->Html->link($playoff->competition->name, ['controller' => 'Competitions', 'action' => 'view', $playoff->competition->id]) : '' ?></td>
                <td><?= $playoff->has('user') ? $this->Html->link($playoff->user->id, ['controller' => 'Users', 'action' => 'view', $playoff->user->id]) : '' ?></td>
                <td><?= $this->Number->format($playoff->users2_id) ?></td>
                <td><?= h($playoff->result) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $playoff->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $playoff->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $playoff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playoff->id)]) ?>
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

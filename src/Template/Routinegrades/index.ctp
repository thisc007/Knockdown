<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Routinegrade[]|\Cake\Collection\CollectionInterface $routinegrades
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Routinegrade'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routines'), ['controller' => 'Routines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Routine'), ['controller' => 'Routines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="routinegrades index large-9 medium-8 columns content">
    <h3><?= __('Routinegrades') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('routines_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grade') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($routinegrades as $routinegrade): ?>
            <tr>
                <td><?= $this->Number->format($routinegrade->id) ?></td>
                <td><?= $routinegrade->has('routine') ? $this->Html->link($routinegrade->routine->id, ['controller' => 'Routines', 'action' => 'view', $routinegrade->routine->id]) : '' ?></td>
                <td><?= $routinegrade->has('user') ? $this->Html->link($routinegrade->user->id, ['controller' => 'Users', 'action' => 'view', $routinegrade->user->id]) : '' ?></td>
                <td><?= $this->Number->format($routinegrade->grade) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $routinegrade->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $routinegrade->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $routinegrade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routinegrade->id)]) ?>
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

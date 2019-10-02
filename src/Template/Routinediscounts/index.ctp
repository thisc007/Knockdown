<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Routinediscount[]|\Cake\Collection\CollectionInterface $routinediscounts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Routinediscount'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routines'), ['controller' => 'Routines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Routine'), ['controller' => 'Routines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Competitionrules'), ['controller' => 'Competitionrules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competitionrule'), ['controller' => 'Competitionrules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="routinediscounts index large-9 medium-8 columns content">
    <h3><?= __('Routinediscounts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('routines_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('competitionrules_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($routinediscounts as $routinediscount): ?>
            <tr>
                <td><?= $this->Number->format($routinediscount->id) ?></td>
                <td><?= $routinediscount->has('routine') ? $this->Html->link($routinediscount->routine->id, ['controller' => 'Routines', 'action' => 'view', $routinediscount->routine->id]) : '' ?></td>
                <td><?= $routinediscount->has('user') ? $this->Html->link($routinediscount->user->id, ['controller' => 'Users', 'action' => 'view', $routinediscount->user->id]) : '' ?></td>
                <td><?= $routinediscount->has('competitionrule') ? $this->Html->link($routinediscount->competitionrule->id, ['controller' => 'Competitionrules', 'action' => 'view', $routinediscount->competitionrule->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $routinediscount->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $routinediscount->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $routinediscount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routinediscount->id)]) ?>
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

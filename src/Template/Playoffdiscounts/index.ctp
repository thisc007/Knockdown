<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Playoffdiscount[]|\Cake\Collection\CollectionInterface $playoffdiscounts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Playoffdiscount'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rules'), ['controller' => 'Rules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rule'), ['controller' => 'Rules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="playoffdiscounts index large-9 medium-8 columns content">
    <h3><?= __('Playoffdiscounts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fighter') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rules_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($playoffdiscounts as $playoffdiscount): ?>
            <tr>
                <td><?= $this->Number->format($playoffdiscount->id) ?></td>
                <td><?= $playoffdiscount->has('user') ? $this->Html->link($playoffdiscount->user->id, ['controller' => 'Users', 'action' => 'view', $playoffdiscount->user->id]) : '' ?></td>
                <td><?= h($playoffdiscount->fighter) ?></td>
                <td><?= $playoffdiscount->has('rule') ? $this->Html->link($playoffdiscount->rule->name, ['controller' => 'Rules', 'action' => 'view', $playoffdiscount->rule->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $playoffdiscount->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $playoffdiscount->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $playoffdiscount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playoffdiscount->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Playoffreferee[]|\Cake\Collection\CollectionInterface $playoffreferees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Playoffreferee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Playoffs'), ['controller' => 'Playoffs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Playoff'), ['controller' => 'Playoffs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="playoffreferees index large-9 medium-8 columns content">
    <h3><?= __('Playoffreferees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('playoffs_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resultfighter1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resultfighter2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('round') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($playoffreferees as $playoffreferee): ?>
            <tr>
                <td><?= $this->Number->format($playoffreferee->id) ?></td>
                <td><?= $playoffreferee->has('playoff') ? $this->Html->link($playoffreferee->playoff->id, ['controller' => 'Playoffs', 'action' => 'view', $playoffreferee->playoff->id]) : '' ?></td>
                <td><?= $playoffreferee->has('user') ? $this->Html->link($playoffreferee->user->id, ['controller' => 'Users', 'action' => 'view', $playoffreferee->user->id]) : '' ?></td>
                <td><?= $this->Number->format($playoffreferee->resultfighter1) ?></td>
                <td><?= $this->Number->format($playoffreferee->resultfighter2) ?></td>
                <td><?= $this->Number->format($playoffreferee->round) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $playoffreferee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $playoffreferee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $playoffreferee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playoffreferee->id)]) ?>
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

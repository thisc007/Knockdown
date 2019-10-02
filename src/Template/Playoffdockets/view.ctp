<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Playoffdocket $playoffdocket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Playoffdocket'), ['action' => 'edit', $playoffdocket->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Playoffdocket'), ['action' => 'delete', $playoffdocket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playoffdocket->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Playoffdockets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Playoffdocket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Playoffs'), ['controller' => 'Playoffs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Playoff'), ['controller' => 'Playoffs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="playoffdockets view large-9 medium-8 columns content">
    <h3><?= h($playoffdocket->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $playoffdocket->has('user') ? $this->Html->link($playoffdocket->user->id, ['controller' => 'Users', 'action' => 'view', $playoffdocket->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Playoff') ?></th>
            <td><?= $playoffdocket->has('playoff') ? $this->Html->link($playoffdocket->playoff->id, ['controller' => 'Playoffs', 'action' => 'view', $playoffdocket->playoff->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($playoffdocket->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fighter') ?></th>
            <td><?= $playoffdocket->fighter ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($playoffdocket->Comment)); ?>
    </div>
</div>

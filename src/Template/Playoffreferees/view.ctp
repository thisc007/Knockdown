<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Playoffreferee $playoffreferee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Playoffreferee'), ['action' => 'edit', $playoffreferee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Playoffreferee'), ['action' => 'delete', $playoffreferee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playoffreferee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Playoffreferees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Playoffreferee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Playoffs'), ['controller' => 'Playoffs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Playoff'), ['controller' => 'Playoffs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="playoffreferees view large-9 medium-8 columns content">
    <h3><?= h($playoffreferee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Playoff') ?></th>
            <td><?= $playoffreferee->has('playoff') ? $this->Html->link($playoffreferee->playoff->id, ['controller' => 'Playoffs', 'action' => 'view', $playoffreferee->playoff->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $playoffreferee->has('user') ? $this->Html->link($playoffreferee->user->id, ['controller' => 'Users', 'action' => 'view', $playoffreferee->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($playoffreferee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resultfighter1') ?></th>
            <td><?= $this->Number->format($playoffreferee->resultfighter1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resultfighter2') ?></th>
            <td><?= $this->Number->format($playoffreferee->resultfighter2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Round') ?></th>
            <td><?= $this->Number->format($playoffreferee->round) ?></td>
        </tr>
    </table>
</div>

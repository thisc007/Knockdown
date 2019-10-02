<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rolepayment $rolepayment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rolepayment'), ['action' => 'edit', $rolepayment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rolepayment'), ['action' => 'delete', $rolepayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rolepayment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rolepayments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rolepayment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rolepayments view large-9 medium-8 columns content">
    <h3><?= h($rolepayment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $rolepayment->has('role') ? $this->Html->link($rolepayment->role->name, ['controller' => 'Roles', 'action' => 'view', $rolepayment->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($rolepayment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timesinayear') ?></th>
            <td><?= $this->Number->format($rolepayment->timesinayear) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= $this->Number->format($rolepayment->value) ?></td>
        </tr>
    </table>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer Table'), ['action' => 'edit', $customerTable->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer Table'), ['action' => 'delete', $customerTable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerTable->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customer Table'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Table'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customerTable view large-9 medium-8 columns content">
    <h3><?= h($customerTable->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Customer Number') ?></th>
            <td><?= h($customerTable->customer_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer Name') ?></th>
            <td><?= h($customerTable->customer_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone Number') ?></th>
            <td><?= h($customerTable->phone_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($customerTable->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($customerTable->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($customerTable->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($customerTable->modified) ?></td>
        </tr>
    </table>
</div>

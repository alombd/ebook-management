<style>
table {
    border-collapse: collapse;
    width: 100%;
}

tr th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
<?php //include 'costompage.ctp';  ?>

<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        <li class="headin"  style="font-size: 19px;"><?= $this->Html->link(__('My Profile'), ['controller' =>'Users','action' => 'myprofile']) ?></li>

        <li><?= $this->Html->link(__('New User Add'), ['action' => 'add']) ?></li>

        <li><?= $this->Html->link(__('User Profile'), ['controller' =>'UserProfiles','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__( 'Book Menu '), ['controller' =>'BookMenus','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__( 'Customer Table '), ['controller' =>'CustomerTable','action' => 'index']) ?></li>
         
    </ul>
</nav>
<div class="users index large-10 medium-8 columns content">
    <?php if ($role == 1)  { ?>
    <h3><?= __('Admin panel') ?></h3>
    <?php } else { ?>
    <h3><?= __('User panel') ?></h3>
    <?php } ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
              
                <th><?= $this->Paginator->sort('user_name') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('phone_number') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                
                <td><?= h($user->user_name) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->phone_number) ?></td>
                <td class="actions">

                    <?php if ($role == 1) { ?>

                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    <?php } else { ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>

                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

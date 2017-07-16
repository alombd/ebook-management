<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-10 medium-6 columns content">
    <h3><?= __('Users Profile') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('phone_number') ?></th>
                <th><?= $this->Paginator->sort('present_address') ?></th>
                <th><?= $this->Paginator->sort('permanent_address') ?></th>
                <th><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th><?= $this->Paginator->sort('profile_photo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userprofiles as $userprofile): ?>
            <tr>
                
                <td><?= h($userprofile->first_name) ?></td>
                <td><?= h($userprofile->last_name) ?></td>
                <td><?= h($userprofile->email) ?></td>
                <td><?= h($userprofile->phone_number) ?></td>
                <td><?= h($userprofile->present_address) ?></td>
                <td><?= h($userprofile->permanent_address) ?></td>
                <td><?= h($userprofile->date_of_birth) ?></td>

                 <td>
                    <img src="<?php echo $this->request->webroot.'uploads_profile/'.$userprofile['profile_photo']; ?>">
                 </td>  
                   
                <td class="actions">
                    <?php if ($role == 1){ ?>

                    <?= $this->Html->link(__('View'), ['action' => 'view', $userprofile->id]) ?>
                     <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userprofile->id]) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userprofile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userprofile->id)]) ?>
                    <?php } else { ?>
                   
                   <?= $this->Html->link(__('View'), ['action' => 'view', $userprofile->id]) ?>
                   <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userprofile->id]) ?>
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

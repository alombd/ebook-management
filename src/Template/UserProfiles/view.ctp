<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $userprofile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $userprofile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userprofile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($userprofile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($userprofile->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($userprofile->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($userprofile->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone Number') ?></th>
            <td><?= h($userprofile->phone_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Present Address') ?></th>
            <td><?= h($userprofile->present_address) ?></td>
        </tr>
        <tr>
            <th><?= __('Permanent Address') ?></th>
            <td><?= h($userprofile->permanent_address) ?></td>
        </tr>
         <tr>
            <th><?= __('Date Of Birth') ?></th>
            <td><?= h($userprofile->date_of_birth) ?></td>
        </tr>
         <tr>
            <th><?= __('Profile Photo') ?></th>
            <td><img src="<?php echo $this->request->webroot.'uploads_profile/'.$userprofile['profile_photo']; ?>"></td>
        </tr>
    </table>
</div>

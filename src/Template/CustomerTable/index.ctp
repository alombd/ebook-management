<!DOCTYPE html>
<html>
<head>
<style>
body {
    margin: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    
    background-color: #1c1c1c;
   float: left;
  
    overflow: auto;
    width: 300px;
}

li a {
    display: block;
    color: #fff;
    padding: 8px 16px;
    text-decoration: none;
    border-bottom: 1px #595959 solid;
}

li a.active {
    background-color: green;
    color: white;
}

li a:hover:not(.active) {
    background-color: green;
    color: white;
}

.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

.button5:hover {
    background-color: #555555;
    color: white;
}
.logout{
  float: right;
   /*background-color: #d4e5e5;*/
  margin-right: 20px;
  color: #fff;

}
.logout a{
  color: #fff;
 }
</style>
</head>
<body>
  <div style="overflow:hidden; background:#595959;">

<div  class="logout">
 
    <h3>
    <?= $this->Html->link(__( 'Logout'), ['controller' =>'Users','action' => 'logout']) ?>
    </h3>
  </div>

  </div>
  <div class="mmenu" style="overflow:hidden; background:#595959; padding:30px 0px 0px 0px;">

<ul>
   
   </ul>      
    
  </div>
<div style="overflow:hidden">
<ul>
 
         <li><?= $this->Html->link(__('Users Table'), ['controller' =>'Users','action' => 'index']) ?></li>
          <li><?= $this->Html->link(__('My Profile'), ['controller' =>'Users','action' => 'myprofile']) ?></li>
        

        <li><?= $this->Html->link(__('User Profile'), ['controller' =>'UserProfiles','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__( 'Book Menu '), ['controller' =>'BookMenus','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__( 'Customer Table '), ['controller' =>'CustomerTable','action' => 'index']) ?></li>
</ul>

<div class="customerTable index large-9 medium-8 columns content">
  <div style="float: right; margin-top: 30px;">
     <?= $this->Html->link(__('Customer Add'), ['action' => 'add']) ?>
   </div>
    <h3><?= __('Customer Table') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('customer_number') ?></th>
                <th><?= $this->Paginator->sort('customer_name') ?></th>
                <th><?= $this->Paginator->sort('phone_number') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customerTable as $customerTable): ?>
            <tr>
                <td><?= h($customerTable->customer_number) ?></td>
                <td><?= h($customerTable->customer_name) ?></td>
                <td><?= h($customerTable->phone_number) ?></td>
                <td><?= h($customerTable->email) ?></td>
                <td class="actions">

                    <?php if ($role == 1) { ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customerTable->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customerTable->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customerTable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerTable->id)]) ?>

                    <?php } else { ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customerTable->id]) ?>
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

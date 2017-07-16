<!DOCTYPE html>
<!-- /**
 *  @ Developed By IECL,
 *  @ Author By Md.Alamgir Hossen ,
 *  @ Start  Date : 14-Fer-2016,
 *  @ Copyright : IECL,
 *  @ Web Url : http:imed.gov.bd
 */ -->
<html>
<head>
  <link rel="stylesheet" href="css/vertical.news.slider.css?v=1.0">
  <?php echo $this->Html->css(['style']); ?>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style_login.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script> 
   /*   $(document).ready(function(){
          $("#flip").click(function(){
              $("#panel").slideDown(5000);
          });
          $("#stop").click(function(){
              $("#panel").stop();
          });
      });*/
      </script>

</head>
<body>
<div class="wrapper">
<div class="header">
  <?php echo $this->Html->image('/img/ebook icon-.png');  ?>
<div class="login_reg">

<?php if ($id){ ?>

<?php echo $this->Html->link(
        'Logout',
        ['controller' => 'Users' , 'action' =>'logout']
        ); 
}

else{
      ?>


       <?php

          echo $this->Html->link(
          'Registration',
          ['controller' => 'Users' , 'action' =>'add']
          ); 
        
         echo $this->Html->link(
          'Login',
          ['controller' => 'Users' , 'action' =>'login']
          );

          } 
      ?>
      
    
    </div>
</div>
    <div>
      <ul>
         <li>
          <?php if ($id) { ?>
           <?php echo $this->Html->link(
              'Home',
              ['controller' => 'Homes', 'action' => 'index']
              ); 
            ?>
         </li>
         <li>
            <?php echo $this->Html->link(
              'Services',
              ['controller' => 'Homes', 'action' => 'services']
              ); 
            ?>
         </li>
        <li>
            <?php echo $this->Html->link(
              'About Us',
              ['controller' => 'Homes', 'action' => 'about']
              ); 
            ?>
            <?php echo $this->Html->link(
              'My Profiles',
              ['controller' => 'Users', 'action' => 'myprofile']
              ); 
            ?>
            <?php echo $this->Html->link(
              'Book List',
              ['controller' => 'BookMenus', 'action' => 'index']
              ); 
            ?>
   
          <?php } else {  ?>

            <?php echo $this->Html->link(
              'Home',
              ['controller' => 'Homes', 'action' => 'index']
              ); 
            ?>
         </li>
         <li>
            <?php echo $this->Html->link(
              'Services',
              ['controller' => 'Homes', 'action' => 'services']
              ); 
            ?>
         </li>
        <li>
            <?php echo $this->Html->link(
              'About Us',
              ['controller' => 'Homes', 'action' => 'about']
              ); 
            ?>
         </li>
        <li>
          
            <?php echo $this->Html->link(
              'Contact Us',
              ['controller' => 'Homes', 'action' => 'contact']
              ); 
            ?>
            <?php } ?>
         </li>
      </ul>
    </div>

<nav class="large-2 medium-4 columns" id="actions-sidebar" style="background: rgb(204, 204, 255) none repeat scroll 0% 0%;";> 
        
</nav>
<div class="users index large-10 medium-8 columns content">
        <div style="float: right; margin-top: 38px; font-size: 20px;">
            <?php if ($role == 1) { ?>
            <?= $this->Html->link(__('Add Books'), ['action' => 'add']) ?>
            <?php } else {

            } ?>
        </div>
    <h3><?= __('Book List') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
               
                <th><?= $this->Paginator->sort('book_number') ?></th>
                <th><?= $this->Paginator->sort('book_name') ?></th>
                <th><?= $this->Paginator->sort('category') ?></th>
                <th><?= $this->Paginator->sort('summery') ?></th>
                <th><?= $this->Paginator->sort('Download') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody style="background-color: rgb(245, 245, 245);">
            <?php foreach ($bookmenus as $bookminu): ?>
            <tr>
                
                <td><?= h($bookminu->book_number) ?></td>
                <td><?= h($bookminu->book_name) ?></td>
                <td><?= h($bookminu->category) ?></td>
                <td><?= h($bookminu->summery) ?></td>
                <td> 
                    <?php if (!empty($bookminu['ebook_pic'])){ 
                        //pr($this->request->webroot);
                        ?>
                    <a target="_blank" href="<?php echo $this->request->webroot.'webroot/uploads/'.$bookminu['ebook_pic']; ?>">Download File</a>
                   <?php } else {
                    echo 'No Preview <br><br>Available';
                   }?>
                </td>
                <td class="actions">
                    <?php if ($role == 1) { ?>

                    <?= $this->Html->link(__('View'), ['action' => 'view', $bookminu->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bookminu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookminu->id)]) ?>
                    <?php } else { ?>
                    
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bookminu->id]) ?>
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

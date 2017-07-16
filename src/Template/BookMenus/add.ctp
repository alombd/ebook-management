
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


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('<h3>Actions</h3>') ?></li>
        <li><?= $this->Html->link(__('Add Book '), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create('addbook',['enctype' => 'multipart/form-data']); ?>
    <fieldset>
        <legend><?= __('<h3>Add Book </h3>') ?></legend>
            
            <?= $this->Form->input('book_number');?>
          
            <?= $this->Form->input('book_name'); ?>
            
            <?= $this->Form->input('category'); ?>
           
            <?= $this->Form->input('summery'); ?>
            <?= $this->Form->input('ebook_pic', array('type' => 'file')); ?>
    
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


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

<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
      <?php if ( $role == 1) { ?>
       
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
              )
          ?>
      </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
    <?php } else { } ?>
</nav>
<div class="users form large-10 medium-8 columns content">
    <?= $this->Form->create($user,['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input(
                  'id',
                  array(
                  'type' => 'hidden',
                  'value'=>$id
                  ));
            
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('phone_number');
        ?>
            <label>Present Address</label>
            <?= $this->Form->textarea('present_address'); ?>
            <label>Permanent Address</label>
            <?= $this->Form->textarea('permanent_address'); ?>

           <?php echo $this->Form->input('date_of_birth', array(
                'class' => 'input date',
                'type' => 'date'
                ));
                ?>
       
        <label><b>profile photo</b></label>
        <?php
             echo $this->Form->file('profile_photo',array(
              'class'=>'form-control',
              'id'=> '',
              'label'=>false,
              'type'=>'file',
              'style'=>'margin:0;padding:0;',
              'required'=>'false'
            ));
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

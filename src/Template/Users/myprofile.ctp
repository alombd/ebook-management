<style type="text/css">
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
    float: right;
}

.button5:hover {
    background-color: #555555;
    color: white;
}
.dsn a {
    margin-right: 30px;
    display: inline-block;
    background:green;
    border-radius:8px;
    padding: 15px 30px;
    color: #fff;
    font-weight: bold;
    font-size: 30px;

}
</style>

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

<nav class="large-2 medium-4 columns" id="actions-sidebar" style="background: rgb(204, 204, 255) none repeat scroll 0% 0%;">
  
</nav>
<div class="users index large-10 medium-8 columns content">
    <h3><?= __('My Profile') ?></h3>




    <table style="float:left; width:600px"cellpadding="0" cellspacing="0">
        <tr>
            <td><?= $this->Paginator->sort('user_name') ?></td>
            <td><?= h($users->user_name) ?></td>
        </tr
        <tr>
            <td><?= $this->Paginator->sort('first_name') ?></td>
            <td><?= h($users->first_name) ?></td>
        </tr
        <tr>
            <td><?= $this->Paginator->sort('last_name') ?></td>
            <td><?= h($users->last_name) ?></td>
        </tr
        <tr>
            <td><?= $this->Paginator->sort('email') ?></td>
            <td><?= h($users->email) ?></td>
        </tr
        <tr>
            <td><?= $this->Paginator->sort('phone_number') ?></td>
            <td><?= h($users->phone_number) ?></td>
        </tr
        <tr>
            <td><?= $this->Paginator->sort('present_address') ?></td>
            <td><?= h($users->present_address) ?></td>
        </tr
        <tr>
            <td><?= $this->Paginator->sort('permanent_address') ?></td>
            <td><?= h($users->permanent_address) ?></td>
        </tr
        <tr>
            <td><?= $this->Paginator->sort('date_of_birth') ?></td>
            <td><?= h($users->date_of_birth) ?></td>
        </tr
        
    </table>
    <table style="folat:right; width:308px">
        <tr>
            <td><?= $this->Paginator->sort('profile_photo') ?></td>
        </tr>
        <tr>            
            <td><img src="<?php echo $this->request->webroot.'uploads_profile/'.$users['profile_photo']; 

                    ?>"></td>
        </tr>
        <tr>
            <td><h2 style="text-align:center"><?= h($users->first_name); ?><h2></td>
        </tr>
    </table>



    <table cellpadding="0" cellspacing="0">
        <tbody>
            
            <tr>
                
                <td class="actions dsn">
                    <?php if ($role == 1) { ?>

                    <?= $this->Html->link(__('View'), ['action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                     <?php 
            echo $this->Html->link(
            'Back',
            ['controller' => 'Homes' , 'action' =>'adminpanel']
            ); 
        ?>

                    <?php } else { ?>
                     <?= $this->Html->link(__('View'), ['action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $users->id]) ?>

                    <?php 
                          echo $this->Html->link(
                          'Back',
                          ['controller' => 'Homes' , 'action' =>'index']
                          ); 
                      ?>
                    <?php } ?>
                </td>
            </tr>
           
        </tbody>

    </table>
   
</div>

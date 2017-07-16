
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
<div class= "book">
<div class="users view large-9 medium-8 columns content"  style="margin-left: 212px;";>
    <h3>Book Details</h3>
    <table class="vertical-table" style = " background-color: #afee7c;">
        <tr>
            <th><?= __('Book Number') ?></th>
            <td><h5><?= h($bookmenu->book_number) ?></h5></td>
        </tr>
        <tr>
            <th><?= __('Book Name') ?></th>
            <td><h5><?= h($bookmenu->book_name) ?></h5></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><h5><?= h($bookmenu->category) ?></h5></td>
        </tr>
        <tr>
            <th><?= __('Summery') ?></th>
            <td><h5><?= h($bookmenu->summery) ?></h5></td>
        </tr>
        <tr>
            <th><?= __('Book Picture') ?></th>
            <td><img src="<?php echo $this->request->webroot.'uploads/'.$bookmenu['ebook_pic']; ?>"></td>
        </tr>
    </table>
</div>
</div>

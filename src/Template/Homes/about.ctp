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
<?php echo $this->Html->css(['style']); ?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
  		  <div class="hed">  
       		<h1>Company Profile</h1>
          </div>
     <div class="nav">
		London<br>
		Paris<br>
		Tokyo
	</div>
	<div class="left_bar">
            London<br>
            Paris<br>
            Tokyo
            </div>

		<div class="boder">
			<div class="photo">
				<?php echo $this->Html->image('/img/img1.png') ?>
			</div>
				<div class = "designation">
					<h4>Md.Alomgir Hossen</h4>
					<p><b>Designation : Software engineer</b></p>
					<p><b>Email : alombd.bd@gmail.com</b></p>
					<p><b>Phone No : 01771-000096</b></p>
					<p><b>Designation : Software engineer</b></p>
				</div>
		</div>
		<div class="boder">
			
			<div class="photo1">
				<?php echo $this->Html->image('/img/img3.png') ?>
			</div>
				<div class = "designation">
					<h4>Mst:Jumi Luna</h4>
					<p><b>Designation : Software engineer</b></p>
					<p><b>Email : alombd.bd@gmail.com</b></p>
					<p><b>Phone No : 01771-000096</b></p>
					<p><b>Designation : Software engineer</b></p>
				</div>
			</div>
			<div class="boder">
			<div class="photo2">
				<?php echo $this->Html->image('/img/img3.png') ?>
				
			</div>
				<div class = "designation">
					<h2>Md.Alomgir Hossen</h2>
					<p><b>Designation : Software engineer</b></p>
					<p><b>Email : alombd.bd@gmail.com</b></p>
					<p><b>Phone No : 01771-000096</b></p>
					<p><b>Designation : Software engineer</b></p>
				</div>	
		</div>
		<div class="boder">
			
			<div class="photo4">
				<?php echo $this->Html->image('/img/img2.png') ?>
				
			</div>
				<div class = "designation">
					<h2>Md.Alomgir Hossen</h2>
					<p><b>Designation : Software engineer</b></p>
					<p><b>Email : alombd.bd@gmail.com</b></p>
					<p><b>Phone No : 01771-000096</b></p>
					<p><b>Designation : Software engineer</b></p>
				</div>	
		</div>
				<div class="boder">
					
					<div class="photo">
						<?php echo $this->Html->image('/img/img1.png') ?>
						
					</div>
					<div class = "designation">
						<h2>Md.Alomgir Hossen</h2>
						<p><b>Designation : Software engineer</b></p>
						<p><b>Email : alombd.bd@gmail.com</b></p>
						<p><b>Phone No : 01771-000096</b></p>
						<p><b>Designation : Software engineer</b></p>
					</div>
					
				</div>
		

		
				<div class="boder">
					
					<div class="photo1">
						<?php echo $this->Html->image('/img/img3.png') ?>
						
					</div>
					<div class = "designation">
						<h2>Md.Alomgir Hossen</h2>
						<p><b>Designation : Software engineer</b></p>
						<p><b>Email : alombd.bd@gmail.com</b></p>
						<p><b>Phone No : 01771-000096</b></p>
						<p><b>Designation : Software engineer</b></p>
					</div>
				</div>
		
	
		
        <div class="footer_main">

            <div class="footer_bar">
                <div class="box1">
                  <h1>About</h1>
                  	Help you get your products to market faster?
					Enhance maintain your enterprise applications?
					Step at any stage of the development lifecycle?
					Augment your staff with hard-to-find IT talent?
                </div>
                <div class="box2">
                 <h1>Support</h1>
                Web Application 
				Business Process Remodeling
				IT Consultancy Entry Services
				System Integration & Data Migration
				Data Analysis & Business Intelligence
                </div>
                <div class="box3">
                  <h1>Contact</h1>
                      
                <form method="post" action="contact.php">
                    <label for="email">Your email:</label><br />
                <input id="name1" class="input" name="email" type="text" placeholder="Enter mail" value="" size="40" />
                <input id="submit_button1" type="submit" value="&#8680"/>
                </form>
                </div>
                <div class="box4">
                  <h1>We're On it. </h1>
                  <div id="share-buttons">
                  
                      <!-- Email -->
                      <a href="#">
                          <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
                      </a>
                   
                      <!-- Facebook -->
                      <a href="#" target="_blank">
                          <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
                      </a>
                      
                      <!-- Google+ -->
                      <a href="#" target="_blank">
                          <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
                      </a>
                      
                      <!-- LinkedIn -->
                      <a href="#" target="_blank">
                          <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
                      </a>
                      
                      <!-- Reddit -->
                      <a href="#" target="_blank">
                          <img src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
                      </a>
                      
                      <!-- Twitter -->
                      <a href="#" target="_blank">
                          <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                      </a>

                </div>
              </div>
                
              </div>
				
           
            
           
        </div>
        <div class="footer">
          Copyright 2016 © alombd24.com
         </div>
     </div>
 </div>
</div>
</body>
</html>
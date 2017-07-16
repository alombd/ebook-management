
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
              'My Profiless',
              ['controller' => 'Users', 'action' => 'myprofile']
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
	      </ul>
	    </div>
   			 <div class="hed">  
       			<h1>Get in touch</h1>
          	</div>
    		
		        <div class="nav">
    					London<br>
    					Paris<br>
    					Tokyo
  				  </div>

				 <div class="left_bar_contact">
				 	<marquee><h1><i>Send Your Mail</i></h1></marquee>
					 <!-- Email -->
                      <a href="#">
                          <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
                      </a>
                   
                      <!-- Facebook -->
                      <marquee><h1><i>Connect With Facebook!</i></h1></marquee>
                      <a href="#" target="_blank">
                          <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
                      </a>
                      
                      <!-- Google+ -->
                      <marquee><h1><i>Search With Google!</i></h1></marquee>
                      <a href="#" target="_blank">
                          <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
                      </a>
                      
                      <!-- LinkedIn -->
                      <marquee><h1><i>Connect With LinkedIn!</i></h1></marquee>
                      <a href="#" target="_blank">
                          <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
                      </a>
                      
                      <!-- Reddit -->
                      <marquee><h1><i>Connect With Reddit!</i></h1></marquee>
                      <a href="#" target="_blank">
                          <img src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
                      </a>
                      
                      <!-- Twitter -->
                      <marquee><h1><i>Connect With Twitter!</i></h1></marquee>
                      <a href="#" target="_blank">
                          <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                      </a>
				</div>
				<div class="gogle_text">
		
					<div class="ieclmap">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1824.946742582786!2d90.36253073318046!3d23.822386389020032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c12535420d2f%3A0xadb9d65f45eeba1!2sWoori+Bank%2C+Mirpur+Branch!5e0!3m2!1sen!2sbd!4v1459245768697"  allowfullscreen></iframe>

					</div>
					</div>
          <div class = "form-deigane">
              <?php 
                echo $this->Form->create();
                // Text
                echo $this->Form->input('name');
                // Password
                echo "<label> Email Address </label>"; ?>

               <div class="abc"> <?php echo $this->Form->email('email'); ?></div>

                <div class="abc"><?php echo $this->Form->input('subject'); ?></div>
                <?php
                // Textarea
                echo "<label> Message </label>";
                echo $this->Form->textarea('body');

                echo $this->Form->button('Send');
                echo $this->Form->end();
              ?>
          </div>	
				<div class="section-heading">
					<div><h2>Office Address</h2></div>
						<b>Information Entertainment & Communication Ltd.</b><br>
						<p>Plot No-1/9, Level-6, Padma Bhaban</p>
						<p>Pallabi, Mirpur, Dhaka-1216</p>
						<p>Phone: +8801771000096</p>
						<b>Email :</b>
						<p>alamgir [alamgir@iecl-bd.net]</p>
				</div>
					</div>
					<div>
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
                <!-- <input id="submit_button1" type="submit" value="&#8680"/> -->
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

</body>
</html>


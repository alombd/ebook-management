<style type="text/css">
.users form{
 width: 30%;
 margin: 0 auto;
 background-color: #ccc;

}
</style>
<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend style= "text-align: center; margin-top: 8px;"><h1>Login</h1></legend>
        <?= $this->Form->input('user_name') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->button('Login'); 
        ?>
        <?php 
        	echo $this->Html->link(
	        'Registration',
	        ['controller' => 'Users' , 'action' =>'add']
	        ); 
        ?>
        <?php 
        	echo $this->Html->link(
	        'Back',
	        ['controller' => 'Homes' , 'action' =>'index']
	        ); 
        ?>
    </fieldset>
<?= $this->Form->end() ?>

</div>
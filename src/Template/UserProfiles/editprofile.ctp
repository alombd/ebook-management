<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
       
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create(null,['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('user_id',[
                'value' => 2,
                'type' => 'hidden',
                ]);
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('email');
            echo $this->Form->input('phone_number');
         ?>
             <label>Present Address</label>  
           <?= $this->Form->textarea('present_address'); ?>
           <label>Permanet Address</label> 
           <?= $this->Form->textarea('permanent_address'); ?>
        
           <?php echo $this->Form->input('date_of_birth');
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

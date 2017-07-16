<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userprofile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userprofile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users Profile'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create(null,['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Add User Profile') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
        ?> 
            <label>E-mail Address</label>    
           <?= $this->Form->email('email');
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
            // echo $this->Form->file('profile_photo[]');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customerTable->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customerTable->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Customer Table'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="customerTable form large-9 medium-8 columns content">
    <?= $this->Form->create($customerTable) ?>
    <fieldset>
        <legend><?= __('Edit Customer Table') ?></legend>
        <?php
            echo $this->Form->input('customer_number');
            echo $this->Form->input('customer_name');
            echo $this->Form->input('phone_number');
            echo $this->Form->input('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

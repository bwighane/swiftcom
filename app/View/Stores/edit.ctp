<div class="stores form">
<?php echo $this->Form->create('Store'); ?>
	<fieldset>
		<legend><?php echo __('Edit Store'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('district_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Store.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Store.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Stores'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Districts'), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), array('controller' => 'districts', 'action' => 'add')); ?> </li>
	</ul>
</div>

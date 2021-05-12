<div class="extraimages form">
<?php echo $this->Form->create('Extraimage'); ?>
	<fieldset>
		<legend><?php echo __('Edit Extraimage'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Extraimage.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Extraimage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Extraimages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>

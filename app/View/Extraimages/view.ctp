<div class="extraimages view">
<h2><?php echo __('Extraimage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($extraimage['Extraimage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($extraimage['Product']['name'], array('controller' => 'products', 'action' => 'view', $extraimage['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($extraimage['Extraimage']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($extraimage['Extraimage']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($extraimage['Extraimage']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Extraimage'), array('action' => 'edit', $extraimage['Extraimage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Extraimage'), array('action' => 'delete', $extraimage['Extraimage']['id']), array(), __('Are you sure you want to delete # %s?', $extraimage['Extraimage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Extraimages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Extraimage'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="favourites view">
<h2><?php echo __('Favourite'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($favourite['Favourite']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($favourite['User']['username'], array('controller' => 'users', 'action' => 'view', $favourite['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($favourite['Product']['name'], array('controller' => 'products', 'action' => 'view', $favourite['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($favourite['Favourite']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($favourite['Favourite']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Favourite'), array('action' => 'edit', $favourite['Favourite']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Favourite'), array('action' => 'delete', $favourite['Favourite']['id']), array(), __('Are you sure you want to delete # %s?', $favourite['Favourite']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Favourites'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Favourite'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>

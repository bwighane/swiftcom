<div class="districts view">
<h2><?php echo __('District'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($district['District']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($district['District']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($district['District']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($district['District']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit District'), array('action' => 'edit', $district['District']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete District'), array('action' => 'delete', $district['District']['id']), array(), __('Are you sure you want to delete # %s?', $district['District']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), array('action' => 'add')); ?> </li>
	</ul>
</div>

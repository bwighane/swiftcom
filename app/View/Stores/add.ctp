<div class="row">
	<?php echo $this->element('admin_sidenav'); ?>
	<div class="col-xs-12 col-md-6">
	<div class="panel">
		<div class="panel-heading">
			new product
		</div>
		<div class="panel-body">
			<?php
			$forminit = array(
				'inputDefaults' => array(
					'div' => array(
						'class' => 'form-group',
						'required-form-group'
					),
					'class' => 'form-control input-sm',
				),
				'role' => 'form',
				'type' => 'file', 
				'novalidate' => true,
				'name' => 'storeAddForm'
			);
		?>
		<?php echo $this->Form->create('Store', $forminit); ?>
			<?php
				echo $this->Form->input('Store.name', array('label' => 'store name'));
				echo $this->Form->input('Store.district_id', array('empty' => 'select a location'));
			?>
		</div>
		<div class="panel-footer">
			<?php echo $this->Form->end(array('label' => __('save'), 'class' => 'btn btn-info btn-sm', 'div' => false, 'ng-disabled' => 'storeAddForm.$invalid')); ?>
		</div>
	</div>
	</div>
</div>

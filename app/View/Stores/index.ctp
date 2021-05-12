<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-9 col-md-push-3">
		<div class="row" style="padding: 5px; padding-top: 0px;">
			<div class="col-xs-12 rounded-and-shadowed" style="background: white; padding: 10px; padding-top: 5px;">
				<p class="p" style="margin-bottom: 5px; text-transform: uppercase; font-weight: bold;">you items need to be in a store</p>
					<?php echo $this->Form->create('Store', array('inputDefaults' => array('div' => array('class' => 'form-group'), 'class' => 'form-control input-sm'), 'id' => 'new-store-form', 'url' => array('action' => 'add')));?>
				<div class="row">
					<div class="col-xs-12 col-sm-5">
						<?php echo $this->Form->input('Store.name', array('placeholder' => 'store name', 'label' => 'name')); ?>
					</div>
					<div class="col-xs-12 col-sm-5">
						<?php echo $this->Form->input('Store.district_id', array('label' => 'location')); ?>
					</div>
					<div class="col-xs-12 col-sm-2">
						<?php echo $this->Form->end(array('label' => 'create store', 'class' => 'btn btn-info btn-sm btn-block')); ?>
					</div>
				</div>
			</div>
		</div><!-- end new store form panel-->
		<div class="row">
			<div class="page-header col-xs-12">
				<h1>my stores</h1>
			</div>
			<?php foreach($stores as $store): ?>
				<div class="col-xs-12 col-sm-4 store-card-wrapper">
					<div class="store-card rounded-and-shadowed">
						<h2 class="store-card-heading"><?php echo $this->Html->link($store['Store']['name'], array('controller' => 'products', 'action' => 'viewfromstore', $store['Store']['id'])); ?></h2>
						<hr class="no-padding-margin admin-hr"/>
						<p class="p store-actions">
							<?php echo $this->Html->link('edit', array('controller' => 'stores', 'action' => 'edit', $store['Store']['id'])); ?>
							<?php echo $this->Form->postLink('delete', array('controller' => 'stores', 'action' => 'delete', $store['Store']['id'])); ?>
						</p>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
	<?php echo $this->element('admin_sidenav'); ?>
</div>

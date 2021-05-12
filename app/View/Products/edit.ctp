<?php echo $this->Flash->render('new_product')?>
<?php echo $this->Flash->render('edit_product')?>
<div class="row">
	<div class="col-xs-12 col-sm-7 p-edit-col col-md-5 col-md-push-3">
		<div class="row">
			<div class="col-xs-12" style="">
				<?php echo $this->Flash->render('product_added'); ?>
			</div>
		</div>
		<div class="panel rounded-and-shadowed">
			<div class="panel-heading">
				<h2 class="card-heading">editing - <?php echo $productName; ; ?><!-- <small style="text-transform: lowercase;"> - edit</small> --></h2>
			</div>
			<div class="panel-body" ng-controller="ProductsController">
				<?php
				$forminit = array(
					'inputDefaults' => array(
						'div' => 'form-group',
						'class' => 'form-control input-sm',
					),
					'role' => 'form',
					'type' => 'file',
					'novalidate' => true
				);
			?>
			<?php echo $this->Form->create('Product', $forminit); ?>
				<?php
					echo $this->Form->input('Product.name', array('label' => 'product name'));
					echo $this->Form->input('Product.price');
					echo $this->Form->input('Product.quantity', array('label' => 'number of items', 'min' => 1));
					//echo $this->Form->input('Product.category_id', array('label' => 'main-category' ,'id' => 'catlist', 'category-selected', 'empty' => 'select a category'));
					echo $this->Form->input('Product.subcategory_id', array('label' => 'product category','id' => 'subcatlist', 'data-current' => $currentSubcategory, 'empty' => 'select a category'));
					//echo $this->Form->input('Product.store_id', array('empty' => 'select a store'));
					echo $this->Form->input('Product.description', array('label' => 'more details (optional)'));
				?>
				<hr class="no-padding-margin admin-hr"/>
				<?php echo $this->Form->end(array('label' => __('update product'), 'class' => 'btn btn-info btn-sm', 'div' => false)); ?>
				<!-- <a style=""class="btn btn-sm btn-default" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>">Cancel</a> -->
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-4 col-md-push-3 edit-image-panels">
		<div class="panel rounded-and-shadowed">
			<div class="panel-body">
				<h2 class="card-heading">main image</h2>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 ">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<?php echo $this->Html->image('product_images/' . $productImage, array('style' => 'max-width: 100%;')); ?>
							</div>
						</div>
						<hr class="no-padding-margin admin-hr"/>
						<div class="row">
							<div class="col-xs-8">
								<?php echo $this->Form->create('Product', array('type' => 'file', 'action' => 'updateDisplayImage', 'inputDefaults' => array('div' => 'form-group'))); ?>

								<?php echo $this->Form->input('Product.image', array('type' => 'file', 'label' => false, 'class' => 'edit-image-input', 'required' => true)); ?>
								<?php echo $this->Form->input('uid', array('type' => 'hidden', 'value' => $user['id'])); ?>
								<?php echo $this->Form->input('Product.id', array('type' => 'hidden')); ?>
							</div>
							<div class="col-xs-12">
								<?php echo $this->Form->end(array('label' => __('upload image'), 'class' => 'btn btn-default btn-sm', 'style' => ''))?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel rounded-and-shadowed" style="margin-bottom: 0px;" id="more-images">
			<div class="panel-body">
				<h2 class="card-heading">add more images (optional)</h2>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="row" data-perfect-grid="2-4-3">
							<?php foreach($extraImages as $extraimage):?>
								<div class="col-xs-6 col-sm-3 col-md-4 perfect-grid-element" style="margin-bottom: 10px; line-height: normal;">
									<?php echo $this->Html->image('product_images/extra/' . $extraimage['Extraimage']['image_name'], array('style' => 'max-width: 100%;')); ?>
								<p class="p" ><?php echo $this->Form->postLink('delete', array('controller' => 'extraimages', 'action' => 'delete', $extraimage['Extraimage']['id']), array('style' => 'font-size: 13px; text-transform: lowercase; line-height: normal;', 'class' => 'btn btn-xs btn-default')); ?></p>
								</div>
							<?php endforeach;?>
						</div>
						<hr class="no-padding-margin admin-hr"/>
						<div class="row">
							<?php if(count($extraImages) < 2): ?>
							<div class="col-xs-8">
								<?php echo $this->Form->create('Extraimage', array('type' => 'file', 'class' => 'edit-file-upload', 'action' => 'add', 'inputDefaults' => array('div' => 'form-group'))); ?>

								<?php echo $this->Form->input('Extraimage.image_name', array('type' => 'file', 'class' => 'edit-image-input', 'label' => false)); ?>
								<?php echo $this->Form->input('uid', array('type' => 'hidden', 'value' => $user['id'])); ?>
								<?php echo $this->Form->input('Product.id', array('type' => 'hidden')); ?>
							</div>
							<div class="col-xs-12">
								<?php echo $this->Form->end(array('label' => __('upload image'), 'class' => 'btn btn-default btn-sm', 'style' => ''))?>
							</div>
							<?php else:?>
								<div class="col-xs-12">
									<p class="alert-info p" style="padding: 5px;">you can only add a maximum of 2 extra images</p>
								</div>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo $this->element('admin_sidenav_1', array('class' => 'col-md-pull-9'));?>
	</div>
</div>

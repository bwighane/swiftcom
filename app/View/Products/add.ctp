<?php echo $this->Flash->render('new_product'); ?>
<div class="row">
	<div class="col-xs-12 p-edit-col col-md-5 col-md-push-3">
		<div class="panel rounded-and-shadowed" style="margin-bottom: 0px;">
			<div class="panel-heading">
				<h2 class="card-heading">what are you selling?</h2>
			</div>
			<div class="panel-body" ng-controller="ProductsController">
				<?php
				$forminit = array(
					'inputDefaults' => array(
						'div' => array('class' => 'form-group', 'required-form-group'),
						'class' => 'form-control input-sm',
					),
					'role' => 'form',
					'type' => 'file', 
					'novalidate' => true,
				);
			?>
			<?php echo $this->Form->create('Product', $forminit); ?>
				<?php
					echo $this->Form->input('Product.name', array('label' => 'product name', 'placeholder' => 'e.g new galaxy tab'));
					echo $this->Form->input('Product.price', array('label' => 'price per unit'));
					echo $this->Form->input('Product.quantity', array('label' => 'number of items', 'min' => 1));
					//echo $this->Form->input('Product.category_id', array('label'  => 'main-category','id' => 'catlist', 'category-selected', 'empty' => 'select a category'));
					echo $this->Form->input('Product.subcategory_id', array('label' => 'product category','id' => 'subcatlist', 'data-current' => $currentSubcategory, 'empty' => 'select a category'));
					//echo $this->Form->input('Product.store_id', array('empty' => 'select a store'));
					echo $this->Form->input('Product.image', array('type' => 'file', 'label' => 'product image', 'class' => ''));
					echo $this->Form->input('Product.description', array('div' => 'form-group', 'label' => 'more details (optional)', 'placeholder' => 'more information about the product and #hashtags if necessary'));
					echo $this->Form->input('Product.user_id', array('type' => 'hidden', 'value' => $user['id']));
				?>
				<hr class="no-padding-margin admin-hr"/>
				<?php echo $this->Form->end(array('label' => __('save product'), 'class' => 'btn btn-info btn-sm', 'div' => false)); ?>
				<!-- <a style=""class="btn btn-sm btn-default" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>">Cancel</a> -->
			</div>
		</div>
	</div>
	<?php echo $this->element('admin_sidenav_1', array('class' => 'col-md-pull-5'));?>
	</div>
</div>
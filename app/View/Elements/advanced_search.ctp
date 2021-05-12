<div class="row side-nav advanced-search-side-nav">
	<div class="col-xs-12 col-sm-12 col-md-12 advanced-search-form">
		<?php echo $this->Form->create('Product', array('inputDefaults' => array('div' => 'form-group', 'class' => 'form-control input-sm', 'required' => false), 'url' => array('action' => 'search'))); ?>
		<?php echo $this->Form->input('Product.name'); ?>
		<?php echo $this->Form->input('Product.quantity'); ?>
		<?php echo $this->Form->input('Product.category_id', array('empty' => 'select a category', 'id' => 'catlist', 'category-selected')); ?>
		<?php echo $this->Form->input('Product.subcategory_id', array('id' => 'subcatlist', 'empty' => 'select a category first')); ?>
		<div>
			<?php echo $this->Form->end(array('label' => 'search', 'class' => 'btn btn-sm btn-block btn-default'));?>
		</div>
	</div>
</div>
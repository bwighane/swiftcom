<!-- <div class="row ">
	<div class=" col-xs-12 col-sm-8 col-sm-push-2  col-md-4 col-md-push-4 login-col">
		<h1 style="text-align: center; font-size: 24px; font-family: sans-serif;"><?php echo $appName; ?><small><sup>&reg;</sup></small></h1>
	</div>
</div> -->
<div class="row advanced-search-row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-md-push-2 advanced-search-wrapper rounded-and-shadowed" style="background: rgb(254, 254, 254); padding: 10px;">
		<div class="page-header advanced-search-page-header">
			<h1 class="page-header-custom"><?php echo $searchHelpMessage; ?></h1>
			<hr class="no-padding-margin advanced-search-hr"/>
		</div>
		<div class="row">
			<div class="col-xs-12" style="margin-bottom: 10px;">
				<p class="text-cente p" style="color: #AAB2BD; font-size: 14px;"><small>Only fill the fields that you require</small></p>
			</div>
		</div>
		<!-- <hr class="no-padding-margin advanced-search-hsr"/> -->
		<?php echo $this->Form->create('Product', array('inputDefaults' => array('div' => 'form-group', 'class' => 'form-control', 'required' => false, 'class' => 'form-control input-sm'), 'url' => array('action' => 'search'))); ?>
		<?php
			// echo $this->Form->input('Product._q', array('form-field-help-text' => 'use a keyword, like \'iphone\' ', 'label' => 'keyword'));
			//echo $this->Form->input('Product.category_id', array('id' => 'catlist', 'category-selected', 'empty' => 'select a category', 'label' => 'product category'));
			//echo $this->Form->input('Product.subcategory_id', array('id' => 'subcatlist', 'empty' => 'select a category first', 'label' => 'product subcategory'));
		?>
		<div class="row advanced-search-fieldset">
			<!-- <div class="col-xs-12 col-sm-12 col-md-12">
				<h3 class="advanced-search-legend">general</h3>
			</div> -->
			<div class="col-xs-12 col-sm-12 col-md-6">
				<?php echo $this->Form->input('Product._q', array('form-field-help-text' => 'use a brief keyword, e.g \'iphone 5\' ', 'label' => 'keyword')); ?>
			</div>
		</div>
		<div class="row advanced-search-fieldset">
			<!-- <div class="col-xs-12 col-sm-12 col-md-12">
				<h3 class="advanced-search-legend">assortment</h3>
			</div> -->
			<!-- <div class="col-xs-12 col-sm-6 col-md-6">
				<?php echo $this->Form->input('Product.category_id', array('id' => 'catlist', 'category-selected', 'empty' => 'select a category', 'label' => 'category')); ?>
			</div> -->
			<div class="col-xs-12 col-sm-6 col-md-6">
				<?php echo $this->Form->input('Product.subcategory_id', array('id' => 'subcatlist', 'empty' => 'select a category', 'label' => 'product category'));?>
			</div>
		</div>
		<div class="row advanced-search-fieldset" style="margin-top: 10px;">
			<!-- <div class="col-xs-12 col-sm-12 col-md-12">
				<h3 class="advanced-search-legend">budget</h3>
			</div> -->
			<div class="col-xs-6 col-sm-6 col-md-4">
				<?php echo $this->Form->input('Product.priceFrom', array('type' => 'number', 'label' => 'min price')); ?>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-4">
				<?php echo $this->Form->input('Product.priceTo', array('type' => 'number', 'label' => 'max price'));?>
			</div>
		</div>
		<hr style="padding: 0px; margin-top: 0px; margin-bottom: 10px;"/>
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-sm-offset-0 col-md-2 col-md-offset-0">
				<?php echo $this->Form->end(array('label' => 'search', 'class' => 'btn btn-info btn-sm btn-block', 'div' => array('class' => ''))); ?>
			</div>
		</div>
	</div>
</div>
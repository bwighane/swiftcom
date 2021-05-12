
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 breadcrumb-div visible-sm visible-md visible-lg">
		<ol class="breadcrumb">
		  <li><?php echo $this->Html->link('categories', array('controller' => 'pages', 'action' => 'categorylist')); ?></li>
		  <li><?php echo $this->Html->link($category['Category']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['id'])); ?></li>
		  <li class="active"><?php echo $category['Subcategory']['name']; ?></li>
		</ol>
	</div>
</div>
<div class="row">
	<?php echo $this->element('product_listing', array('title' => $subcategory, 'products' => $products)); ?>
	<div class="col-xs-12 side col-md-3 col-md-pull-9 side-nav subcategories-side-nav first-side-nav" id="more">
		<div class="side-options-panel rounded-and-shadowed">
			<!-- card-heading side-nav-h3 -->
			<h3 class="card-heading"><?php echo $category['Category']['name']?></h3>
			<!-- <hr class="no-padding-margin"/> -->
	        <div class="list-group categories-list"> 
	            <?php foreach($otherSubcategories as $otherSubcategory):?>
	                <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'subcategory', $otherSubcategory['Subcategory']['id']))?>" class="list-group-item"><?php echo $otherSubcategory['Subcategory']['name']; ?> <span class="count">(<?php echo $otherSubcategory['Subcategory']['product_count'];?>)</span></a>
	            <?php endforeach;?>
	        </div>
        </div>
		<?php echo $this->element('more_options'); ?>
	</div>
</div>
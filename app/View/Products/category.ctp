<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 breadcrumb-div visible-sm visible-md visible-lg">
        <ol class="breadcrumb">
          <li><?php echo $this->Html->link('categories', array('controller' => 'pages', 'action' => 'categorylist')); ?></li>
          <li class="active"><?php echo $category; ?></li>
        </ol>
    </div>
</div>
<div class="row">
    <?php echo $this->element('product_listing', array('title' => $category , 'products' => $products)); ?>
	<div class="col-xs-12 side col-md-3  col-md-pull-9  side-nav categories-side-nav first-side-nav" id="more">
        <div class="side-options-panel rounded-and-shadowed">
            <!-- card-heading side-nav-h3 -->
    		<h3 class="card-heading"><?php echo $category; ?></h3>
            <!-- <hr class="no-padding-margin"/> -->
            <div class="list-group subcategories-list"> 
                <?php foreach($subcategories as $subcategory):?>
                    <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'subcategory', $subcategory['Subcategory']['id']))?>" class="list-group-item"><?php echo $subcategory['Subcategory']['name']; ?> <span class="count">(<?php echo $subcategory['Subcategory']['product_count'];?>)</span></a>
                <?php endforeach;?>
            </div>
        </div>
        <?php echo $this->element('more_options'); ?>
	</div>
</div>
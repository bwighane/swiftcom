<div class="side-options-panel rounded-and-shadowed">
	<!-- card-heading side-nav-h3 -->
    <h3 class="card-heading">shop by category</h3>
    <!-- <hr class="no-padding-margin"> -->
    <div class="list-group categories-list"> 
        <?php foreach($categories as $category):?>
            <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'category', $category['Category']['id']))?>" class="list-group-item"><?php echo $category['Category']['name']; ?> <span class="count">(<?php echo $category['Category']['product_count'];?>)</span></a>
        <?php endforeach;?>
    </div>
</div>
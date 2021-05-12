<?php echo $this->element('search'); ?>
<div class="row" b-resize>
    <div class="col-xs-12 col-md-3 side-nav home-side-nav">
        <div class="side-options-panel">
            <h3 class="side-nav-h3">categories</h3>
            <!-- <hr class="no-padding-margin"> -->
            <div class="list-group categories-list"> 
                <?php foreach($categories as $category):?>
                    <?php echo $this->Html->link($category['Category']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['id']), array('class' => 'list-group-item')); ?>
                <?php endforeach;?>
            </div>
        </div>
        <?php echo $this->element('more_options');?>
    </div>
    <?php echo $this->element('product_listing', array('title' => 'new fresh stock', 'products' => $products)); ?>
</div>    
<div class="row">
    <?php echo $this->element('product_listing', array('title' => 'search results', 'products' => $products)); ?>
    <div class="col-xs-12 side col-md-3 col-md-pull-9 side-nav home-side-nav first-side-nav" id="more">
        <?php echo $this->element('more_options');?>
    </div>
</div>
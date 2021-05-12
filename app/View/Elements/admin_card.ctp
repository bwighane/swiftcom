<div class="col-xs-12 col-sm-2 col-md-2 perfect-grid-element card col-md-bwi" style="display: block;">
  <div class="thumbnail card-thumbnail rounded-and-shadowed" data-link="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id'])); ?>">
    <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id'])); ?>">
      <?php echo $this->Html->image('product_images/' . $product['Product']['image'], array('alt' => $product['Product']['name'], 'class' => 'card-image', 'style' => 'text-align: left')); ?>
    </a>
    <div class="caption" style="text-transform: capitalize; clear: both;">
      <h3 class="card-product-title a"><?php echo $this->Html->link($product['Product']['name'], array('controller' => 'products', 'action' => 'productpage', $product['Product']['id'])); ?>
    </div>
  </div>
</div>
 <!-- <?php //echo $this->element('basic_card', array('product' => $product)); ?> -->
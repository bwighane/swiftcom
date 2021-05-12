<div class="col-xs-6 col-sm-3 col-md-3 perfect-grid-element card col-md-bw">
  <div class="thumbnail card-thumbnail rounded-and-shadowed" data-link="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id'])); ?>">
    <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id'])); ?>">
      <?php echo $this->Html->image('product_images/thumbnail/' . $product['Product']['image'], array('alt' => $product['Product']['name'], 'class' => 'card-image', 'style' => 'text-align: left; padding: 7px;',)); ?>
    </a>
    <div class="caption card-caption" style="text-transform: capitalize; clear: both;">
      <h3 class="card-product-title"><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id']))?>"><?php echo $this->Text->truncate($product['Product']['name'], 30, array('ellipsis' => '...', 'exact' => false)); ?></a></h3>
      <p>by <?php echo $this->Html->link($this->Text->truncate($product['Store']['name'], 30, array('ellipsis' => '...')), array('controller' => 'products', 'action' => 'store', $product['Store']['id'])); ?></p>
      
      <hr class="card-hr"/>
      <p class="card-price "><span class="price-tag">K</span><span currency-format><?php echo $product['Product']['price']?></span></p>
      <!-- <hr class="card-hr"/> -->
      <!-- <p><span class="time-ago" data-livestamp="<?php echo $this->Time->toUnix($product['Product']['created']); ?>"></span></p> -->
<!-- 
      <p>by <?php echo $this->Html->link($this->Text->truncate($product['Store']['name'], 30, array('ellipsis' => '...')), array('controller' => 'products', 'action' => 'store', $product['Store']['id'])); ?></p> -->
    </div>
  </div>
</div>
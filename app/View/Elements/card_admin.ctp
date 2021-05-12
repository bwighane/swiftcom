<div class="col-xs-6 col-sm-3 col-md-3 perfect-grid-element card col-md-bw" data-lik="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'edit', $product['Product']['id'])); ?>"
 style="display: block;">
  <div class="thumbnail card-thumbnail rounded-and-shadowed">
    <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'edit', $product['Product']['id'])); ?>">
      <?php echo $this->Html->image('product_images/thumbnail/' . $product['Product']['image'], array('alt' => $product['Product']['name'], 'class' => 'card-image', 'style' => 'text-align: left; padding: 7px;')); ?>
    </a>
    <div class="caption card-caption" style="text-transform: capitalize; clear: both;">
      <h3 class="card-product-title"><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'edit', $product['Product']['id']))?>"><?php echo $this->Text->truncate($product['Product']['name'], 30, array('ellipsis' => '...', 'exact' => false)); ?></a></h3>
      <hr class="no-padding-margin admin-hr" style="margin-bottom: 5px;" />
      <p><span class="time-ago" data-livestamp="<?php echo $this->Time->toUnix($product['Product']['created']); ?>"></span></p>
      <!-- <p><?php echo $this->Html->link($this->Text->truncate($product['Store']['name'], 30, array('ellipsis' => '...')), array('controller' => 'products', 'action' => 'viewfromstore', $product['Store']['id'])); ?></p> -->
      <hr class="no-padding-margin admin-hr" style="margin-bottom: 5px;" />
      <div class="row">
        <?php if(!$product['Product']['trashed']): ?>
        <div class="col-xs-6 text-left">
          <?php echo $this->Html->link('edit', array('controller' => 'products', 'action' => 'edit', $product['Product']['id']), array('style' => 'font-weight: bold;;', 'class' => 'btn btn-sm btn-block'))?>
        </div>
        <div class="col-xs-6 text-left">
          <?php echo $this->Form->postLink('trash', array('controller' => 'products', 'action' => 'trash', $product['Product']['id']), array('style' => 'font-weight: bold; color: white !important;', 'class' => 'btn-danger btn btn-sm btn-block')); ?>
        </div>
        <?php else:?>
        <div class="col-xs-6 text-left">
          <?php echo $this->Form->postLink('restore', array('controller' => 'products', 'action' => 'untrash', $product['Product']['id']), array('style' => 'font-weight: bold;')); ?>
        </div>
        <div class="col-xs-6 text-left">
          <?php echo $this->Form->postLink('delete', array('controller' => 'products', 'action' => 'delete', $product['Product']['id']), array('style' => 'font-weight: bold;')); ?>
        </div>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>
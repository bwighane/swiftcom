<div class="col-md-12 col-sm-12 col-xs-12" style="background: white; padding: 10px; margin-bottom: 5px; box-shadow: 0px 0px 6px rgba(0,0,0,.2);">
	<div class="row">
		<div class="col-md-2 col-sm-2 col-xs-4">
			<a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'edit', $product['Product']['id'])); ?>">
			<?php echo $this->Html->image('product_images/' . $product['Product']['image'], array('class' => 'img img-responsive')); ?>
			</a>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-8 product-element-details">
			<h3><?php echo $this->Html->link($product['Product']['name'], array('controller' => 'products', 'action' => 'edit', $product['Product']['id'])); ?></h3>
			<p>from <?php echo $product['Store']['name']; ?></p>
			<p><?php echo $this->Time->timeAgoInWords($product['Product']['created']);2?></p>
			<p class="price">K<?php echo $product['Product']['price'];?></p>
			<ul class="admin-product-actions">
				<li> <i class="fa fa-trash"></i> <?php echo $this->Form->postLink('trash', array('controller' => 'products', 'action' => 'trash', $product['Product']['id'])); ?></li> |
				<li> <i class="fa fa-edit"></i> <?php echo $this->Html->link('edit', array('controller' => 'products', 'action' => 'edit', $product['Product']['id'])); ?></li>
			</ul>
		</div>
	</div>
</div>
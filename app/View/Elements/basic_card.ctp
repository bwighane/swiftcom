<div class="col-xs-12 col-sm-12 col-md-12 basic-card-col text-left" data-link="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id'])); ?>">
	<?php if(true): ?>
	<?php endif;?>
	<div class="basic-card-wrapper rounded-and-shadowed" on-drug="">
		<div class="row">
			<div class="col-md-2 col-xs-3 col-sm-2">
				<?php echo $this->Html->image('product_images/' . $product['Product']['image'], array('style' => 'max-width: 100%;', 'link' => $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id'])), 'class' => 'img-h-100')); ?>
			</div>
			<div class="col-md-10 col-xs-9 col-sm-9 basic-card-details ">
				<p class="product-name card-product-title a"><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id'])); ?>"><?php if(isset($highlight)): echo $this->Text->highlight($product['Product']['name'], $highlight); else: echo $product['Product']['name']; endif; ?></a></p>
				<hr class="no-padding-margin basic-card-hr"/>
				<p class="price"><span class="price-tag">k</span><span currency-format><?php echo $product['Product']['price']; ?></span></p>
				<p>shop <?php echo $this->Html->link($product['Store']['name'], array('controller' => 'products', 'action' => 'store', $product['Store']['id'])); ?></p>
				<p class="visible-md visible-lg visible-sm">posted in <?php echo $this->Html->link($product['Category']['name'], array('controller' => 'products', 'action' => 'category', $product['Category']['id'])); ?> | <?php echo $this->Html->link($product['Subcategory']['name'], array('controller' => 'products', 'action' => 'subcategory', $product['Subcategory']['id'])); ?></p>
				<p><span data-livestamp="<?php echo $this->Time->toUnix($product['Product']['created']); ?>"></span></p>
				<!-- <p><?php echo $this->Html->link('view more...', array('controller' => 'products', 'action' => 'productpage', $product['Product']['id'])); ?></p> -->
			</div>
		</div>
		
	</div>
</div>
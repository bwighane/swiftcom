<div class="row">
	<div class="col-xs-12">
		<div class="row visible-xs">
			<div class="col-xs-12">
				<h1 class="homepage-heading text-center">shop by category</h1>
				<div class="list-group rounded-and-shadowed" style="background: white;">
					<a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'home')); ?>" class="list-group-item" style="font-size: .9em; background: #FF3300; border-color: #FF3300; color: white !important;">latest items<span class="glyphicon glyphicon-chevron-right" style="float: right;"></span></a>
					<?php foreach($categories as $category): ?>
						<a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'category', $category['Category']['id'])); ?>" class="list-group-item" style="font-size: .9em;"><?php echo $category['Category']['name']; ?>
							<span class="glyphicon glyphicon-chevron-right" style="float: right;"></span>
						</a>
						
					<?php endforeach;?>
				</div>
			</div>
		</div>
		<div class="row visible-sm visible-md visible-lg">
			<div class="col-xs-12">
				<div class="homepage-col rounded-and-shadowed">
					<h1 class="homepage-heading text-center">shop by category</h1>
					<div class="d-slick">
		                <?php foreach($categories as $category): ?>
		                    <div class="col-xs-12 col-sm-3" data-link="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'category', $category['Category']['id'])); ?>">
		                        <div class="thumbnail" style="box-shadow: none;">
		                            <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'category', $category['Category']['id'])); ?>">
		                            	<?php echo $this->Html->image('category_images/'. $category['Category']['image'], array('style' => 'width: 100%;')); ?>
		                            </a>
		                            <div class="caption">
		                                <h3 class="home-categories-heading"><?php echo $this->Html->link($category['Category']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['id'])); ?></h3>
		                            </div>
		                        </div>
		                    </div>
		                <?php endforeach;?>
		            </div>
				</div>
			</div>
		</div>
		<?php if(count($products) > 0): ?>
		<div class="row" style="margin-top: 10px;">
			<div class="col-xs-12">
				<!-- <div class="homepage-col rounded-and-shadowed featured" > -->
					<h1 class="homepage-heading text-center">Featured items <small><?php echo $this->Time->niceShort(time()); ?></small></h1>
					<div class="row" data-perfect-grid="1-3-3">
						<?php foreach($products as $product): ?>
							<div class="col-xs-12 col-sm-4 perfect-grid-element" link="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id'])); ?>">
								<div class="panel panel-default featured-item-panel rounded-and-shadowed">
									<div class="panel-body" style="padding-bottom: 5px;">
										<a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id'])); ?>">
											<?php echo $this->Html->image('product_images/thumbnail/' . $product['Product']['image'], array('style' => 'width: 100%;')); ?>
										</a>
									</div>
									<div class="panel-footer">
										<div class="row">
											<div class="col-xs-12">
												<h2 class="featured-item-title text-center"><?php echo $this->Html->link($product['Product']['name'], array('controller' => 'products', 'action' => 'productpage', $product['Product']['id'])); ?></h2>
											</div>
											<div class="col-xs-3">
												<a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'store', $product['Store']['id']));?>">
													<?php echo $this->Html->image('avatars/' . $product['User']['avatar'], array('style' => 'width: 100%', 'class' => 'img-circle')); ?>
												</a>
												
											</div>
											<div class="col-xs-9 featured-item-description" style="">
												<p class="featured-item-owner"><?php echo $this->Html->link($product['User']['display_name'], array('controller' => 'products', 'action' => 'store', $product['Store']['id'])); ?><?php //echo $this->Html->link($product['User']['display_name'], array('controller' => 'products', 'action' => 'store', $product['Store']['id'])); ?>
												</p>
												<?php if(!empty($product['Store']['quick_access_name'])): ?>
													<p class="featured-item-owner-handle">
														<?php //echo '@'.$product['Store']['quick_access_name']; ?>
														<?php echo $this->Html->link('@'.$product['Store']['quick_access_name'], array('controller' => 'products', 'action' => 'store', $product['Store']['id'])); ?>
													</p>
												<?php endif;?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach;?>	
					</div>
				<!-- </div> -->
				<div class="row" style="margin-top: 15px;">
					<div class="col-xs-12 text-center"><?php echo $this->Html->link('view all', array('controller' => 'products', 'action' => 'home'), array('style' => 'font-size: 1.2em;')); ?></div>
				</div>
			</div>
		</div>
		<?php endif;?>
	</div>
</div>

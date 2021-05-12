<div class="row  visible-sm visible-md visible-lg">
	<div class="col-xs-12 col-sm-12 col-md-12 breadcrumb-div">
		<ol class="breadcrumb">
		  <li><?php echo $this->Html->link('categories', array('controller' => 'pages', 'action' => 'categorylist')); ?></li>
		  <li><?php echo $this->Html->link($product['Category']['name'], array('controller' => 'products', 'action' => 'category', $product['Category']['id'])); ?></li>
		  <li><?php echo $this->Html->link($product['Subcategory']['name'], array('controller' => 'products', 'action' => 'subcategory', $product['Subcategory']['id'])); ?></li>
		</ol>
	</div>
</div>
<div class="row" style="margin-left: 0px;" ng-controller="ProductsController">
	<!-- main column -->
	<div class=" col-xs-12 col-md-5 col-md-push-3 product-page-main-column">
		<!-- main details row -->
		<div class="row rounded-and-shadowed"  style="background: white; padding: 10px;">
			<div class="col-xs-12 col-sm-12 col-md-12 pp-col">
				<!-- carousel -->
				<uib-carousel interval="3000" style="width: 100%;">
					<uib-slide>
						<div class="thumbnail">
							<?php echo $this->Html->image('product_images/' . $product['Product']['image'], array('alt' => $product['Product']['name'],'style' => 'width: 100%;', 'class' => 'img-responsive'));?>
						</div>
					</uib-slide>
					<?php foreach($product['Extraimage'] as $extraImage): ?>
						<uib-slide>
							<div class="thumbnail">
								<?php echo $this->Html->image('product_images/extra/' . $extraImage['image_name'], array('alt' => $product['Product']['name'],'style' => 'width: 100%;', 'class' => 'img-responsive')); ?>
							</div>
						</uib-slide>
					<?php endforeach;?>
				</uib-carousel>
				<!-- end carousel -->
			</div>
			<div class="col-xs-12 col-md-12 pp-col">
				<hr class="no-padding-margin product-page-hr"/>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-12 pp-col">
					<div class="col-md-12 pp-col">
						<h1 class="product-page-title"><?php echo $product['Product']['name']?></h1>
						<p>
							by <?php echo $this->Html->link($product['Store']['name'], array('controller' => 'products', 'action' => 'store', $product['Store']['id'])); ?>
						</p>
					</div>
				</div>
				<div class="col-xs-12 col-md-12 pp-col">
					<div class="col-md-12 pp-col">
						<p class="p"><span title="<?php echo $this->Time->nice($product['Product']['created']); ?>" data-livestamp="<?php echo $this->Time->toUnix($product['Product']['created']); ?>"></span></p>
					</div>
				</div>
				<div class="col-xs-12 col-md-12 pp-col" style="padding-right: 10px;"> <!-- 6 12-->
					<div class="row">
						<div class="col-md-12"><h2 class="product-page-price"><span class="price-tag">K</span><span data-currency-format><?php echo $product['Product']['price']?> </span></h2></div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<h3 class="pp-h3">available quantity - <?php echo $product['Product']['quantity']?></h3>
						</div>
					</div>
					<?php if(!empty($product['Product']['description'])): ?>
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<!-- <h3 class="pp-h3">description</h3> -->
							<div>
								<p class="p"><?php echo $this->Text->autoLink(h($product['Product']['description'])); ?></p>
							</div>
						</div>
					</div>
					<?php endif;?>
				</div>
				<div class="col-xs-12 col-md-12 pp-col">
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<h3 class="pp-h3">tags</h3>
							<div>
								<p class="" style="font-size: .9em;">
									<?php echo $this->Html->link($product['Category']['name'], array('controller' => 'products', 'action' => 'category', $product['Category']['id']), array('class' => ''));?> | 
									<?php echo $this->Html->link($product['Subcategory']['name'], array('controller' => 'products', 'action' => 'subcategory', $product['Subcategory']['id']), array('class' => ''));?> |
									<?php echo $this->Html->link($product['Store']['name'], array('controller' => 'products', 'action' => 'store', $product['Store']['id']), array('class' => ''));?>
								</p>
							</div>
						</div>
					</div>
					<div class="row">
						<!--
						<?php if(!$favourited): ?>
							<div class="col-xs-12 col-md-12 col-sm-12">
								<div>
								
									<?php echo $this->Form->postLink(' add to favourites', array('controller' => 'favourites', 'action' => 'add', $product['Product']['id']), array('class' => 'btn btn-default btn-xs product-tag', 'favourit' => true));?>
								</div>
							</div>
						<?php else: ?>
							<div class="col-xs-12 col-md-12 col-sm-12">
							<div>
								
								<?php echo $this->Form->postLink(' remove from favourites', array('controller' => 'favourites', 'action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-default btn-xs product-tag', 'favourit' => true));?>
							</div>
							</div>
						<?php endif;?>
						-->
						<div class="col-xs-12 col-sm-4">
							<p style="margin-top: 7px;">
								<div class="row">
									<div class="col-xs-6 visible-xs">
										<a href="#supplier_contacts" class="btn btn-md btn-info btn-block" style="text-transform: capitalize; color: white !important;">contact owner</a>
										<?php //echo $this->Html->link('contact owner', array('controller' => 'products', 'action' => 'productpage', '#' => 'supplier_contacts'), array('class' => 'btn btn-md btn-info btn-block', 'style' => 'text-transform: capitalize; color: white !important;'));?>
									</div>
									<div class="col-xs-6 col-sm-12 contact-owner-col" style="">
										<?php echo $this->Html->link('visit shop', array('controller' => 'products', 'action' => 'store', $product['Store']['id']), array('class' => 'btn btn-md btn-default btn-block', 'style' => 'text-transform: capitalize; colo: white !important;'));?>
									</div>
								</div>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-12 pp-col">
				<hr class="no-padding-margin product-page-hr"/>
			</div>
			<div class="col-xs-12 col-md-12 pp-col">
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<div>
							<h3 class="pp-h3">share this</h3>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Router::url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id']), true);?>"><?php echo $this->Html->image('social/facebook.png');?></a>
							<a href="https://plus.google.com/share?url=<?php echo Router::url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id']), true);?>"><?php echo $this->Html->image('social/googleplus.png');?></a>
							<a href="https://twitter.com/home?status=<?php echo Router::url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id']), true);?>"><?php echo $this->Html->image('social/twitter.png');?></a>
						</div>
					</div>
				</div>
			</div>
		</div> 
		<!-- end of main details row -->
		<?php //enter reviews this place right here?>
		<div class="row rounded-and-shadowed"  style="background: white; padding: 0px; margin-top: 10px;" ng-controller="ReviewsController" id="product-reviews">
			<h1 style="width: 100%; padding: 10px 10px 0 10px; margin-bottom: 10px;"class="product-page-title comments-title">comments (<?php echo count($reviews); ?>) <span class="small" style="float: right; line-height: 18px; text-transform: lowercase;"> <?php if(!$loggedIn): ?> <?php echo $this->Html->link('log in required', array('controller' => 'users', 'action' => 'login'))?><?php endif;?></span></h1>
			<!-- <div class="col-xs-12" style="padding-left: 0px;">
				<hr class="no-padding-margin product-page-hr"/>
			</div> -->
			<div class="col-xs-12 col-sm-12 col-md-12 product-reiviews-col pp-col" style="pading: 0px 10px;">
				<?php foreach($reviews as $review): ?>
					<div class="review" style="padding: 0 10px;">
						<hr class="no-padding-margin product-page-hr" style="margin-top: 0;"/>
						<div class="row">
							<div class="col-xs-1">
								<?php echo $this->Html->image('avatars/'. $review['User']['avatar'], array('style' => 'width: 32px; height: 32px;', 'class' => 'img-circle'));?>
							</div>
							<div class="col-xs-11 " style="padding-left: 25px;">
								<h3 style="font-size: 13px; font-weight: bold; color: #656D78;"><?php echo $review['User']['display_name']; ?> - <span style="font-size: 12px; text-transform: lowercase;"data-livestamp="<?php echo $this->Time->toUnix($review['Review']['created']); ?>"></span></h3>
								<p class="review-body p" style="padding-left: 0px;">
									<?php echo h($review['Review']['review']); ?>
								</p>
							</div>
						</div>
					</div>
				<?php endforeach;?>
				<div class="row text-center">
					<?php if($this->Paginator->hasNext('Review')): ?>
						<a href="#" class="">load next >></a>
					<?php endif;?>
					<?php if($this->Paginator->hasPrev('Review')): ?>
						<a href="#" class=""><< load previous</a>
					<?php endif;?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 reviews-form-col pp-col" style="margin-top: 10px;">
				
				<?php echo $this->Form->create('Review', array('url' => array('controller' => 'reviews', 'action' => 'add'), 'inputDefaults' => array('div' => 'form-group'), 'novalidate' => true, 'name' => 'reviewForm')); ?>
				<?php echo $this->Form->input('Review.review', array('placeholder' => 'enter your comment here', 'class' => 'form-control', 'label' => '', 'ng-model' => 'review', 'required' => true, 'rows' => 5, 'div' => array('style' => 'margin-bottom: 5px;'), 'style' => 'font-size: .9em; border-left: none; border-right: none; border-radius: 0;')); ?>
				<?php //echo $this->Form->input('Review.user_id', array('type' => 'hidden', 'value' => ($user['id'] ? $user['id'] : ''))); ?>
				<?php echo $this->Form->input('Review.product_id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>
				<?php echo $this->Form->input('Notification.redirect_url', array('type' => 'hidden', 'value' => $this->Html->url(array('controller' => 'products', 'action' => 'productpage', '#' => 'product-reviews', $product['Product']['id'])))); ?>
				<div class="row" style="padding: 5px;">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<?php echo $this->Form->end(array('label' => 'post comment', 'class' => 'btn btn-info btn-sm', 'ng-disabled' => 'reviewForm.$invalid', 'style' => 'display: inline-block;'));?>
					</div>
				</div>
			</div>
			<!-- end of commecting row -->
		</div>
		
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-md-pull-5 side-nav home-side-nav first-side-nav pp-side-nav sup-col">
    	<?php echo $this->element('supplier_contacts', array('contacts' => $contacts, 'class' => 'pp-supplier'));?>
		<div style="margin-bottom: 10px;"></div>
		<?php echo $this->element('quick_user_actions');?>
    </div>
	<!-- related posts -->
	<?php if(count($relatedProducts) > 0): ?>
	<div class="col-xs-12 col-sm-12 col-md-4 pp-related related-products-row">
		<h1 class="related-products-heading text-center" style="font-size: 1.2em; font-weight: normal; text-transform: none; margin-bottom: 5px; color: #737373;">Related items</h1>
		<div class="row" data-perfect-grid="2-4-2">
			<?php foreach($relatedProducts as $product): ?>
				<div class="col-xs-6 col-sm-3 col-md-6 perfect-grid-element card col-md-bw">
				  <div class="thumbnail card-thumbnail rounded-and-shadowed" data-link="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id'])); ?>">
				    <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id'])); ?>">
				      <?php echo $this->Html->image('product_images/thumbnail/' . $product['Product']['image'], array('alt' => $product['Product']['name'], 'class' => 'card-image', 'style' => 'text-align: left; padding: 7px;',)); ?>
				    </a>
				    <div class="caption" style="text-transform: capitalize; clear: both;">
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
			<?php endforeach;?>
		</div>
		<div class="row" style="margin-top: 0px;">
			<div class="col-xs-12 text-cente"><?php echo $this->Html->link('view all', array('controller' => 'products', 'action' => 'subcategory', $product['Subcategory']['id']), array('style' => 'font-size: 1.1em;')); ?></div>
		</div>
	</div>
	<?php endif; ?>
</div>
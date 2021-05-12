
<div class="row">
	<div class="col-xs-12 col-md-12 col-md-3 side-nav">
		<div class="row">
			<div class="col-xs-12 col-xs-2 col-md-2 col-sm-12">
				<div class="thumbnail" style="background: transparent; border: none; box-shadow: none;">
					<?php echo $this->Html->image('avatars/' . $user['User']['avatar'], array('class' => 'img-circle img-responsive'));?>
				</div>
			</div>
			<div class="col-md-10 user-profile">
				<p style="font-weight: bold; text-transform: capitalize;"><?php echo $user['User']['display_name']; ?></p>
				<p>active since <?php echo $this->Time->niceShort($user['User']['created']); ?></p>
			</div>
		</div>
		<div class="row">
			<div class=" col-xs-12 col-sm-12 col-md-12">
				<div class="side-options-panel">
					<h3 class="side-nav-h3">contact information</h3>
					<hr class="no-padding-margin"/>
					<ul class="list-group viewprofile-list">
						<li class="list-group-item"> <i class="fa fa-envelope"></i> <?php echo $user['Contact']['email_address'] ? $user['Contact']['email_address'] : $user['User']['username'];  ?></li>
						<?php if(!empty($user['Contact']['phone'])):?>
						<li class="list-group-item"><i class="fa fa-phone"></i>  <a href="tel:<?php echo $user['Contact']['phone']; ?>"><?php echo $user['Contact']['phone']; ?></a></li>
						<?php endif;?>
						<?php if(!empty($user['Contact']['facebook_url'])):?>
						<li class="list-group-item"><i class="fa fa-facebook"></i> <?php echo $user['Contact']['facebook_url']; ?></li>
						<?php endif;?>
						<?php if(!empty($user['Contact']['twitter_handle'])):?>
						<li class="list-group-item"><i class="fa fa-twitter"></i> <?php echo $user['Contact']['twitter_handle']; ?></li>
						<?php endif;?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php echo $this->element('product_listing', array('products' => $userProducts, 'title' => $displayName)); ?>
</div>
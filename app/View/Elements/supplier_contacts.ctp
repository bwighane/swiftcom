<div id="supplier_contacts"></div>
<?php if($loggedIn): ?>
<div class="side-options-panel rounded-and-shadowed <?php if(isset($class)) echo $class; ?>">
	<div class="row">
		<div class="col-xs-12" style="line-height: 32px; font-size: 14px;">
			<?php echo $this->Html->image('avatars/' . $avatar, array('class' => 'img img-circle img-responsive', 'style' => 'width: 32px; float: left;'));?>&nbsp;<?php echo $contacts['User']['display_name']; ?>
		</div>
	</div>
	<hr class="no-padding-margin product-page-hr"/>
	<?php if(isset($contacts['Contact']['phone']) && !empty($contacts['Contact']['phone'])): ?>
	<div class="row contact-row">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Phone: <?php echo $contacts['Contact']['phone']?>
		</div>
	</div>
	<?php endif;?>
	<?php if(isset($contacts['Contact']['otherphone']) && !empty($contacts['Contact']['otherphone'])): ?>
	<div class="row contact-row">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Phone: <?php echo $contacts['Contact']['otherphone']?>
		</div>
	</div>
	<?php endif;?>
	<?php if(isset($contacts['Contact']['email_address']) && !empty($contacts['Contact']['email_address'])): ?>
	<div class="row contact-row">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Email: <?php echo $this->Text->autoLink($contacts['Contact']['email_address']); ?>
		</div>
	</div>
	<?php endif;?>
	<!-- facebook and twitter connections are bound to change -->
	<?php //if(isset($contacts['Contact']['facebook_url']) && !empty($contacts['Contact']['facebook_url'])): ?>
	<!-- <div class="row contact-row">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Facebook: <?php //echo $contacts['Contact']['facebook_url']; ?>
		</div>
	</div> -->
	<?php //endif;?>
	<?php //f(isset($contacts['Contact']['twitter_handle']) && !empty($contacts['Contact']['twitter_handle'])): ?>
	<!-- <div class="row contact-row">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Twitter: <?php //echo $contacts['Contact']['twitter_handle']; ?>
		</div>
	</div> -->
	<?php //endif;?>
	<?php if(isset($productPage) && $productPage && ($product['User']['id'] != $user['id'])): ?>
		<div class="row message-seller-row" style="margin-top: 10px;" ng-controller="MessagesController">
			<!-- scope initializer span -->
			<span  style="display: none;"ng-init="messageFrom = '<?php echo $user['id']; ?>'; messageTo = '<?php echo $product['User']['id'];?>'; messageTitle = '<?php echo $product['Product']['name']; ?>'; messageParent=0; composeDialogTitle='to: <?php echo $product['User']['display_name']; ?>';"></span>

			<div class="col-xs-12 col-sm-3 col-md-12" style="padding-bottom: 5px;">
				<?php echo $this->Html->link('message seller', array('controller' => 'messages', 'action' => 'compose', $product['User']['id']), array('class' => 'btn btn-primary btn-block', 'style' => 'color: white !important;'))?>
				<!-- <button ng-click="showMessageComposeDialog()" class="btn btn-primary btn-block">send message</button> -->
			</div>
		</div>
	<?php else:?>
		<?php if(!empty($store) && ($store['User']['id'] != $user['id'])): ?>
			<div class="row message-seller-row" style="margin-top: 10px;" ng-controller="MessagesController">
				<!-- scope initializer span -->
				<span ng-init="messageFrom = '<?php echo $user['id']; ?>'; messageTo = '<?php echo $store['User']['id'];?>'; messageTitle = 'store front message'; messageParent=0; composeDialogTitle='to: <?php echo $store['User']['display_name']; ?>';"></span>

				<div class="col-xs-12 col-sm-3 col-md-12" style="padding-bottom: 5px;">
					<?php echo $this->Html->link('message seller', array('controller' => 'messages', 'action' => 'compose', $store['User']['id']), array('class' => 'btn btn-primary btn-block', 'style' => 'color: white !important;'))?>
					<!-- <button ng-click="showMessageComposeDialog()" class="btn btn-primary btn-block">send message</button> -->
				</div>
			</div>
		<?php endif;?>
		<!-- <message-composer to="bwighane.mwalwanda@gmail.com" from="dudethmaniac" parent="45"></message-composer> -->
	<?php endif;?>
</div>
<?php else: ?>
	<div class="side-options-panel rounded-and-shadowed">
		<div class="row" style="margin-top: 10px; margin-bottom: 10px;">
			<div class="col-xs-12">
				<p style="font-size: .9em;">
					Log in to contact the owner of the item plus access extra awesome features of the Nthambi&trade; platform!
				</p>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-12" style="padding-top: 10px;">
				<?php echo $this->Html->link('log in here', array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-info btn-block btn-sm', 'style' => 'color: white !important')); ?>
			</div>
		</div>
	</div>
<?php endif;?>
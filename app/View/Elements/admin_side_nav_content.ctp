<!-- <?php echo $this->element('shop_stats'); ?> -->
<div class="side-options-panel  visible-md visible-lg new-product-panel">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<p class="p" style="font-ize: 14px; font-weight: bold;"><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'add')); ?>" class="btn-new-item btn btn-info btn-sm btn-block" style ="color: white !important;"><!-- <span class="fa fa-plus"></span> -->new post</a><?php //echo $this->Html->link('signout', array('controller' => 'users', 'action' => 'logout')); ?></span></p>
			</div>
		</div>
	</div>
	<div class="side-options-panel rounded-and-shadowed">
		<h3 class="card-heading">quick actions</h3>
		<!-- <hr class="no-padding-margin"/> -->
		<div class="list-group admin-list">
			<a class="list-group-item" href="<?php echo $this->Html->url(array('controller' => 'notifications', 'action' => 'index')); ?>"><i class="fa fa-bell"></i> notifications(<?php echo $notificationCount; ?>)</a>
			<a class="list-group-item" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'add')); ?>"><i class="fa fa-plus"></i> new post</a>
			<a class="list-group-item" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>"><i class="fa fa-th-list"></i> my products</a>
			<a class="list-group-item" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'trasheditems')); ?>"><i class="fa fa-trash"></i> trashed items</a>
		</div>
	</div>
	<!-- <div class="side-options-panel rounded-and-shadowed">
		<h3 class="admin-account-actions-h3">my stores</h3>
		<hr class="no-padding-margin"/>
		<div class="list-group admin-list">
		<?php foreach($storesList as $entry): ?>
			<a class="list-group-item" style="font-weight: bold;"href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'viewfromstore', $entry['Store']['id'])) ?>"></i> <?php echo $entry['Store']['name']; ?></a>
		<?php endforeach;?>
		</div>
	</div> -->
	<!-- <div class="side-options-panel rounded-and-shadowed">
		<h3 class="admin-account-actions-h3">store actions</h3>
		<hr class="no-padding-margin"/>
		<div class="list-group admin-list">
			<a class="list-group-item" href="<?php echo $this->Html->url(array('controller' => 'stores', 'action' => 'index')) ?>"><i class="fa fa-plus"> </i> new store</a>
			<a class="list-group-item" href="<?php echo $this->Html->url(array('controller' => 'stores', 'action' => 'index')) ?>"><i class="fa fa-cog"> </i> manage stores</a>
		</div>
	</div> -->
	<div class="side-options-panel rounded-and-shadowed">
		<h3 class="card-heading">account</h3>
		<!-- <hr class="no-padding-margin"/> -->
		<div class="list-group admin-list">
			<a class="list-group-item" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit')); ?>"><i class="fa fa-cog"></i> settings</a>
			<a class="list-group-item" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>"><i class="fa fa-user"></i> logout</a>
		</div>
	</div>
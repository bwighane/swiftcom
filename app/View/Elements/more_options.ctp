<!-- <div class="side-options-panel rounded-and-shadowed">
	<h3 class="card-heading">more options</h3>
	<div class="list-group more-options-list">
	    <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'favourites'));?>" class="list-group-item">my favourites</a>
	   <a href="<?php echo $this->Html->url('/');?>" class="list-group-item"><span class="fa fa-eye"></span> most viewed</a>
	    <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'advancedsearch'));?>" class="list-group-item visible-xs">advanced search</a>
	    <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'home'));?>" class="list-group-item">recently added</a>
	</div>
</div> -->
<div class="side-options-panel rounded-and-shadowed">
	<h3 class="card-heading">sort products by</h3>
	<!-- <hr class="no-padding-margin"/> -->
	<div class="list-group more-options-list">
	    <?php echo $this->Paginator->sort('created', 'recent entries', array('direction' => 'desc', 'lock' => true, 'class' => 'list-group-item')); ?>

   	<?php echo $this->Paginator->sort('created', 'oldest entries', array('direction' => 'asc', 'lock' => true, 'class' => 'list-group-item')); ?>
    <?php echo $this->Paginator->sort('price', 'price : high to low', array('direction' => 'desc', 'lock' => true, 'class' => 'list-group-item')); ?>
    <?php echo $this->Paginator->sort('price', 'price : low to high', array('direction' => 'asc', 'lock' => true, 'class' => 'list-group-item')); ?>
	</div>
</div>
<?php if(!$loggedIn): ?>
<div class="side-options-panel rounded-and-shadowed">
	<h3 class="card-heading">my account</h3>
	<!-- <hr class="no-padding-margin"/> -->
	<div class="list-group more-options-list">
	    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login'));?>" class="list-group-item"><span class="fa fa-user"></span> log in</a>
	</div>
</div>
<?php endif;?>
<?php echo $this->element('quick_user_actions'); ?>

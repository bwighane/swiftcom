<?php if(isset($isSearch) && $isSearch): ?>
	<div class="row text-cente empty-state-row" style="padding-left: 10px; margin-top:5px;">
		<div class="rounded-and-shadowed col-xs-12" style="background: white; padding-top: 10px; padding-bottom: 10px;">
			<h1 class="empty-state-heading">nothing found for your search</h1>
			<!-- <p>
				<?php echo $this->Html->image('cart-crossed.png'); ?>
			</p> -->
			<hr class="no-padding-margin admin-hr"/>
			<p>try out the following, </p>
			<ul>
				<li><?php echo $this->Html->link('browse available product categories', array('controller' => 'pages', 'action' => 'categorylist')); ?></li>
				<li>
					try the <?php echo $this->Html->link('advanced search tool', array('controller' => 'products', 'action' => 'advancedsearch')); ?>
					 with varied parameters
				</li>
			</ul>
		</div>
	</div>
<?php else: ?>
	<div class="row text-center empty-state-row" style="padding-left: 10px; margin-top:5px;">
		<div class="rounded-and-shadowed col-xs-12" style="background: white; padding-top: 10px; padding-bottom: 10px;">
			<h1 class="empty-state-heading">nothing to see here.</h1>
			<!-- <p>
				<?php echo $this->Html->image('cart-crossed.png'); ?>
			</p> -->
			<hr class="no-padding-margin admin-hr"/>
			<p class="p empty-state-p">perhaps <?php echo $this->Html->link('browse other product categories', array('controller' => 'pages', 'action' => 'categorylist')); ?></p>
		</div>
	</div>	
<?php endif;?>


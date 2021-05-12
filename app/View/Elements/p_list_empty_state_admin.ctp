<div class="row text-center empty-state-row">
	<div class="col-xs-12 " style="padding-left: 10px; margin-top:5px;">
		<?php if(!isset($trashemptystate)): ?>
			<div class="rounded-and-shadowed" style="background: white; padding-top: 10px; padding-bottom: 10px;">
				<h1 class="empty-state-heading">you are not selling anything,</h1>
				<hr class="no-padding-margin admin-hr"/>
				<p style="">

					<?php echo $this->Html->link('start selling now!', array('controller' => 'products', 'action' => 'add'), array('clss' => 'btn btn-sm bt-info', 'stye' => 'font-size: 1em;')); ?>
				</p>
			</div>
		<?php else: ?>
			<div class="rounded-and-shadowed" style="background: white; padding-top: 10px; padding-bottom: 10px;">
				<h1 class="empty-state-heading">no items in the trash</h1>
				<hr class="no-padding-margin admin-hr"/>
				<p style="">
					<?php echo $this->Html->link('go to my products', array('controller' => 'products', 'action' => 'index'), array('class' => '')); ?>
				</p>
			</div>
		<?php endif;?>
	</div>
</div>
<div class="row">
	<div class="messages-col col-xs-12 col-sm-12 col-md-9 col-md-push-3">
		<div class="panel rounded-and-shadowed" style="margin-bottom: 0px;">
			<div class="panel-heading">
				<h1>conversations</h1>
			</div>
			<div class="panel-body">
				<?php foreach($conversations as $conversation): ?>
					
				<?php endforeach;?>
			</div>
		</div>
	</div>
	<?php echo $this->element('admin_sidenav'); ?>
</div>

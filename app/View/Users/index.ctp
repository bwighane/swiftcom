<div class="row">
	<div class="col-xs-12 col-sm-12 col-s-push-2 p-edit-col col-md-9 col-md-push-3">
		<div class="panel rounded-and-shadowed text-center" style="padding: 10px;">
			<h1 style="color: #555F6E; font-weight: normal; font-size: 1.5em; margin-bottom: .7em; line-height: normal;">Welcome,</h1>
			<pstyle="margin-bottom: 1em;">Thank you for registering with <?php echo $appName; ?>.</p>

			<p style="margin-bottom: 20px;">
			Get started by <?php echo $this->Html->link('editing your profile', array('controller' => 'users', 'action' => 'edit'))?>, adding more <?php echo $this->Html->link('contact details', array('controller' => 'users', 'action' => 'edit', '#' => 'contact-details'))?> and a <?php echo $this->Html->link('profile picture', array('controller' => 'users', 'action' => 'edit', '#' => 'profile-pic'))?> to be shown to the public <br/>

			We hope you will have a great experience with us!! <br/>

			<p style="margin-top: 30px; text-transform: capitalize; font-style: italic;">- The <?php echo $appName; ?> team.</p>
			</p>
		</div>
	</div>
	<?php echo $this->element('admin_sidenav');?>
</div>
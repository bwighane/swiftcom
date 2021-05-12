<div class="row" style="margin-left: -5px;">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 rounded-and-shadowed white about-main-column">
		<div class="page-header about-page-header">
			<h1 style="font-size: 30px;">welcome, <?php echo $user['display_name']; ?></h1>
			<hr class="n-padding-margin" style="margin: 20px 0px;"/>
		</div>
		<div class="row text-center about-content">
			<div class="col-xs-12 text-center">
				<p>
					Thank you for registering with <?php echo $appName; ?>, <br/>
					We hope you will have a great experience with us <br />
					<br />
					~ <span style="font-style: italic;">Management</span>
				</p>
				<p>
					You can get started by adding contact information to your profile. <br />
					<?php echo $this->Html->link('edit your profile here...', array('controller' => 'users', 'action' => 'edit')); ?> <br />
				</p>
			</div>
		</div>
	</div>
</div>
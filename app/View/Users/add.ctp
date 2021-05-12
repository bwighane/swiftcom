<!-- <div class="row add-row">
	<div class=" col-xs-12 col-sm-8 col-sm-push-2  col-md-4 col-md-push-4 login-col">
		<h1 style="text-align: center; font-size: 24px; font-family: sans;"><?php echo $appName; ?><small><sup>&reg;</sup></small></h1>
	</div>
</div> -->
<div class="row">
	<div class="col-xs-12 col-sm-8 col-sm-push-2 col-md-push-3 col-md-6 sign-up-col">
		<section class="panel add-user-panel rounded-and-shadowed">
			<div class="page-header advanced-search-page-header">
				<h1 class="page-header-custom">create new account</h1>
				<hr class="no-padding-margin advanced-search-hr"/>
			</div>
			<div class="panel-body">
				<?php echo $this->Form->create('User', array('type' => 'file', 'novalidate' => false, 'role' => 'form', 'inputDefaults' => array('div' => array('class' => 'form-group', 'required-form-group')))); ?>
					<?php
						echo $this->Form->input('User.username', array('class' => 'form-control input-sm', 'label' => 'email address or phone number ', 'form-field-help-text' => 'used to sign you in', 'type' => 'text', 'placeholder' => 'email / phone number'));
						echo $this->Form->input('User.display_name', array('class' => 'form-control input-sm', 'label' => 'display name', 'form-field-help-text' => 'identifies you to the public', 'placeholde' => 'store name e.g classics shop', 'required' => true));
						/*echo $this->Form->input('User.district_id', array('class' => 'form-control input-sm', 'empty' => 'select a district', 'label' => 'district based *', 'empty' => 'select a district')); */
						echo $this->Form->input('User.password', array('class' => 'form-control input-sm', 'label' => 'password ', 'form-field-help-text' => 'a minimum of 6 characters', 'placeholde' => 'password'));
						echo $this->Form->input('passwordConfirm', array('class' => 'form-control input-sm', 'type' => 'password', 'label' => 'confirm password ', 'placeholde' => 'confirm password'));
						//echo $this->Form->input('User.avatar', array('required' => false, 'type' => 'file', 'label' => 'profile picture - optional', 'class' => '', 'div' => 'form-group'));
					?>
					<p style="line-height: normal; font-size: 13px; margin-bottom: 10px;">By signing up, you will be agreeing to the <?php echo $this->Html->link('terms of the service', array('controller' => 'pages', 'action' => 'termsofuse'), array('target' => '_blank')); ?>.</p>
				<?php echo $this->Form->end((array('label' => 'create account', 'name' => 'signupSubmitt', 'class' => 'btn btn-info btn-sm'))); ?>
			</div>
			<div class="panel-footer error-message text-center" style="display: none;">
				<p><?php echo $this->Session->flash();?></p>
			</div>
		</section>
	</div>
</div>

<?php echo $this->Flash->render('profile_update'); ?>
<div class="row">
	<div class="col-xs-12 u-edit-col col-sm-12 col-md-9 col-md-push-3">
		<div class="row">
			<div class="col-xs-12 col-md-6" style="padding-left: 10px;">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 gen-info">
						<div class="panel rounded-and-shadowed">
							<div class="panel-heading capitalized">
								<h2 class="card-heading">general information</h2>
							</div>
							<div class="panel-body">
								<?php echo $this->Form->create('User', array('role' => 'form', 'inputDefaults' => array('div' => 'form-group'))); ?>
								<?php
									echo $this->Form->input('User.display_name', array('class' => 'form-control input-sm', 'label' => 'display Name', 'required' => true));
									echo $this->Form->input('User.district_id', array('class' => 'form-control input-sm', 'empty' => 'select a district', 'label' => 'District Based'));
								?>
								<hr class="no-padding-margin admin-hr"/>
								<div class="">
									<?php echo $this->Form->end(array('label' => 'save changes', 'class' => 'btn btn-default btn-sm')); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 gen-info">
						<div class="panel rounded-and-shadowed">
							<div class="panel-heading capitalized">
								<h2 class="card-heading">shop information</h2>
							</div>
							<div class="panel-body">
								<?php echo $this->Form->create('Store', array('role' => 'form', 'inputDefaults' => array('div' => 'form-group'), 'url' => array('controller' => 'stores', 'action' => 'edit', $storeId))); ?>
								<?php
									echo $this->Form->input('Store.name', array('class' => 'form-control input-sm', 'label' => 'shop name'));
									echo $this->Form->input('Store.quick_access_name', array('class' => 'form-control input-sm', 'label' => 'quick access name', 'required' => false, 'form-field-help-text' => 'similar to a twitter or instagram handle without \'@\' e.g nthambi101'));
									echo $this->Form->input('Store.description', array('class' => 'form-control', 'label' => 'shop description', 'form-field-help-text' => 'a brief description of what you have to offer'));
								?>
								<hr class="no-padding-margin admin-hr"/>
								<div class="">
									<?php echo $this->Form->end(array('label' => 'save changes', 'class' => 'btn btn-default btn-sm')); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 profile-pic" id="profile-pic">
						<div class="panel rounded-and-shadowed">
							<div class="panel-heading capitalized">
								<h2 class="card-heading">profile picture</h2>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-xs-6 col-sm-3 col-md-4">
										<?php echo $this->Html->image('avatars/' . $user['avatar'], array('style' => 'width: 100%', 'class' => 'img-circle')); ?>
									</div>
								</div>
								<?php echo $this->Form->create('User', array('type' => 'file', 'url' => array('controller' => 'users','action' => 'changeAvatar'), 'inputDefaults' => array('div' => 'form-group'))); ?>
									<?php echo $this->Form->input('User.avatar', array('required' => false, 'type' => 'file', 'label' => 'select picture')); ?>
								<hr class="no-padding-margin admin-hr"/>
								<div class="">
									<?php echo $this->Form->end(array('label' => 'upload', 'class' => 'btn btn-default btn-sm')); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
	</div>
	<div class="col-xs-12 col-md-6" style="padding-left: 10px;" id="contact-details">
		<div class="panel rounded-and-shadowed" style="margin-bottom: 0px;">
			<div class="panel-heading capitalized">
				<h2 class="card-heading">contact information</h2>
			</div>
			<div class="panel-body">
				<?php echo $this->Form->create('Contact', array('url' => array('controller' => 'contacts', 'action' => 'edit', $contactId), 'role' => 'form', 'inputDefaults' => array('div' => 'form-group required-form-group', 'required' => false))); ?>
				<?php
					echo $this->Form->input('Contact.email_address', array('class' => 'form-control input-sm'));
					echo $this->Form->input('Contact.phone', array('class' => 'form-control input-sm', 'label' => 'phone number'));
					echo $this->Form->input('Contact.otherphone', array('class' => 'form-control input-sm', 'label' => 'phone number 2'));
					//echo $this->Form->input('Contact.twitter_handle', array('class' => 'form-control input-sm', 'div' => array('input-addon' => '@', 'class' => 'form-group')));
					//echo $this->Form->input('Contact.facebook_url', array('label' => 'facebook username', 'class' => 'form-control input-sm', 'div' => array('input-addon' => 'http://www.facebook.com/', 'class' => 'form-group')));
				?>
				<hr class="no-padding-margin admin-hr"/>
				<div class="">
					<?php echo $this->Form->end(array('label' => 'save changes', 'class' => 'btn btn-default btn-sm')); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
	</div>
		</div>
	</div>
	<?php echo $this->element('admin_sidenav'); ?>
</div>

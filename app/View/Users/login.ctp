<!-- <div class="row login-row">
	<div class=" col-xs-12 col-sm-8 col-sm-push-2  col-md-4 col-md-push-4 login-col">
		<h1 style="text-align: center; font-size: 24px; font-family: sans;"><?php echo $appName; ?><small><sup>&reg;</sup></small></h1>
	</div>
</div> -->
<div class="row">
	<div class=" col-xs-12 col-sm-6 col-sm-push-3  col-md-4 col-md-push-4 login-col">
		<div class="row login-row">
			<div class="col-xs-12 col-md-12 col-sm-12">
				<section class="panel login-panel rounded-and-shadowed">
					<div class="page-header advanced-search-page-header">
						<h1 class="page-header-custom">log in nthambi</h1>
						<hr class="no-padding-margin advanced-search-hr"/>
					</div>
					<div class="panel-body" id="login">
						<?php echo $this->Form->create('User', array( 'id' => 'user-login-form','type' => 'file', 'role' => 'form', 'inputDefaults' => array('div' => 'form-group'))); ?>
							<?php
								echo $this->Form->input('User.username', array('type' => 'text', 'class' => 'form-control input-sm', 'label' => 'email or phone'));
								echo $this->Form->input('User.password', array('class' => 'form-control input-sm'));
								echo $this->Form->input('auto_login', array('class' => '', 'style' => '' , 'type' => 'checkbox', 'label' => 'remember me', 'div' => array('class' => 'checkbox', 'style' => 'margin-bottom: 5px;'), 'style' => 'margin-left: 0px;', 'checked'));
							?>
						<div class="row">
							<div class="col-xs-12 text-center" style="margin-bottom: 5px;">
								<?php echo $this->Flash->render('login'); ?>
							</div>
							<div class="col-xs-12 col-sm-12">
								<?php echo $this->Form->end((array('label' => 'log in', 'class' => 'btn btn-info btn-block'))); ?>
							</div>
							<div class="col-xs-12" style="margin-top: 16px;">
								<p class="text-center p login-p">or</p>
							</div>
							<div class="col-xs-12" style="margin-top: 0px;">
								<div class="row">
									<div data-link="<?php echo htmlspecialchars($facebookLoginUrl); ?>" class="col-xs-8 col-xs-push-3" style="line-height: 40px; font-size: 1em;">
										<a href="<?php echo htmlspecialchars($facebookLoginUrl); ?>">
											<?php echo $this->Html->image('social/facebook45.png', array('class' => 'img img-circle img-responsive', 'style' => 'width: 40px; float: left;'));?> &nbsp;&nbsp;use facebook
										</a>
									</div>
								</div>
								<!-- <a href="<?php echo htmlspecialchars($facebookLoginUrl); ?>" class="" style="line-height: 30px !important;">
									<?php echo $this->Html->image('social/facebook.png'); ?> login using facebook
								</a> -->
							</div>
							<!-- <div class="col-xs-12">
								<p class="text-center p login-p">or</p>
							</div> -->
							<div class="col-xs-12 col-sm-12 new-account-link text-center">
								<hr class="no-padding-margin">
								<p class="p login-p" style="margin-top: 10px;">Not a member?  
								<?php echo $this->Html->link('create new Nthambi account', array('action' => 'add'), array('clas' => 'btn btn-default btn-block ', 'style' => 'font-weight: bol;')); ?></p>

								<!-- <p class="">
									<?php echo $this->Html->link('create new account', array('action' => 'add'), array('clas' => 'btn btn-default btn-block')); ?>
								</p> -->
							</div>
						</div>
						<!--<div class="row">
							<div class="col-xs-12">
								Don't have an account ? <?php echo $this->Html->link('create new account', array('controller' => 'users', 'action' => 'add')); ?>
							</div>
						</div>
					-->
					</div>
				</section>
			</div>
		</div>
	</div>
</div>

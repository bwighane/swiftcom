<?php if($showFooter): ?>
	<div class="container-fluid" style="background: #232f3e; margin-top: 30px; padding: 10px;">
		<div class="row">
			<div class="col-xs-12 col-md-10 col-md-offset-1">
				<div class="row  footer-section">
					<div class="col-xs-12 col-sm-3 footer-col">
						<h2>help</h2>
						<p class="footer-p"><?php echo $this->Html->link('FAQ',array('controller' => 'pages', 'action' => 'faq')); ?></p>
						<p class="footer-p" style="margin-bottom: 10px;">What are you selling or looking for? Nthambi is a community of buyers and sellers from all over <b style="color: #cccccc;">Malawi</b> interacting for a common goal, <b style="color: #cccccc;"> to trade</b>. <?php echo $this->Html->link('be part of the community.', array('controller' => 'users', 'action' => 'login')); ?></p>

						<p class="footer-p">Email: <a href="mailto:support@nthambi.com">support@nthambi.com</a></p>
						<p class="footer-p">Phone: +265884072675</p>
					</div>
					<div class="col-xs-12 col-sm-2 col-md-2 footer-col">
						<h2>service</h2>
						<ul>
							<li><?php echo $this->Html->link('about', array('controller' => 'pages', 'action' => 'about')); ?></li>
							<li><?php echo $this->Html->link('terms', array('controller' => 'pages', 'action' => 'termsofuse')); ?></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-2 col-md-2 footer-col">
						<h2>find us</h2>
						<ul>
							<li><a href="http://www.facebook.com/nthambishopping" target="_blank">facebook</a></li>
							<li><a href="http://www.twitter.com/nthambishopping" target="_blank">twitter</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-5 col-md-5 footer-col">
						<h2>feedback</h2>
						<p class="footer-p" style="margin-bottom: 10px;" >What are your views of the Nthambi platform? Your feedback matters. Help us create a better experience for you.</p>
						<?php echo $this->Form->create('Feedback', array('url' => array('controller' => 'feedback', 'action' => 'add'))); ?>
							<?php echo $this->Form->input('Feedback.content', array('class' => 'form-control', 'placeholder' => 'tell us what you think', 'label' => false, 'div' => 'form-group', 'style' => 'font-size: .9em;')); ?>
						<?php echo $this->Form->end(array('label' => 'send feedback', 'class' => 'btn btn-default btn-sm'));?>
					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<hr style="margin-bottom: 10px;"/>
				<div class="row">
					<div class="col-xs-12 col-md-10 col-md-offset-1">
						<p class="footer-p">&copy; <?php echo date('Y'); ?> <?php echo $appName;?>  and it's affiliates </p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif;?>
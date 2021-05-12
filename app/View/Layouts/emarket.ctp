<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html ng-app="mw.poly.bwighane.angularjs.app">
	<head>
		<title><?php echo $appName . ' - ' .$this->fetch('title'); ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><?php echo $this->Html->script('fi/ie/html5shiv.js')?><![endif]-->
		<!--bootstrap -->
		<?php echo $this->Html->css('bootstrap.min.css'); ?>
		<?php echo $this->Html->css('bootstrap-theme.min.css'); ?>
		<?php echo $this->Html->css('bootstrap-notifications.min.css'); ?>
	    <!-- font Awesome -->
	    <?php echo $this->Html->css('fi/font-awesome.min.css');?>
		<?php echo $this->Html->css('fi/main.css'); ?>
		<?php echo $this->Html->css('fi/override.css'); ?>
		<?php echo $this->Html->css('fi/templates.css'); ?>
		<style type="text/css">
			@media(max-width: 767px){
				body{
					padding-top: 65px;
				}
			}
		</style>
		<!--[if lte IE 9]><?php echo $this->Html->css('fi/ie9.css'); ?><![endif]-->
		<!--[if lte IE 8]><?php echo $this->Html->css('fi/ie8.css'); ?><![endif]-->
        <?php echo $this->Html->script('angularJS/angular.min.js');?>
	</head>
	<body>
		<?php echo $this->element('nav_admin'); ?>
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
				<?php if(false): ?>
					<header id="header" class="admin-colored">
						<h1 id="brand"><a href="<?php echo $this->Html->url(array('action' => 'home', 'controller' => 'pages')); ?>" style="color: white !importannt;"><?php echo $appName; ?></a></h1>
						<nav class="links">
							<ul id="main-links">
								<li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'home')); ?>">home</a></li><!-- 
								<li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'home')); ?>"> latest</a></li> -->
								<li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>"><i class=""></i> my products</a></li>
								<li><a href="<?php echo $this->Html->url(array('controller' => 'notifications', 'action' => 'index')); ?>"><i class=""></i> notifications (<?php echo $notificationCount;?>)</a></li>
								<li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'trasheditems')); ?>"><i class=""></i> trashed</a></li>
								<!-- <li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'add'));?>"><i class="fa fa-plus"></i> new product</a></li> -->
								<li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit')); ?>"><i class=""></i> settings</a></li>
								<li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout'));?>"><i class=""></i>logout</a></li>
								<?php //if(isset($user['username']) && !empty($user['username'])): echo $user['username']; else: echo 'sign-in / register'; endif; ?>
							</ul>
						</nav>
						<nav class="main visible-xs">
							<ul>
								<!--<li class="">
									<a class="fa-user" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>">Menu</a>
								</li>
								<li class="search">
									<a class="fa-search" href="#search">Search</a>
									<form id="search" method="get" action="#">
										<input type="text" name="query" placeholder="Search" />
									</form>
								</li>-->
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>
					<?php endif;?>
					<?php //echo $this->element('mobile-header-admin'); ?>
					<div class="container" id="mainContentArea">
						<!-- <div class="row">
							<div class="col-xs-12 col-md-12 col-md-12">
								<?php echo $this->Session->flash(); ?>
							</div>
						</div> -->
						<div class="row visible-xs visible-sm" style="padding-left: 10px; margin-bottom: 10px;">
							<div class="col-xs-12 col-md-4 col-md-12" style="padding: 0px 0px; ">
								<p class="p" style="font-ize: 14px; font-weight: bold;"><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'add')); ?>" class="btn-new-item btn-block btn btn-info btn-sm" style ="color: white !important; text-transform: uppercase;"><span class="f fa-plu"></span> new post</a><?php //echo $this->Html->link('signout', array('controller' => 'users', 'action' => 'logout')); ?></span></p>
							</div>
						</div>
						<?php echo $this->fetch('content'); ?>
						<!--<div class="row">
							<div class="col-xs-12">
								<footer class="text-center">
									<p>bwighane mwalwanda &copy <?php echo date('Y'); ?></p>
								</footer>
							</div>
						</div>-->
					</div>

		<!-- angularjs templates loading right now dude -->
        <?php echo $this->element('angular-templates/dialogs');?>
        <?php echo $this->element('angular-templates/miscellaneous-templates');?>
        
		<!-- Scripts -->
		<?php echo $this->Html->script('jquery-1.10.2.min.js'); ?>
		<?php echo $this->Html->script('bootstrap.min.js');?>
		<?php echo $this->Html->script('fi/skel.min.js');?>
		<?php echo $this->Html->script('fi/util.js'); ?>
		<!--[if lte IE 8]><?php echo $this->Html->script('fi/ie/respond.min.js'); ?><![endif]-->
		<?php echo $this->Html->script('fi/main.js'); ?>

		<!--NumeralJS-->
        <?php echo $this->Html->script('numeral.min.js'); ?>
        <!-- MomentJS -->
        <?php echo $this->Html->script('moment.min.js'); ?>
        <!-- LivestampJS -->
        <?php echo $this->Html->script('livestamp.min.js'); ?>
		<!--angularJS-->
        <?php echo $this->Html->script('angularJS/angular-animate.min.js');?>
        <?php echo $this->Html->script('angularJS/angular-resource.min.js');?>
        <?php echo $this->Html->script('angularJS/services.js');?>
        <?php echo $this->Html->script('angularJS/controllers.js');?>
        <?php echo $this->Html->script('angularJS/directives.js');?>
        <?php echo $this->Html->script('angularJS/angular-application.js');?>
        <?php echo $this->Html->script('angularJS/ui-bootstrap-tpls-0.14.3.min.js');?>
        <?php echo $this->Html->script('angularJS/angular-touch.min.js');?>

	</body>
</html>
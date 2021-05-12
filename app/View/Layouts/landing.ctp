<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html ng-app="mw.poly.bwighane.angularjs.app">
	<head>
		<!-- echo $appName . ' - ' . -->
		<title><?php echo $this->fetch('title'); ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="keywords" content="malawi, online, marketplace, ecommerce, online marketplace, buy, sell, products, ecommerce malawi, prducts for sale, sell in malawi, " />
		<!--[if lte IE 8]><?php echo $this->Html->script('fi/ie/html5shiv.js')?><![endif]-->
		<!--bootstrap -->
		<?php echo $this->Html->css('bootstrap.min.css'); ?>
		<?php echo $this->Html->css('bootstrap-theme.min.css'); ?>
	    <!-- font Awesome -->
	    <?php echo $this->Html->css('fi/font-awesome.min.css');?>
		<?php echo $this->Html->css('fi/main.css'); ?>
		<?php echo $this->Html->css('fi/override.css'); ?>
		<?php echo $this->Html->css('fi/templates.css'); ?>
		<?php echo $this->Html->css('fi/landing.css')?>
		<?php echo $this->Html->css('fi/slick.css')?>
		<?php echo $this->Html->css('fi/slick-theme.css')?>
		<!--[if lte IE 9]><?php echo $this->Html->css('fi/ie9.css'); ?><![endif]-->
		<!--[if lte IE 8]><?php echo $this->Html->css('fi/ie8.css'); ?><![endif]-->
		<style type="text/css">
			/*#mainContentArea{
				position: relative;
				height: 100%;
			}
			div.cont{
				position: absolute;
				top: 0;
				bottom: 0;
				left: 0;
				right: 0;
				width: 100%;
				height: 50%;
				margin: auto;
			}*/
			body{
				/*background: #0e1b3b;*/
				background: white;
				background: #f5f5f5;
				/*background: url('img/landing.png');*/
				/*height: 100vh;
				background-size: cover;*/
			}
			div.cont{
				/*margin-top: 2%;*/
				margin-top: 10%;
			}
			/*body{
				background: white;
			}*/
			.rounded-and-shadowed.search{
				box-shadow: none;
			}
			/*.rounded-and-shadowed.search{
				box-shadow: none;
				background: transparent;
			}*/
			.landing-bright{
				color: rgb(206, 198, 198);
				color: #555F6E;
			}
			.navbar-right{
				padding-right: 15px;
			
			}
			.landing-page-main-heading,
			.landing-page-main-p{
				color: #f8f8f4;
				margin-bottom: .5em;
			}
			.landing-page-main-heading{
				font-weight: normal;
				font-size: 2.3em;
				line-height: 1.2em;
				text-transform: none;
			}
			
			.landing-page-main-p{
				font-size: 1.2em;
				font-weight: normal;
				line-height: 1.8em;
			}
			.landing-hero {
				padding: 10px;
			}
			.landing-hero-content{
				background: rgba(0,64, 105, .9); height: 100%; padding: 16px;
			}
		</style>
	</head>
	<body>
		<?php echo $this->element('nav'); ?>
		<?php echo $this->element('search'); ?>
		<?php if(!$loggedIn): ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="landing-hero text-center">
						<div class="landing-hero-content">
							<h1 class="landing-page-main-heading">Trading fair all time long</h1>
							<p class="landing-page-main-p">
								Join the movement of setting up an online community of business oriented <br class="visible-sm visible-md visible-lg" /> individuals and establishments from all over Malawi.
								<!-- Join the community of business minded individuals and establishments <br /> from all over the country -->
							</p>
							<p><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>" class="btn btn-lg btn-default btn-landing rounded-and-shadowed">get started</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif;?>
		<div class="container" style="padding: 10px;">
			<?php echo $this->fetch('content'); ?>
		</div>
		<?php echo $this->element('footer'); ?>
		
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

      	<?php echo $this->Html->script('slick.min.js'); ?>
		<!--angularJS-->
        <?php echo $this->Html->script('angularJS/angular.min.js');?>
        <?php echo $this->Html->script('angularJS/angular-animate.min.js');?>
        <?php echo $this->Html->script('angularJS/angular-resource.min.js');?>
        <?php echo $this->Html->script('angularJS/services.js');?>
        <?php echo $this->Html->script('angularJS/controllers.js');?>
        <?php echo $this->Html->script('angularJS/directives.js');?>
        <?php echo $this->Html->script('angularJS/angular-application.js');?>
        <?php echo $this->Html->script('angularJS/ui-bootstrap-tpls-0.14.3.min.js');?>
        <?php echo $this->Html->script('angularJS/angular-touch.min.js');?>

        <!-- 
        <?php echo $this->Html->script('angularJS/angular-material/angular-aria.min.js');?>
        <?php echo $this->Html->script('angularJS/angular-material/angular-messages.min.js');?>
        <?php echo $this->Html->script('angularJS/angular-material/angular-material.min.js');?>

        
        <?php echo $this->Html->script('angularJS/templates/directives.js'); ?>
        <?php echo $this->Html->script('angularJS/templates/services.js'); ?>
        <?php echo $this->Html->script('angularJS/templates/controllers.js'); ?> -->
        <script type="text/javascript">
        	$('.d-slick').slick({
			  infinite: true,
			  slidesToShow: 4,
			  slidesToScroll: 2,
			  autoplay: true,
			  autoplaySpeed: 5000,
			});
        </script>
	</body>
</html>
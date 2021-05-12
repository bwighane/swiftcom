<!DOCTYPE HTML>
<html ng-app="mw.poly.bwighane.angularjs.app" class="no-js d-js">
	<head>
		<!-- echo $appName . ' - ' . -->
		<title><?php echo $this->fetch('title'); ?> | nthambi</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="keywords" content="malawi, online, marketplace, ecommerce, online marketplace, buy, sell, products, ecommerce malawi, prducts for sale, sell in malawi, malawi online marketplace, business online malawi, online business malawi, electronic commerce malawi, <?php if(isset($productPage) && $productPage): echo $product['Product']['name']; ?> <?php endif;?> for sale" />
		<!--[if lte IE 8]><?php echo $this->Html->script('fi/ie/html5shiv.js')?><![endif]-->
		<!--bootstrap -->
		<?php echo $this->Html->css('bootstrap.css'); ?>
		<?php echo $this->Html->css('bootstrap-theme.min.css'); ?>
	    <!-- font Awesome -->
	    <?php echo $this->Html->css('fi/font-awesome.min.css');?>
		<?php echo $this->Html->css('fi/main.css'); ?>
		<?php echo $this->Html->css('fi/override.css'); ?>
		<?php echo $this->Html->css('fi/templates.css'); ?>
	
        <!-- Modernizr -->
        <?php echo $this->Html->script('modernizr-2.6.2.min.js'); ?>

		<!--[if lte IE 9]><?php echo $this->Html->css('fi/ie9.css'); ?><![endif]-->
		<!--[if lte IE 8]><?php echo $this->Html->css('fi/ie8.css'); ?><![endif]-->
		<?php if(isset($productPage) && $productPage): ?>
		<!-- facebook open graph -->
		<meta property="og:locale" content="en_US"/>
		<meta property="og:type" content="website"/>
		<meta property="og:title" content="<?php echo $product['Product']['name']; ?>">
		<meta property="og:description" content="<?php echo 'Price: K' . CakeNumber::format((float)$product['Product']['price']); ?><?php //echo $this->Text->truncate($product['Product']['description'], 50, array('ellipsis' => '...')); ?>"/>
		<meta property="og:url" content="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id']), true); ?>"/>
		<meta property="og:image" content="<?php echo $this->webroot . 'img/product_images/' . $product['Product']['image']; ?>"/>
		<meta property="article:published_time" content="<?php echo $this->Time->toRss($product['Product']['created']); ?>"/>

		<!-- twitter -->
		<meta name="twitter:image" content="<?php echo $this->webroot . 'img/product_images/' . $product['Product']['image']; ?>"/>
		<meta name="twitter:card" content="summary"/>
		<meta name="twitter:title" content="<?php echo $product['Product']['name']; ?>"/>
		<meta name="twitter:description" content="<?php echo $this->Text->truncate($product['Product']['description'], 50, array('ellipsis' => '...')); ?>"/>
		<meta name="twitter:url" content="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id']), true); ?>"/>

		<!-- google plus -->
		<meta name="image" content="<?php echo $this->webroot . 'img/product_images/' . $product['Product']['image']; ?>"/>
		<meta name="name" content="<?php echo $product['Product']['name']; ?>"/>
		<meta name="description" content="<?php echo $this->Text->truncate($product['Product']['description'], 50, array('ellipsis' => '...')); ?>"/>
		<meta name="url" content="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'productpage', $product['Product']['id']), true); ?>"/>
		
		<?php endif;?>
		<?php if(isset($storePage) && $storePage): ?>
			<style type="text/css">
				body{
					/*background: yellow !important;*/
				}
			</style>
		<?php endif;?>
	</head>
	<body>
		<?php echo $this->element('nav'); ?>
		<?php echo $this->element('search'); ?>
		<!-- Wrapper -->
			<!-- <div id="modal-entry"></div> -->
			<div id="wrapper">
				<div class="container" id="mainContentArea">
					<!-- for mobile phones, spacing on top was kind of a factor here :( -->
					<div class="row visible-xs" style="height: 10px;"></div>
					<?php echo $this->fetch('content'); ?>
					<div id="modal-entry"></div>
				</div>
			</div>
			<?php echo $this->element('footer'); ?>
		<!-- Scripts -->

		
        <!-- angularjs templates loading right now dude -->
        <?php echo $this->element('angular-templates/dialogs');?>
        <?php echo $this->element('angular-templates/miscellaneous-templates');?>

		<?php echo $this->Html->script('jquery-1.10.2.min.js'); ?>
        <!-- masonry -->
        <?php echo $this->Html->script('masonry.min.js');?>
		<?php echo $this->Html->script('bootstrap.min.js');?>
		<?php echo $this->Html->script('fi/skel.min.js');?>
		<?php echo $this->Html->script('fi/util.js'); ?>
		<!--[if lte IE 8]><?php echo $this->Html->script('fi/ie/respond.min.js'); ?><![endif]-->
		<?php echo $this->Html->script('fi/main.js'); ?>

		<!--NumeralJS-->
        <?php echo $this->Html->script('numeral.min.js'); ?>
        <!-- masonry -->
        <?php echo $this->Html->script('masonry.min.js');?>
        <!-- MomentJS -->
        <?php echo $this->Html->script('moment.min.js'); ?>
        <!-- LivestampJS -->
        <?php echo $this->Html->script('livestamp.min.js'); ?>
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

        
        <!-- <?php echo $this->Html->script('angularJS/angular-material/angular-aria.min.js');?>
        <?php echo $this->Html->script('angularJS/angular-material/angular-messages.min.js');?>
        <?php echo $this->Html->script('angularJS/angular-material/angular-material.min.js');?>

        
        <?php echo $this->Html->script('angularJS/templates/directives.js'); ?>
        <?php echo $this->Html->script('angularJS/templates/services.js'); ?>
        <?php echo $this->Html->script('angularJS/templates/controllers.js'); ?> -->
        <script type="text/javascript">
		    $('.grid').masonry({
		      itemSelector: '.grid-item', // use a separate class for itemSelector, other than .col-
		      columnWidth: '.grid-sizer',
		      percentPosition: true
		    });
		</script>


	</body>
</html>
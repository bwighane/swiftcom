<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html ng-app="TemplatesApplication">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><?php echo $this->Html->script('fi/ie/html5shiv.js')?><![endif]-->
		<!--bootstrap -->
		<?php echo $this->Html->css('bootstrap.css'); ?>
		<?php echo $this->Html->css('bootstrap-theme.min.css'); ?>
		<?php echo $this->Html->css('fi/override.css'); ?>

		<?php echo $this->Html->css('fi/templates.css'); ?>
		<!--[if lte IE 9]><?php echo $this->Html->css('fi/ie9.css'); ?><![endif]-->
		<!--[if lte IE 8]><?php echo $this->Html->css('fi/ie8.css'); ?><![endif]-->
		<style type="text/css">
			body{
				padding-top: 0;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<?php echo $this->fetch('content'); ?>
		</div>
		<!--
		<?php echo $this->Html->script('jquery-1.10.2.min.js'); ?>
        <?php echo $this->Html->script('angularJS/angular.min.js');?>
        <?php echo $this->Html->script('angularJS/angular-animate.min.js');?>
        <?php echo $this->Html->script('angularJS/angular-resource.min.js');?>

        
        <?php echo $this->Html->script('angularJS/angular-material/angular-aria.min.js');?>
        <?php echo $this->Html->script('angularJS/angular-material/angular-messages.min.js');?>
        <?php echo $this->Html->script('angularJS/angular-material/angular-material.min.js');?>

        
        <?php echo $this->Html->script('angularJS/templates/directives.js'); ?>
        <?php echo $this->Html->script('angularJS/templates/services.js'); ?>
        <?php echo $this->Html->script('angularJS/templates/controllers.js'); ?>
        <?php echo $this->Html->script('angularJS/templates/TemplatesApplication.js'); ?>
    	-->
	</body>
</html>
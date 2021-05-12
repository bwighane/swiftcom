<header id="header-mobile">
	<h1 id="logo" style="margin-bottom: 10px;"><a href="<?php echo $this->Html->url('/'); ?>" style="color: white !important;"><?php echo $appName;?></a> <?php echo $this->Html->link('sell on nthambi', array('controller' => 'products', 'action' => 'add'), array('style' => 'font-weight: normal; float: right;  font-size: .9em; border-radius: 2px; font-weight: bold; text-transform: capitalize; background: #EE7500; background: #fe6700; padding: 5px; padding-top: 3px; padding-bottom: 3px; padding-right: 5px; color: white !important;', 'class' => '')); ?> </h1>

	<nav id="mobile-nav-links" style="clear: both;">	
		<ul>
			 <!-- <li><?php echo $this->Html->link('home', array('controller' => 'products', 'action' => 'home')); ?> </li> -->
			<li><?php echo $this->Html->link('latest', array('controller' => 'products', 'action' => 'home')); ?></li>
			<li><?php echo $this->Html->link('categories', array('controller' => 'pages', 'action' => 'categorylist')); ?></li>
			<!-- <li style="background: #EE7500; padding: 5px; padding-top: 3px; padding-bottom: 3px; padding-right: 3px;"><?php echo $this->Html->link('sell product', array('controller' => 'products', 'action' => 'add'), array('style' => ' font-weight: bold;')); ?> </li> -->
			<li><?php echo $this->Html->link('advanced search', array('controller'=>'products', 'action' => 'advancedsearch')); ?></li>
			<li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index'));?>"><?php if($loggedIn): ?> my&nbsp;account <?php else: ?> login / register <?php endif;?></a></li>
			<li><?php echo $this->Html->link('about', array('controller'=>'pages', 'action' => 'about')); ?></li>
			<li><?php echo $this->Html->link('Download App', array('controller'=>'pages', 'action' => 'download')); ?></li> 
			<?php if(isset($more)): ?>
				<li> <a href="#more">more&nbsp;options...<?php //echo $more; ?></a></li>
			<?php endif;?>
		</ul>
	</nav>	
</header>

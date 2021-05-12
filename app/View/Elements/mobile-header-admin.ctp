<header id="header-mobile" class="admin-colored">
	<h1 id="logo"><a href="<?php echo $this->Html->url('/'); ?>" style="color: white !important;"><?php echo $appName;?> <small style="font-size: 16px; text-transform: lowercase; color: white !important;"></small></a></h1>
	<nav id="mobile-nav-links">	
		<ul>
			<li><?php echo $this->Html->link('home', array('controller' => 'products', 'action' => 'home')); ?> </li><!-- 
			<li><?php echo $this->Html->link('latest', array('controller' => 'products', 'action' => 'home')); ?> </li> -->
			<li><?php echo $this->Html->link('my products', array('controller' => 'products', 'action' => 'index')); ?> </li>
			<li><a href="<?php echo $this->Html->url(array('controller' => 'notifications', 'action' => 'index')); ?>"><i class=""></i> notifications (<?php echo $notificationCount;?>)</a></li>
			<li><?php echo $this->Html->link('trashed', array('controller' => 'products', 'action' => 'trasheditems')); ?> </li>
			<li><?php echo $this->Html->link('settings', array('controller'=>'users', 'action' => 'edit')); ?> </li>
			<li><?php echo $this->Html->link('logout', array('controller'=>'users', 'action' => 'logout')); ?></li>
		</ul>
	</nav>	
</header>
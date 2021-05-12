<header id="header">
	<h1 id="brand"><a href="<?php echo $this->Html->url('/'); ?>"><?php echo $appName;?></a></h1>
	<nav class="links" >
		<ul id="main-links">
			<!-- <li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'home')); ?>">Home</a></li> -->
			<li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'home')); ?>">latest</a></li>
			<li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'categorylist')); ?>">categories</a></li>
			<!-- <li><a href="<?php echo $this->Html->url('/'); ?>"><i class=""></i> Products</a></li> -->
			<!-- <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'add'));?>"><i class="fa fa-plus"></i> sign up</a></li> -->
			<li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'advancedsearch'));?>">advanced search</a></li>
			<li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index'));?>">
				<?php if($loggedIn): echo 'my account'; else: echo 'login / register'; endif;?></a></li>
			<li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'about')); ?>"><i class=""></i> About</a></li>
			<!-- #FBBC05 #EE7500-->
			<li style="background: #EE7500; background: #fe6700; padding: 5px; padding-top: 3px; padding-bottom: 6px; padding-right: 7px; font-weight: bold;"><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'add')); ?>" style="color: blac !important; font-weight bold;"> sell on nthambi</a></li>
			<li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'download')); ?>"><i class=""></i> Download App</a></li>
			<!-- sign in / sign up -->
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
<?php echo $this->element('mobile-header'); ?>
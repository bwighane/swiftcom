<!DOCTYPE html>
<html ng-app="mw.poly.bwighane.angularjs.app">
<head>
    <meta charset="UTF-8">
    <title><?php echo $this->fetch('title'); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="author" content="Bwighane Clive Mwalwanda"/>
    <meta name="keywords" content="Malawi's very own e-market">
    <!-- bootstrap 3.0.2 -->
    <?php echo $this->Html->css('bootstrap.min.css');?>
    <!-- font Awesome -->
    <?php echo $this->Html->css('font-awesome.min.css');?>
    <!-- Ionicons -->
    <?php echo $this->Html->css('ionicons.min.css');?>
    <!-- Morris chart -->
    <?php echo $this->Html->css('morris/morris.css');?>
    <!-- jvectormap -->
    <?php echo $this->Html->css('jvectormap/jquery-jvectormap-1.2.2.css');?>
    <!-- Date Picker -->
    <?php echo $this->Html->css('datepicker/datepicker3.css');?>
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <?php echo $this->Html->css('daterangepicker/daterangepicker-bs3.css');?>
    <!-- iCheck for checkboxes and radio inputs -->
    <?php echo $this->Html->css('iCheck/all.css');?>
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <?php echo $this->Html->css('http://fonts.googleapis.com/css?family=Lato');?>
    <!-- Theme style -->
    <?php echo $this->Html->css('style.css');?>
    <!--typography.css-->
    <?php echo $this->Html->css('typography.css');?>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

      <style type="text/css">

      </style>
      </head>
      <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo $this->Html->url('/'); ?>" class="logo">
                eMarket
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php if(!empty($user['username'])): echo $user['username']; else: echo 'jane doe'; endif;?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

                                <!-- <li class="divider"></li> -->

                                    <li>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit')); ?>">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                            edit Profile
                                        </a>
                                    </li>

                                    <li class="divider"></li>

                                    <li>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>">
                                        <i class="fa fa-cog pull-right"></i>
                                            Manage Products
                                        </a>
                                    </li>

                                    <li class="divider"></li>

                                    <li>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                    </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- Sidebar user panel -->
                            <div class="user-panel">
                                <div class="pull-left image">
                                    <?php if(!empty($user['avatar'])): ?>

                                    <?php echo $this->Html->image('avatars/' . $user['avatar'], array('class' => 'img-circle', 'alt' => 'User Image'))?>
                                    <?php else: ?>
                                        <?php echo $this->Html->image('avatar5.png', array('alt' => 'User image', 'class' => 'img-cirlce')); ?>
                                    <?php endif;?>
                                    <!--<img src="img/26115.jpg" class="img-circle" alt="User Image" />-->
                                </div>
                                <div class="pull-left info">
                                    <p><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit'))?>"><?php if(!empty($user['username'])): echo $user['username']; else: echo 'Dr Nobody'; endif;?></a></p>

                                    <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
                                </div>
                            </div>
                            <!-- search form -->
                            <form action="#" method="get" class="sidebar-form">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                                    <span class="input-group-btn">
                                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                            <!-- /.search form -->
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <ul class="sidebar-menu">
                                <li class="active">
                                    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>">
                                        <i class="fa fa-home"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit')); ?>">
                                        <i class="fa fa-cog"></i> <span>Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>">
                                        <i class="fa fa-arrow-circle-o-down"></i> <span>Manage Products</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url('/'); ?>">
                                        <i class="fa fa-external-link"></i> <span>Public Area</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout'));?>">
                                        <i class="fa fa-power-off"></i> <span>Logout</span>
                                    </a>
                                </li>

                            </ul>
                        </section>
                        <!-- /.sidebar -->
                    </aside>

                    <aside class="right-side">

                <!-- Main content -->
                <section class="content">
                    <!--<div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span class="alert-content"><?php echo $this->Session->flash(); ?></span>
                    </div>
                -->

                    <?php echo $this->Session->flash('flash'); ?>
                    <?php echo $this->fetch('content'); ?>
                </section><!-- /.content -->
                <div class="footer-main">
                    Copyright &copy Director, 2014
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php echo $this->Html->script('jquery.min.js');?>
        <!-- bwighane.js -->
        <?php echo $this->Html->script('bwighane.js'); ?>
        <!-- jQuery UI 1.10.3 -->
          <?php echo $this->Html->script('jquery-ui-1.10.3.min.js');?>
        <!-- Bootstrap -->
          <?php echo $this->Html->script('bootstrap.min.js');?>
        <!-- daterangepicker -->
          <?php echo $this->Html->script('plugins/daterangepicker/daterangepicker.js');?>
          <?php echo $this->Html->script('plugins/chart.js');?>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
          <?php echo $this->Html->script('plugins/iCheck/icheck.min.js');?>
        <!-- calendar -->
          <?php echo $this->Html->script('plugins/fullcalendar/fullcalendar.js');?>

        <!-- Director App -->
          <?php echo $this->Html->script('Director/app.js');?>

        <!-- Director dashboard demo (This is only for demo purposes) -->
          <?php echo $this->Html->script('Director/dashboard.js');?>

        <!--NumeralJS-->
        <?php echo $this->Html->script('numeral.min.js'); ?>
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
</body>
</html>
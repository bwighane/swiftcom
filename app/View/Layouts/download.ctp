<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Download | Nthambi</title>

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <?php echo $this->Html->css('bootstrap.css'); ?>
	<?php //echo $this->Html->css('bootstrap-theme.min.css'); ?>
    <!-- Plugin CSS -->
    <?php echo $this->Html->css('fi/font-awesome.min.css'); ?>
    <?php echo $this->Html->css('simple-line-icons.css'); ?>
    <?php echo $this->Html->css('device-mockups.min.css'); ?>

    <!-- Theme CSS -->
    <?php echo $this->Html->css('new-age.min.css'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        
        /*section.features .feature-item i{
            background: linear-gradient(to left,#0072bb,#05f337);
        }*/

    </style>

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" style="text-transform: capitalize;" href="<?php echo $this->Html->url('/'); ?>"><?php echo $appName; ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="<?php echo $this->Html->url('/'); ?>">Home</a>
                    </li>
                    <!-- <li>
                        <a class="page-scroll" href="#features">Features</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="container">
            <div class="row" id="download">
                <div class="col-sm-7">
                    <div class="header-content">
                        <div class="header-content-inner">
                            <h1>Shopping right at your finger tips.</h1>
                            <p class="text-mute">Requires Android 4.1 (JellyBean) and up</p>
                            <p class="text-mute">Version 1.0, Kalulu</p>
                            <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'download', '?' => array('appd' => 1))); ?>" class="btn btn-outline btn-xl page-scroll">Download now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <?php echo $this->Html->image('app.png', array('class' => 'img-responsive')); ?>
                                    <img src="img/demo-screen-1.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="button">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="features" class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h2>Application features</h2>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-md-4">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">          <img src="img/demo-screen-1.jpg" class="img-responsive" alt=""> </div>
                                <div class="button">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="fa  fa-bell-o text-primary"></i>
                                    <h3>Notifications</h3>
                                    <p class="text-muted">Recieve notification alerts of new items for sale</p>
                                    <p class="text-muted">Choose what item types you want to be notified about</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="fa fa-search text-primary"></i>
                                    <h3>Search</h3>
                                    <p class="text-muted">Search for specific items</p>
                                    <p class="text-muted">Use the advanced search feature to refine your search <b>e.g based on your budget</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="fa  fa-list text-primary"></i>
                                    <h3>organised categories</h3>
                                    <p class="text-muted">Browse items for sale in various categories</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="fa  fa-user text-primary"></i>
                                    <h3>Networking</h3>
                                    <p class="text-muted">Commincate to item owners via different channels like Whatsapp, E-mail, Phone Call, Facebook Twiter and more...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="cta">
        <div class="cta-content">
            <div class="container">
                <h2>Stop waiting.<br>Start building.</h2>
                <a href="#contact" class="btn btn-outline btn-xl page-scroll">Let's Get Started!</a>
            </div>
        </div>
        <div class="overlay"></div>
    </section>

    <section id="contact" class="contact bg-primary">
        <div class="container">
            <h2>We <i class="fa fa-heart"></i> new friends!</h2>
            <ul class="list-inline list-social">
                <li class="social-facebook">
                    <a href="http://www.facebook.com/nthambishopping"><i class="fa fa-facebook"></i></a>
                </li>
            </ul>
        </div>
    </section> -->

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Nthambi Group. All Rights Reserved.</p>
            <ul class="list-inline">
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'termsofuse'))?>">Terms of service</a>
                </li>
            </ul>
        </div>
    </footer>

    <!-- jQuery -->
   	<?php echo $this->Html->script('jquery-1.10.2.min.js'); ?>
	
	<?php echo $this->Html->script('bootstrap.min.js');?>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <?php echo $this->Html->script('new-age.min.js');?>

</body>

</html>

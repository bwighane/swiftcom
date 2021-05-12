<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->fetch('title'); ?></title>
        <meta name="description" content="">
        <meta name="author" content="bwighane mwalwanda"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <?php echo $this->Html->css('normalize.css'); ?>
        <?php echo $this->Html->css('main.css'); ?>
        <?php echo $this->Html->css('bootstrap.min.css'); ?>
        <?php echo $this->Html->css('bootstrap-theme.min.css'); ?>
        <?php echo $this->Html->script('modernizr-2.6.2.min.js'); ?>
        <?php echo $this->Html->script('jquery-1.10.2.min.js'); ?>
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="container">
            <div class="col-xs-12">
                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?> 
            </div>
        </div>
        <footer class="footer container">
            
        </footer>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!--
            <script>
                (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
                function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
                e=o.createElement(i);r=o.getElementsByTagName(i)[0];
                e.src='//www.google-analytics.com/analytics.js';
                r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
                ga('create','UA-XXXXX-X');ga('send','pageview');
            </script>
        -->
    </body>
</html>

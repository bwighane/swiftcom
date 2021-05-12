<nav class="navbar navbar-default navbar-fixed-top" id="main-navbar-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="padding-bottom: 0;">
                <span class="sr-only">Toggle navigation</span>
                <?php echo $this->Html->image('humburger-white.png', array('style' => '', 'alt' => 'menu')); ?>
                <!-- <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> -->
            </button>
            <a class="navbar-brand" href="<?php echo $this->Html->url('/'); ?>" style="text-transform: capitalize;">
                <?php echo $appName;?> <!-- <small class="fa fa-plus" style=""></small> -->
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'home')); ?>">latest</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'categorylist')); ?>">all categories</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'advancedsearch'));?>">advanced search</a></li>
                <!-- <li><a class=""href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'download')); ?>"><i class=""></i> download</a></li> -->
                <!-- <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'about')); ?>"><i class=""></i> about</a></li> -->
                <li  id="sell-link" ><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'add')); ?>"style="background: #FF3300; color: white !important; padding-left: 15px;"><i class=""></i> <span class="fa a-plus"></span>&nbsp;sell on nthambi&nbsp;</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if($loggedIn): ?>
                    <li class="dropdown">
                        <a id="acc-login" style="margin-left: 0;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php if($notificationCount > 0): ?>
                                <span class="badge badge-info hidden-xs"><?php echo $notificationCount; ?></span>&nbsp;
                            <?php endif;?> 
                            <?php echo $this->Text->truncate($user['display_name'], 13, array('ellipsis' => '.')); ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>">my nthambi</a></li>
                            <li>
                                <a href="<?php echo $this->Html->url(array('controller' => 'notifications', 'action' => 'index')); ?>">
                                notifications&nbsp;
                                <?php if($notificationCount > 0): ?>
                                    <span class="badge"><?php echo $notificationCount; ?></span>
                                <?php endif;?>
                                </a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'conversations', 'action' => 'index')); ?>"> messages</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit')); ?>">account settings</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>">logout</a></li>
                        </ul>
                    </li>
                <?php else:?>
                    <li>
                        <a id="acc-login" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index'));?>" style="margin-left: 0;">
                            log in / register
                        </a>
                    </li>
                <?php endif;?>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
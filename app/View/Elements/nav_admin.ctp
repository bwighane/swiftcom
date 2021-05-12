<nav class="navbar navbar-default navbar-fixed-top" style="border-bottom: 1px solid rgba(34, 34, 34, 0.1);">
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
                <?php echo $appName;?> <small class="fa fa-heart small" style="color: maroon;"></small>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'home')); ?>">public site</a></li><!-- 
                <li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'home')); ?>"> latest</a></li> -->
                <li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>"><i class=""></i> my nthambi</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'trasheditems')); ?>"><i class=""></i> trashed</a></li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'notifications', 'action' => 'index')); ?>"><i class=""></i> notifications 
                        <?php if($notificationCount > 0):?>
                            <span class="badge badge-info">
                                <?php echo $notificationCount;?>
                            <span/>
                        <?php endif;?>
                    </a>
                </li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'conversations', 'action' => 'index')); ?>"><i class=""></i> messages</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 0;">
                <li class="dropdown">
                    <a id="acc-login" style="margin-left: 0;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->Text->truncate($user['display_name'], 13, array('ellipsis' => '.')); ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit')); ?>">account settings</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>">logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
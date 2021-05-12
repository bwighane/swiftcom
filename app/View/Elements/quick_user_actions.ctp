<?php if($loggedIn): ?>
    <div class="side-options-panel rounded-and-shadowed">
        <h3 class="card-heading">quick user actions</h3>
        <!-- <hr class="no-padding-margin"/> -->
        <div class="list-group admin-list">
            <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'add'));?>" class="list-group-item"><span class="fa fa-plus"></span> new product</a>
            <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index'));?>" class="list-group-item"><span class="fa fa-th-list"></span> my products</a>
            <a href="<?php echo $this->Html->url(array('controller' => 'notifications', 'action' => 'index'));?>" class="list-group-item"><span class="fa fa-bell"></span> notifications
                <?php if($notificationCount > 0): ?>
                    <span class="badge badge-info">
                        <?php echo $notificationCount; ?>
                    </span>
                <?php endif;?>
            </a>
            <a class="list-group-item" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>"><i class="fa fa-user"></i> logout</a>
        </div>
    </div>
<?php endif;?>
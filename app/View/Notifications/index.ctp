<div class="row">
	<div class="col-xs-12 col-sm-8 col-sm-push-2 col-md-6 col-md-push-3">
		<div class="page-header">
			<h1 class="notification-heading">notifications</h1>
		</div>
		<div class="row">
			<?php if(empty($notifications)): ?>
				<div class="col-xs-12 conversation-row rounded-and-shadowed text-center" style="">
					<h2 class="no-notifications-heading">You do not have any notifications</h2>
				</div>
			<?php endif;?>
			<?php foreach($notifications as $notification): ?>
				<div class="col-xs-12 rounded-and-shadowed notification-row">
					<div class="media">
						<div class="media-left">
			                <div class="media-object">
			                	<?php echo $this->Html->image('notification.png', array('class' => 'img-circle', 'alt' => 'notifcation'))?>
			                   
			                </div>
			            </div>
						<div class="media-body">
			                <strong class="notification-title"><a class="" href="<?php echo $notification['Notification']['redirect_url']; ?>"><?php echo $notification['Notification']['title']; ?></a></strong>
			                <p class="notification-desc">
		                		<?php if($notification['Notification']['description']): ?>
									<?php echo $this->Text->truncate($notification['Notification']['description'], 100, array('ellipsis' => '...')) ?>
								<?php endif;?>
			                </p>

			                <div class="notification-meta">
			                    <small class="timestamp p"><span title="<?php echo $this->Time->nice($notification['Notification']['created']); ?>" data-livestamp="<?php echo $this->Time->toUnix($notification['Notification']['created']); ?>"></span></small>
			                </div>
			                <p><?php //echo $this->Form->postLink('delete notification', array('controller' => 'notifications', 'action' => 'delete', $notification['Notification']['id']), array('class' => 'btn btn-default btn-xs')); ?></p>
			            </div>
		            </div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</div>

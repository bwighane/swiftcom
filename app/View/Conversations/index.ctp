<div class="row">
	<div class="col-xs-12 col-sm-8 col-sm-push-2 col-md-6 col-md-push-3">
		<div class="page-header">
			<h1 class="conversation-heading ">conversations</h1>
		</div>
		<div class="row">
			<?php if(empty($conversations)): ?>
				<div class="col-xs-12 conversation-row rounded-and-shadowed text-center" style="">
					<h2 class="no-conversations-heading">You do not have any conversations</h2>
					<p>Begin one by navigating to a product/shop page and send a message to the owner.</p>
				</div>
			<?php endif;?>
			<?php foreach($conversations as $conversation): ?>
				<div class="col-xs-12 conversation-row rounded-and-shadowed">
					<div class="row">
						<div class="col-xs-2">
							<?php if($conversation['UserOne']['id'] == $user['id']): ?>
								<?php echo $this->Html->image('avatars/'. $conversation['UserTwo']['avatar'], array('class' => 'img-circle img-responsive')); ?>
							<?php else: ?>
								<?php echo $this->Html->image('avatars/'. $conversation['UserOne']['avatar'], array('class' => 'img-circle img-responsive')); ?>
							<?php endif;?>
						</div>
						<div class="col-xs-10">
							<strong class="conversation-title">
								<?php if($conversation['UserOne']['id'] == $user['id']): ?>
									<?php echo $this->Html->link($conversation['UserTwo']['display_name'], array('controller' => 'messages', 'action' => 'conversation', $conversation['Conversation']['id'], $conversation['UserTwo']['id'])); ?>
								<?php else: ?>
									<?php echo $this->Html->link($conversation['UserOne']['display_name'], array('controller' => 'messages', 'action' => 'conversation', $conversation['Conversation']['id'],  $conversation['UserOne']['id'])); ?>
								<?php endif;?>
							</strong>
							<p class="conversation-description">
								<?php echo $conversation['LastMessage']['Message']['message']; ?>
							</p>
							<p>
			                    <span title="<?php echo $this->Time->nice($conversation['LastMessage']['Message']['created']); ?>" data-livestamp="<?php echo $this->Time->toUnix($conversation['LastMessage']['Message']['created']); ?>"></span>
			                </p>
						</div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</div>

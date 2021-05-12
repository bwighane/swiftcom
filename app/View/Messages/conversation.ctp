<div class="row">
	<div class="conversation-col col-xs-12 col-md-6 col-md-push-3">
		<div class="row" style="padding: 10px;">
			<div class="col-xs-2 col-xs-push-5">
				<?php echo $this->Html->image('avatars/' . $otherUser['User']['avatar'], array('class' => 'img-responsive img-circle')); ?>
			</div>
			<div class="col-xs-12 text-center" style="margin-top: 10px;">
				<h4>conversation with <?php echo $otherUser['User']['display_name'];?></h4>
			</div>
		</div>
		<div class="panel rounded-and-shadowed">
			<div class="panel-body" style="padding: 0;">
				<ul class="messages">
					<?php foreach($messages as $message): ?>
						<li class="message">
							<?php if($message['User']['id'] == $user['id']): ?>
								<?php echo $this->Html->link('me', array('controller' => 'users', 'action' => 'tostore', $message['User']['id'])); ?>
							<?php else: ?>
								<?php echo $this->Html->link($message['User']['display_name'], array('controller' => 'users', 'action' => 'tostore', $message['User']['id'])); ?>
							<?php endif;?>
							<p><?php echo $message['Message']['message']; ?></p>
							<p>
			                    <span title="<?php echo $this->Time->nice($message['Message']['created']); ?>" data-livestamp="<?php echo $this->Time->toUnix($message['Message']['created']); ?>"></span>
			                </p>
						</li>
						<!-- <hr class="no-padding-margin conversation-hr"> -->
					<?php endforeach;?>
				</ul>
				<div class="row">
					<div class="col-xs-12">
						<?php echo $this->Form->create('Message', array('url' => array('controller' => 'messages', 'action' => 'reply'))); ?>
						<?php
							echo $this->Form->input('Message.message', array('rows' => '3', 'class' => 'form-control', 'label' => false, 'placeholder' => 'enter your reply here...', 'autofocus' => true, 'div' => 'form-group', 'style' => 'border-left: none; border-right: none; border-bottom: none; border-radius: 0; font-size: 1em; padding: 15px;'));
							echo $this->Form->hidden('Message.conversation_id', array('value' => $conversation_id)); 
							echo $this->Form->hidden('Message.user_id', array('value' => $user['id'])); 
						?>
						
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-xs-12">
						<?php echo $this->Form->end(array('label' => 'send reply', 'class' => 'btn btn-primary bt-sm btn-block')); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php //echo $this->element('admin_sidenav'); ?>
</div>

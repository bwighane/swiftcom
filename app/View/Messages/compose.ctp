<div class="row">
	<div class="col-xs-12 col-md-6 col-md-push-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">compose message to <?php echo $recipient['User']['display_name']; ?></h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12">
						<?php echo $this->Form->create('Message', array('url' => array('controller' => 'messages', 'action' => 'add')));?>
						<?php
							echo $this->Form->input('Message.message', array('rows' => 5, 'class' => 'form-control'));
							echo $this->Form->hidden('Message.user_id', array('value' => $user['id']));
							echo $this->Form->hidden('Message.recipient', array('value' => $recipient['User']['id']));
						?>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-xs-12">
						<?php echo $this->Form->end(array('label' => 'send message', 'class' => 'btn btn-primary btn-block')); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
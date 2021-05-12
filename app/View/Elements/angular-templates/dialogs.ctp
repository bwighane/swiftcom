<script type="text/ng-template" id="composemessage.html">
	<div class="row template-row" ng-controller="MessagesController">
		<div class="col-xs-12 rounded-and-shadowed compose-message-dialog">
			<div class="panel panel-default template-panel">
				<div class="panel-heading">
					<h1 style="text-transform: none; margin-bottom: 0; font-weight: normal; font-size: 1em;">{{composeDialogTitle}}<a href="#" ng-click="closeModal()" style="float: right; font-weight: bold; padding: 2px;">&times;</a></h1>
				</div>
				<div class="panel-body" style="padding: 0;">
					<div class="row">
						<div class="col-xs-12">
							<form novalidate name="messageForm">
								<div class="form-group" style="margin-bottom: 0;">
									<textarea style="padding: 15px; font-size: 1.1em; border: none;" required autofocus placeholder="what's the message?" name="message" ng-model="message" class="form-control" rows="5"></textarea>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-primary btn-sm" ng-disabled="messageForm.$invalid || disableSend" ng-click="sendMessage()">send message</button>&nbsp;<span class="message-status" ng-class="{'message-status-error': messageStatusCode == -1, 'message-status-success': messageStatusCode == 1}">{{messageStatus}}</span>
				</div>
			</div>
		</div>
	</div>
</script>
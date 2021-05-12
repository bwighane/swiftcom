<script type="text/ng-template" id="message-seller-template.html">
	<div class="row message-seller-row" style="margin-top: 10px;" ng-controller="MessagesController" ng-init="messageFrom = 'from@gmail.com'; messageTo = 'to@gmail.com'">
		<div class="col-xs-12 col-sm-3 col-md-12" style="padding-bottom: 5px;">
			<button ng-click="showMessageComposeDialog()" class="btn btn-primary btn-block">instant message</button>
		</div>
	</div>
</script>
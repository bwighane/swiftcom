<div class="row" style="width: 100%;">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h1>extra images <small style="float: right;" class="close-btn"><button type="button" class="close"  ng-click="closeModal()" data-dismiss="modal">&times;</button><!-- <a href="#" ng-click="closeModal()"></i> close</a> --></small></h1>
		<p ng-show="!extraimages.length">
			no images
		</p>
		<!-- carousel -->
		<uib-carousel>
			<uib-slide ng-repeat="extraimage in extraimages">
				<div class="thumbnail">
					<img ng-src="{{extraimage.src}}">
				</div>
			</uib-slide>
		</uib-carousel>
		<!-- end carousel -->
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px; " ng-show="extraimages.length > 1">
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 text-right">
				<button class="btn btn-default btn-xs btn-block" ng-click="prev()">previous</button>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 text-left">
				<button class="btn btn-default btn-xs btn-block" ng-click="next()">next</button>
			</div>
		</div>
	</div>
</div>
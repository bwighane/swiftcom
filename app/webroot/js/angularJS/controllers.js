'use strict'

var Controllers = angular.module('mw.poly.bwighane.angularjs.controllers', ['ngTouch']);

Controllers.controller('ProductsController', function($scope, ProductCategoryService, $document, $log, $window){
	
});

Controllers.controller('ReviewsController', [function(){

}]);

Controllers.controller('ImagesController', ['ImagesService', '$uibModal', '$log', '$scope', 'BaseUrl', '$document', function(ImagesService, $uibModal, $log, $scope, BaseUrl, $document){
	
	var modalOptions = {
		templateUrl: BaseUrl + '/templates/carousel',
		scope: $scope,
		size: 'lg',
		// backdrop: false

	}
	$scope.extraimages = [];
	var modal;
	$scope.openImagesModal = function(product_id){
		ImagesService.downloadExtraImages(product_id)
		.then(function(data){
			var extraimages = [];
			angular.forEach(data, function(item){
				var extraimage = {};
				extraimage.src = BaseUrl + 'img/product_images/extra/' + item.Extraimage.image_name;
				extraimages.push(extraimage);
			});
			
			$scope.extraimages = extraimages;
			modal = $uibModal.open(modalOptions);
		}, function(error){
			$log.log(error);
		})
		.finally(function(){
			$log.log('fin');
		})
	}

	$scope.closeModal = function(){
		$scope.extraimages = [];
		modal.close();
	}
}]);


Controllers.controller('MessagesController',['$scope', '$log','BaseUrl', '$uibModal', 'MessagesService', '$timeout', '$location', '$window' , function($scope, $log, BaseUrl, $uibModal, MessagesService, $timeout, $location, $window){
	$scope.message = '';
	$scope.messageStatus = '';
	$scope.disableSend = false;
	var modal = {};

	$scope.showMessageComposeDialog = function(){
		modal = $uibModal.open({
			templateUrl: 'composemessage.html',
			size: 'md',
			scope: $scope
		});
		return false;
	}

	$scope.messageReply = function(from, to, parent, title){
		$scope.messageFrom = from;
		$scope.messageTo = to;
		$scope.messageParent = Number(parent);
		$scope.messageTitle = title;
		$scope.composeDialogTitle = $scope.messageTitle;
		$scope.showMessageComposeDialog();
		$log.log($scope.messageParent, 'parent');
	}
	$scope.sendMessage = function(){
		$scope.disableSend = true;
		$scope.messageStatus = 'sending message';
		$scope.messageStatusCode = 0;

		//Message object parameters
		var message = {
			user_id: $scope.messageFrom,
			recipient_id: $scope.messageTo,
			message: $scope.message,
			parent: $scope.messageParent,
			title: $scope.messageTitle
		};

		MessagesService.sendMessage(message).then(function(data){
			$scope.messageStatusCode = 1;
			$scope.messageStatus = 'message sent!';
			$scope.message = '';
			$timeout(function(){
				$log.log('timeout');
				$window.location.href = $location.absUrl();
			}, 1000);
			// $scope.closeModal();
		}, function(error){
			$scope.messageStatus = 'failed, try again!';
			$scope.messageStatusCode = -1;
			$scope.disableSend = false;
		});
	}
	$scope.closeModal = function(){
		$window.location.href = $location.absUrl();
	}
}]);
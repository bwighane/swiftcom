'use strict'
var Services = angular.module('mw.poly.bwighane.angularjs.services', []);

//service constant for the base url
//169.254.129.160  127.0.0.1
Services.constant('BaseUrl', 'http://localhost:8080/swiftcom');

//create a new service to populate a subcategory given a category

Services.service('ProductCategoryService', function($http, $q, BaseUrl, $log){

	var _this = this;

	_this.getSubCategoriesList = function(catid){
		var defer = $q.defer();
		
		$http.get(BaseUrl + '/subcategories/getsubcategories.json?catid=' + catid)
		.success(function(data){
	        defer.resolve(data);
		})
		.error(function(error){
		    $log.error(error);
		    defer.reject(error);
	    });
		return defer.promise;
	}
});

Services.service('ImagesService', ['$uibModal', 'BaseUrl', '$q', '$http', '$log', function($uibModal, BaseUrl, $q, $http, $log){

	var _this = this;

	this.downloadExtraImages = function(productId){
		var defer = $q.defer();

		$http.get(BaseUrl + '/extraimages/getImagesList.json?productId=' + productId)
		
		.success(function(data){
	        defer.resolve(data);
		})
		.error(function(error){
		    defer.reject(error);
	    });
		return defer.promise;
	}

}]);

Services.service('MessagesService',['$http', 'BaseUrl', function($http, BaseUrl){
	this.sendMessage = function(message){
		return $http.post(BaseUrl + '/messages/add', {
			Message: message
		});
	}
}]);

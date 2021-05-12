'use strict'

var Directives = angular.module('mw.poly.bwighane.angularjs.directives', []);



/*
	takes the action of populating the sub-categories list given the value of the the selected category

	@Author Bwighane Mwalwanda
	@date some-where in february 2016

*/
Directives.directive('categorySelected', function($rootScope, ProductCategoryService, $log, $document){
	
	var directive = {};

	var loadSubcategories = function(data){
		var subcatlist = jQuery('select#subcatlist');
		jQuery('option', subcatlist).remove();

		var firstOption = jQuery(document.createElement('option'));
		firstOption.val('');
		firstOption.text('select a sub-category');
		subcatlist.append(firstOption);
		angular.forEach(data, function(item){
			var option = jQuery(document.createElement('option'));
			option.val(item.Subcategory.id);
			option.text(item.Subcategory.name);
			subcatlist.append(option);
		});
	}


	directive.link = function(scope, element, attr){	
		element.bind('change', function(){
			var categoryId = element.val();
			ProductCategoryService.getSubCategoriesList(categoryId)
			.then(function(data){
				loadSubcategories(data);
			}, function(error){
				$log.error(error);
			});	
		});
		$(window).on('load', function(){
			var categoryId = element.val();
			ProductCategoryService.getSubCategoriesList(categoryId)
			.then(function(data){
				loadSubcategories(data);
				$rootScope.$emit('DONE_LOADING_SUBCATS');
			}, function(error){
				$log.error(error);
			});
			$rootScope.$on('DONE_LOADING_SUBCATS', function(){
				var subcatlist = $('#subcatlist');
				if(subcatlist.data('current') > 0){
					subcatlist.val(subcatlist.data('current'));
				}
			});
		});
	}
	return directive;
});

Directives.directive('currencyFormat', function(){
	var directive = {};
	directive.link = function(scope, element, attrs){
		var content = element.text();
		var formatted = numeral(Number(content)).format('0,0.00');
		element.addClass('price');
		element.text(formatted);
	}
	return directive;
});

/**
	under maintance
*/
/*
Directives.directive('inputAddon', function($log){

	var directive = {};

	directive.link = function(scope, element, attrs){
		var span = jQuery(document.createElement('span'));
		var element = jQuery(element);
		span.addClass('input-group-addon');
		span.text(attrs['inputAddon']);
		jQuery('label', element).after(span);
	}

	return directive;
});
*/
Directives.directive('addOn', function($log){
	var directive = {};

	directive.link = function(scope, element, attrs){
		// var span = jQuery(document.createElement('span'));
		// span.addClass('input-group-btn');
		// var button = jQuery(document.createElement('button'));
		// button.addClass('btn btn-xs');
		// button.text(attrs['addOn']);
		// span.append(button);
		// element.after(span);
	}
	return directive;
})
Directives.directive('bResize', function(){
	var directive = {};
	directive.link = function(scope, element, attrs){

	}
	return directive;
});

/**
	this directive makes cards fit into a perfect grid	
*/

Directives.directive('perfectGrid', function($log){
	var directive = {};
	directive.link = function(scope, element, attrs){
		var jqelement = jQuery(element);

		//index 0-phones 1-tablets 2-desktop and anything large
		var elementNumbers = attrs['perfectGrid'].split('-');

		//creates a new div with the clear css property of both to perfect the grid

		var emptyRow = jQuery(document.createElement('div')).css({clear : 'both'}).addClass('empty-row');

		jQuery(window).bind('resize load', function(evt){

			var nthChild;

			var windowWidth = jQuery(window).width();

			if(windowWidth >= 320 && windowWidth < 768){
				nthChild = elementNumbers[0];
			}else if(windowWidth >= 768 && windowWidth < 992){
				nthChild = elementNumbers[1];
			}else{
				nthChild = elementNumbers[2];
			}

			jQuery('div.empty-row').remove();

			jQuery('div.perfect-grid-element:nth-child(' + nthChild + 'n)', jqelement).after(emptyRow);
		});
	}
	return directive;
});

Directives.directive('requiredFormGroup', function(){
	var directive = {};
	directive.link = function(scope, element, attrs){
		var span = jQuery(document.createElement('span'));
		span.text(' *').addClass('required-field-label');
		jQuery('label', element).append(span);

	}
	return directive;
});

Directives.directive('formFieldHelpText', [function(){
	var directive = {};
	directive.link = function(scope, element, attrs){
		var p = jQuery(document.createElement('p'));
		p.addClass('form-field-help-text');
		p.text(attrs['formFieldHelpText']);
		element.after(p);
	}
	return directive;
}]);

Directives.directive('link', ['$window', '$log',function($window, $log){
	var directive = {};
	directive.link = function(scope, element, attrs){
		element.addClass('link');
		var anchors = jQuery('a', element);
			anchors.bind('click', function(evt){
			$window.location = attrs['link'];
			});
		element.bind('click', function(evt){
			$window.location = attrs['link'];
		});
	}
	return directive;
}]);

Directives.directive('delete', ['$window', '$log',function($window, $log){
	var directive = {};
	directive.link = function(scope, element, attrs){
		$(element).remove();
	}
	return directive;
}]);

Directives.directive('paginatorLink', function($log){
	var directive = {};
	directive.link = function(scope, element, attrs){
		element.addClass('link');
	}
	return directive;
});

Directives.directive('favourite', function(){
	var directive = {};
	directive.link = function(scope, element, attrs){
		var i = jQuery(document.createElement('i'));
		i.addClass('glyphicon glyphicon-heart');
		i.css({color : 'red'});
		element.prepend(i);
	}
	return directive;
});
Directives.directive('messageComposer',['$log',function($log){
	var directive = {};
	directive.restrict = 'E';
	directive.templateUrl = 'message-seller-template.html';
	return directive;
}]);
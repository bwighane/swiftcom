(function($){
	'use strict';

	/*
		removes the alert div if the .alert-conten is empty
	*/
	var alertContent = $('.alert-content');
	if(alertContent.text() == ''){
		var alertContentWrapper = $('.alert').remove();
	}
})(jQuery);
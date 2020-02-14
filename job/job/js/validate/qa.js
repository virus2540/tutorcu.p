$(function () {

	var rules = {
		    	rules: {
					resume: {
						required: true
					},
					percent: {
						required: true
					},
					q1: {

						required: true
					},
					q2: {
						required: true
					},
					q3: {
						required: true
					},
					q5: {
						required: true
					},
					q6: {
						required: true
					}
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#validation-form').validate(validationObj);
		
});
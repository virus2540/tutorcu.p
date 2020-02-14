$(function () {

	var rules = {
		    	rules: {
					name: {
						minlength: 2,
						required: true
					},
					email: {
						required: true,
						email: true
					},
					nick_name: {
						minlength: 2,
						required: true
					},
					mobile: {
						minlength: 2,
						required: true
					},
					mobile_m: {
						minlength: 2,
						required: true
					},
					id_code: {
						minlength: 2,
						required: true
					},
					address: {
						minlength: 2,
						required: true
					},
					gpa: {
						minlength: 2,
						required: true
					},
					username: {
						minlength: 2,
						required: true
					},
					password: {
						minlength: 2,
						required: true
					}
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#validation-form').validate(validationObj);
		
});
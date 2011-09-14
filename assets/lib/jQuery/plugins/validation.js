$(document).ready(function() {
	// validate signup form on keyup and submit
	var validator = $("#addContact").validate({
		rules: {
			firstname: "required",
			password: {
				required: false,
				minlength: 5
			},
			password_confirm: {
				required: false,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: false,
				email: true,
				//remote: "emails.php"
			},
			options: {
				required: false,
				//remote: "emails.php"
			}
		},
		messages: {
			firstname: "Please enter a First Name",
			password: {
				required: "Provide a password",
				rangelength: jQuery.format("Enter at least {0} characters")
			},
			password_confirm: {
				required: "Repeat your password",
				minlength: jQuery.format("Enter at least {0} characters"),
				equalTo: "Enter the same password as above"
			},
			email: {
				required: "Please enter a valid email address",
				minlength: "Please enter a valid email address",
				remote: jQuery.format("{0} is already in use")
			}
		},
		// the errorPlacement has to take the table layout into account
		errorPlacement: function(error, element) {
            if ( element.is(":radio") )
                error.appendTo( element.parent().next().next() );
        else if ( element.is(":checkbox") )
                error.appendTo ( element.next() );
        else
				error.appendTo( element.parent().next() );
		},
		// set this class to error-labels to indicate valid fields
		/*
		success: function(label) {
			// set   as text for IE
			label.html(" ").addClass("checked");
		} */

	});
});

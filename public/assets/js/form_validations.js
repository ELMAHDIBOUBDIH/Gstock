/* Webarch Admin Dashboard 
/* This JS is only for DEMO Purposes - Extract the code that you need
-----------------------------------------------------------------*/ 
$(document).ready(function() {				
	$(".select2").select2();
	
	//Iconic form validation sample	
	   $('#form_iconic_validation').validate({
                errorElement: 'span', 
                errorClass: 'error', 
                focusInvalid: false, 
                ignore: "",
                rules: {
                    question: {
                        required: true
                    },
                    image_1: {
                        required: true
                    },
                    image_2: {
                        required: true
                    }
                },

                invalidHandler: function (event, validator) {
					//display error alert on form submit    
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var icon = $(element).parent('.input-with-icon').children('i');
                    var parent = $(element).parent('.input-with-icon');
                    icon.removeClass('fa fa-check').addClass('fa fa-exclamation');  
                    parent.removeClass('success-control').addClass('error-control');  
                },

                highlight: function (element) { // hightlight error inputs
					var parent = $(element).parent();
                    parent.removeClass('success-control').addClass('error-control'); 
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    
                },

                success: function (label, element) {
                    var icon = $(element).parent('.input-with-icon').children('i');
					var parent = $(element).parent('.input-with-icon');
                    icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
					parent.removeClass('error-control').addClass('success-control'); 
                },

                submitHandler: function (form) {
                
                }
           
            });
             $('.select2', "#form_iconic_validation").change(function () {
                $('#form_iconic_validation').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
		 

});	
	 
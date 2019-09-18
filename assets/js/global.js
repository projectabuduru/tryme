"use strict";
// Class definition

var global = function() {
	// Private functions
	var clas_form_add = function(clas, buton, urll){

		function processForm( e ){
			e.preventDefault();
			// console.log($('form'+clas+' :input[class=required]'));
			// $(buton).prop('disabled', true);
			$.ajax({
				url: urll,
				type: 'post',
				data: $(clas).serialize(),
				success: function( data ){
					toastr.options = {
						"preventDuplicates": true,
						"preventOpenDuplicates": true
						};
					console.log(data);
					var json = JSON.parse(data);
					console.log(json);
					if(json.status == true){
						toastr.success(json.message);
						
						if(json.data == null){

							$(clas).trigger("reset");

						}else if(json.data == 'login' || json.data == 'register' || json.data == 'partner'){
							
							$(location).attr('href', 'home');

						}else{
							
							console.log('mbuhh');

						}
						
					}else{
						$(".show_error").html(json.message);
						toastr.error(json.message);
						$(buton).prop('disabled', false);
					}
					// reload();
				},
				error: function( jqXhr, textStatus, errorThrown ){
					console.log( errorThrown );
				}
			});
		
			
		}

		$(buton).click(processForm);
	}

	return {
		// public functions
		init_form_add: function(clas,buton, urll) { clas_form_add(clas, buton, urll); }
	};
}();

// jQuery(document).ready(function() {
// 	// KTDatatableColumnRenderingDemo.init();
// });
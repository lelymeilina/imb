/*
 *  Document   : base_forms_validation.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Validation Page
 */

var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationBootstrap = function(){
        jQuery('.js-validation-bootstrap').validate({
            errorClass: 'help-block animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'no_identitas': {
                    required: true,
                    minlength: 3
                },'fname': {
                    required: true,
                    minlength: 3
                },
                'email': {
                    required: true,
                    email: true
                },
                'telp': {
                    required: true
                },
                'password': {
                    required: true,
                    minlength: 5
                },
                'password2': {
                    required: true,
                    minlength: 5,
                    equalTo: '#password'
                },
                'jalur': {
                    required: true
                },
				'id_jurusan': {
                    required: true
                },
				'id_konsentrasi': {
                    required: true
                }
            },
            messages: {
                'noidentitas': {
                    required: 'Wajib Mengisi No.Identitas',
                    minlength: 'No. Identitas Minimal 3 Digit'
                },
                 'fname': {
                    required : 'Nama tidak Boleh Kosong'   
                },
                'telp': {
                    required : 'Telp tidak Boleh Kosong'   
                },
                'email': {
                    required : 'Email Tidak Boleh Kosong'   
                },
                'password': {
                    required: 'Password wajib diisi',
                    minlength: 'Minimal password 5 digit'
                },
                'password2': {
                    required: 'Ulangi password anda',
                    minlength: 'Minimal password 5 digit',
                    equalTo: 'Password tidak sama'
                },
                'jalur': 'Pilih Jalur Masuk',
                'id_jurusan': 'Pilih Program Studi',
                'id_konsentrasi': 'Pilih Konsentrasi Program Studi',
            }
        });
    };

    return {
        init: function () {
            // Init Bootstrap Forms Validation
            initValidationBootstrap();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ 
	BaseFormValidation.init(); 
	
	
	
	$(document).ready(function($){
		$.getJSON("dropdown_jalurmasuk",function(data) {

            $('#jalur').empty();
            $('.add-flagpasca').empty();
			$('#jalur').append("<option value='' data-flag=''>Pilih jalur masuk</option>");			
            $.each(data, function(key, value) {
                $('#jalur').append("<option value='" + value.id +"' data-flaglokal='"+value.flag_lokal+"'  data-flagpasca='"+value.flag_pasca+"' class='idflag"+value.id +"'>" + value.jalur_masuk + "</option>");
				$('.add-flagpasca').append("<input type='hidden' name='flag_pasca' value='"+ value.flag_pasca +"'>");
            });
        });
    
		$('#jalur').change(function(){
			var id=$(this).val();
			var flagpasca=$('.idflag'+id,this).attr('data-flagpasca');
			//alert(flag);
			$('.add-optionpasca').empty();
			$('.add-flagpasca').empty();
		
			$('.add-flagpasca').append("<input type='hidden' name='flag_pasca' value='"+ flagpasca +"'>");

			if (flagpasca==1){
				
				$('.add-optionpasca').empty();
				$('.add-optionpasca').append('<div class="form-group"><div class="col-xs-12"><div class="form-material form-material-success"><label for="proditawar">Pilihan Program Studi <span class="text-danger">*</span></label><select class="form-control" size="1" id="proditawar" name="id_jurusan"></select></div></div></div>'+
				'<div class="add-jenjang"></div>'+
				'<div class="form-group"><div class="col-xs-12"><div class="form-material form-material-success"><label for="konsentrasi">Pilihan Kosentrasi Program Studi <span class="text-danger">*</span></label><select class="form-control" size="1" id="konsentrasi" name="id_konsentrasi"></select></div></div></div>'); 
				
				$.getJSON("dropdown_proditawar",function(data) {
					$('#proditawar').empty();
					$('.add-jenjang').empty();
					$('#proditawar').append("<option value='' >Pilih Program Studi</option>");	
					$('#konsentrasi').append("<option value='' >Pilih Kosentrasi Program Studi</option>");	
					$.each(data, function(key, value) {
						$('#proditawar').append("<option value='" + value.id_jurusan +"'>" + value.prodi + "</option>");
						$('.add-jenjang').append("<input type='hidden' name='id_jenjang_studi' value='"+ value.id_jenjang_studi +"'>");
					
					});
				});
				
				$('#proditawar').change(function(){
					$.getJSON("dropdown_konsentrasi",
					{ option: $(this).val() },
					function(data) {
						$('#konsentrasi').empty(); 	
						$('#konsentrasi').append("<option value='' >Pilih Kosentrasi Program Studi</option>");	
						$.each(data, function(key, value) {
							$('#konsentrasi').append("<option value='" + value.id_konsentrasi +"'>" + value.konsentrasi_ps + "</option>");
						
						});

					});
				});
				
			}

		});


		
		

	});

});
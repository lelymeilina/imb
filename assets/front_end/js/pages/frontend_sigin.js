jQuery(function(){

	$(document).ready(function($){
		$.getJSON("dropdown_jalurmasuk",function(data) {
			//alert(data);
			
            $('#jalur').empty();
			$('#jalur').append("<option value='' data-flag=''>Pilih jalur masuk</option>");			
            $.each(data, function(key, value) {
                $('#jalur').append("<option value='" + value.id +"' data-flag='"+value.flag_lokal+"' class='idflag"+value.id +"'>" + value.jalur_masuk + "</option>");
            });
			
        });
    
		$('#jalur').change(function(){
			var id=$(this).val();
			var flag=$('.idflag'+id,this).attr('data-flag');
			//alert(flag);
			
			if (flag==2){
				$('.option-login').empty();
				$('.option-login').append('<div class="form-group"><div class="col-xs-12"><div class="form-material form-material-primary"><input class="form-control" type="text" id="no_peserta" name="no_peserta" placeholder="Input No Peserta"><label for="username">No Peserta</label></div></div></div>'+
                '<div class="form-group"><div class="col-xs-12"><div class="form-material form-material-primary"><input class="form-control" type="password" id="password" name="password" placeholder="Tanggal Lahir (ddmmyyyy)"><label for="password">Password</label></div></div></div>'); 
				
				
			}else{
				$('.option-login').empty();
				$('.option-login').append('<div class="form-group"><div class="col-xs-12"><div class="form-material form-material-primary"><input class="form-control" type="text" id="email" name="email" placeholder="Input Alamat Email"><label for="username">Email</label></div></div></div>'+
                '<div class="form-group"><div class="col-xs-12"><div class="form-material form-material-primary"><input class="form-control" type="password" id="password" name="password" placeholder="Input Password"><label for="password">Password</label></div></div> </div>');
			}

		});

   

	
	
	});
	
});
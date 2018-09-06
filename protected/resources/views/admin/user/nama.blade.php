{!! Form::select('name',['' => 'Pilih Nama User'] + $nama, null, [ 'id' => $id, 'class' => 'selectNama form-control select2','style' => 'width:100%']) !!}

<script type="text/javascript">
  $(document).ready(function(){
    $(".select2").select2();

    $('.selectNama').change(function(){
 		var role = $(this).get(0).id;
        if(specific == "1"){
            $.ajax({
	    		url: "ajaxPegawai/"+this.value,
	    		dataType : "json",
	    		success: function(result){
		      		$('.username').val(result.nidn);
	    		} 
  			});
        }
	});
  });
</script>
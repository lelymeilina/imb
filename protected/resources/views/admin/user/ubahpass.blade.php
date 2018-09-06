<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($user, [ 'method' => 'PUT','id' => 'ubahPassword','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id User', 'id' => 'id']) !!}

                          <div class="form-group">
                            {!! Form::label('nama', 'Nama',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::text('nama',$user->name, ['class' => 'form-control pass', 'placeholder' => 'Nama','required'=>'required','readonly'=>'readonly']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Username',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::text('username',null, ['class' => 'form-control pass', 'placeholder' => 'Nama','required'=>'required','readonly'=>'readonly']) !!}
                            </div>
                          </div>
                          
                          <div class="form-group" id="groupPassLama">
                            {!! Form::label('nama', 'Password Lama',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::password('old_password', ['class' => 'form-control pass', 'placeholder' => 'Password Lama','required'=>'required','id'=>'passlama']) !!}
                              <span class="help-block"></span>
                            </div>
                          </div>

                          <div class="form-group" id="groupPassBaru">
                            {!! Form::label('nama', 'Password Baru',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::password('password', ['class' => 'form-control pass', 'placeholder' => 'Password Baru','required'=>'required','id'=>'passbaru']) !!}
                              <span class="help-block"></span>
                            </div>
                          </div>

                           <div class="form-group" id="groupKonfPassBaru">
                            {!! Form::label('nama', 'Konfirmasi Password Baru',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::password('confirm_password', ['class' => 'form-control pass', 'placeholder' => 'Password','required'=>'required','id'=>'confirmpass']) !!}
                              <span class="help-block"></span>
                            </div>
                          </div>
                          <div class="col-md-2">&nbsp;</div><div class="col-md-8"><small class="col-md-10">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  * Button Submit akan tampil ketika password yang anda masukan benar</small></div>
                        <div class="modal-footer">
                          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="clear">Batal</button>
                          {!! Form::submit('Ubah', ['class' => 'btn btn-danger hide','id'=>'btnpass']) !!}
                        </div>

{!! Form::close() !!}
<!-- Button trigger modal -->
<!-- Modal -->
<script type="text/javascript">
  $(document).ready(function(){
    $(".select2").select2();

    $('#passlama').on('focusout', function(e) {
        var id = $('#id').val();
        var latarbelakang = $(this).val();

        $.ajax({
            url: baseUrl+"/admin/ajaxCheckPass/"+id,
            type: 'POST',
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'passlama'     : $('#passlama').val()
            },
            dataType : "json",
            success: function(result){
                if(result == false){
                  $('#groupPassLama').removeClass('success');
                  $('#groupPassLama').addClass('has-error');
                  $('#groupPassLama span').text('Password Anda Tidak Sesuai');
                  $('#passlama').val("");
                  $('#passlama').focus();
                }else{
                  $('#groupPassLama').removeClass('has-error');
                  $('#groupPassLama').addClass('has-success');
                  $('#groupPassLama span').text('Password Anda Sesuai');
                }
            } 
        });

    });

   
      $('#confirmpass').on('focusout', function(e) {
        if($('#confirmpass').val() == $('#passbaru').val()){
            $('#groupPassBaru').removeClass('has-error');
            $('#groupKonfPassBaru').removeClass('has-error');
            
            $('#groupPassBaru').addClass('has-success');
            $('#groupPassBaru span').text('Konfirmasi Password Anda Sesuai');

            $('#groupKonfPassBaru').addClass('has-success');
            $('#groupKonfPassBaru span').text('Konfirmasi Password Anda Sesuai');


            if($('#groupPassLama').hasClass('has-success')){
                $('#btnpass').removeClass('hide');
            }
        }else{
            $('#groupKonfPassBaru').removeClass('has-success');
            $('#groupPassBaru').removeClass('has-success');
            $('#groupPassBaru').addClass('has-error');
            $('#groupKonfPassBaru').addClass('has-error');
            $('#groupPassBaru span').text('Konfirm Password Anda Tidak Sesuai');
            $('#groupKonfPassBaru span').text('Konfirm Password Anda Tidak Sesuai');
            $('#btnpass').addClass('hide');
        }
    });

      $('#passbaru').on('focusout', function(e) {
        if($('#confirmpass').val() != ""){
            if($('#confirmpass').val() == $('#passbaru').val()){
                $('#groupPassBaru').removeClass('has-error');
                $('#groupKonfPassBaru').removeClass('has-error');
                
                $('#groupPassBaru').addClass('has-success');
                $('#groupPassBaru span').text('Konfirmasi Password Anda Sesuai');

                $('#groupKonfPassBaru').addClass('has-success');
                $('#groupKonfPassBaru span').text('Konfirmasi Password Anda Sesuai');


                if($('#groupPassLama').hasClass('has-success')){
                    $('#btnpass').removeClass('hide');
                }
            }else{
                $('#groupKonfPassBaru').removeClass('has-success');
                $('#groupPassBaru').removeClass('has-success');
                $('#groupPassBaru').addClass('has-error');
                $('#groupKonfPassBaru').addClass('has-error');
                $('#groupPassBaru span').text('Konfirm Password Anda Tidak Sesuai');
                $('#groupKonfPassBaru span').text('Konfirm Password Anda Tidak Sesuai');
                $('#btnpass').addClass('hide');
            }
        }
    });

  });
</script>

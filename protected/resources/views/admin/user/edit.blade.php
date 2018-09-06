<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($user, [ 'method' => 'PUT','id' => 'ubahuser','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id User', 'id' => 'id']) !!}

                          <div class="form-group">
                            {!! Form::label('nama', 'Level User',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::select('role_id[]',['' => 'Pilih Level User'] + $lvluser, $roleuser, ['class' => 'form-control select2','multiple'=>'multiple','style' => 'width:100%']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('username', 'Identifier',['class' => 'col-md-3 control-label username']) !!}
                            <div class="col-md-8">
                              {!! Form::text('identifier', null, ['class' => 'form-control','id'=>'identifier', 'placeholder' => 'Identifier','readonly'=>'readonly']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Nama',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama']) !!}
                            </div>
                          </div>
                          
                          <div class="form-group">
                            {!! Form::label('email', 'Email',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Reset Password',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::select('reset_password',['' => 'Pilih Ubah Password','1' => 'Reset Password','2' => 'Tidak Reset Password'] , null, ['class' => 'form-control resetPassword']) !!}
                            </div>
                          </div>

                          <div class="isiPassword hide">
                                <div class="form-group" id="groupPassBaru">
                                  {!! Form::label('nama', 'Password Baru',['class' => 'col-md-3 control-label']) !!}
                                  <div class="col-md-8">
                                    {!! Form::password('password', ['class' => 'form-control pass', 'placeholder' => 'Password Baru','id'=>'passbaru']) !!}
                                    <span class="help-block"></span>
                                  </div>
                                </div>

                                 <div class="form-group" id="groupKonfPassBaru">
                                  {!! Form::label('nama', 'Konfirmasi Password Baru',['class' => 'col-md-3 control-label']) !!}
                                  <div class="col-md-8">
                                    {!! Form::password('konfirm_password', ['class' => 'form-control pass', 'placeholder' => 'Password','id'=>'confirmpass']) !!}
                                    <span class="help-block"></span>
                                  </div>
                                </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('telp', 'Telp',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::text('telp', null, ['class' => 'form-control', 'placeholder' => 'Telp']) !!}
                            </div>
                          </div>



                        <div class="modal-footer">
                          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="clear">Batal</button>
                          {!! Form::submit('Ubah', ['class' => 'btn btn-primary','id'=>'btnpass']) !!}
                        </div>

{!! Form::close() !!}
<!-- Button trigger modal -->
<!-- Modal -->
<script type="text/javascript">
  $(document).ready(function(){
    $(".select2").select2();

    $('.resetPassword').change(function(){
        if (this.value == 1) {
            $('.isiPassword').removeClass('hide');
            $('#btnpass').addClass('hide');
        }else{
            $('.isiPassword').addClass('hide');
            $('#btnpass').removeClass('hide');
        }
    });
    $('#confirmpass').on('focusout', function(e) {
        if($('#confirmpass').val() == $('#passbaru').val()){
            $('#groupPassBaru').removeClass('has-error');
            
            $('#groupPassBaru').addClass('has-success');
            $('#groupPassBaru span').text('Konfirmasi Password Anda Sesuai');

            $('#groupKonfPassBaru').addClass('has-success');
            $('#groupKonfPassBaru span').text('Konfirmasi Password Anda Sesuai');

            $('#btnpass').removeClass('hide');
        }else{
            $('#groupPassBaru').addClass('has-error');
            $('#groupPassBaru span').text('Konfirm Password Anda Tidak Sesuai');
            $('#btnpass').addClass('hide');
        }
    });
    $('#passbaru').on('focusout', function(e) {
          if($('#confirmpass').val() == "" || $('#confirmpass').val() === undefined || $('#confirmpass').val() === null){
                //nothing
          }else{
                if($('#confirmpass').val() == $('#passbaru').val()){
                    $('#groupPassBaru').removeClass('has-error');
                    
                    $('#groupPassBaru').addClass('has-success');
                    $('#groupPassBaru span').text('Konfirmasi Password Anda Sesuai');

                    $('#groupKonfPassBaru').addClass('has-success');
                    $('#groupKonfPassBaru span').text('Konfirmasi Password Anda Sesuai');

                    $('#btnpass').removeClass('hide');
                }else{
                    $('#groupPassBaru').addClass('has-error');
                    $('#groupPassBaru span').text('Konfirm Password Anda Tidak Sesuai');
                    $('#btnpass').addClass('hide');
                }
          }
    });
  });
</script>

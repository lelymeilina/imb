<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($admin, [ 'method' => 'PUT','id' => 'ubahadmin','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id Topik', 'id' => 'id']) !!}


                          <div class="form-group">
                            {!! Form::label('nama', 'Nama Admin',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Nama Admin']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'email',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'e-mail Admin']) !!}
                            </div>
                          </div>


                          <div class="form-group">
                            {!! Form::label('notelp', 'No Telp',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('no_telp', null, ['class' => 'form-control', 'placeholder' => 'No Telp']) !!}
                            </div>
                          </div>



                        <div class="modal-footer">
                          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="clear">Batal</button>
                          {!! Form::submit('Ubah Data', ['class' => 'btn btn-primary']) !!}
                        </div>

{!! Form::close() !!}
<!-- Button trigger modal -->
<!-- Modal -->

<script type="text/javascript">
    $(".select2").select2();
</script>
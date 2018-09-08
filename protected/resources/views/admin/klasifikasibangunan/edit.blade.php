<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($klasifikasibangunan, [ 'method' => 'PUT','id' => 'ubahklasifikasibangunan','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id klasifikasibangunan', 'id' => 'id']) !!}


                          <div class="form-group">
                            {!! Form::label('nama', 'Nama',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Klasifikasi Bangunan']) !!}
                            </div>
                          </div>

                           <div class="form-group">
                            {!! Form::label('nama', 'Klasifikasi Bangunan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::select('is_bangunan_tambahan',['' => 'Pilih Klasifikasi Bangunan', '0' => 'Bangunan Utama', '1' => 'Bangunan Pendukung'], null, ['class' => 'form-control select2', 'id' => 'kbangunan','style' => 'width:100%']) !!}
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
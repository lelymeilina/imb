<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($klasifikasiparameterdetail, [ 'method' => 'PUT','id' => 'ubahklasifikasiparameterdetail','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id klasifikasiparameterdetail', 'id' => 'id']) !!}


                        <div class="form-group">
                            {!! Form::label('nama', 'Nama',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama']) !!}
                            </div>
                          </div>

                             <div class="form-group">
                            {!! Form::label('nama', 'Klasifikasi Parameter',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::select('id_klasifikasi_parameter',['' => 'Pilih Klasifikasi Parameter'] + $kp, null, ['class' => 'form-control select2', 'id' => 'kbangunan','style' => 'width:100%']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Indeks',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('indeks', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Indeks']) !!}
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
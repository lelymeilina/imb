<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($hargabangunan, [ 'method' => 'PUT','id' => 'ubahhargabangunan','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id hargabangunan', 'id' => 'id']) !!}

                          <div class="form-group">
                            {!! Form::label('nama', 'Fungsi',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::select('id_fungsi',['' => 'Pilih Fungsi'] + $fungsi, null, ['class' => 'form-control select2', 'id' => 'fungsi','style' => 'width:100%']) !!}
                            </div>
                          </div>

                           <div class="form-group">
                            {!! Form::label('nama', 'Nama Klasifikasi',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::select('id_klasifikasi',['' => 'Pilih Klasifikasi'] + $kb, null, ['class' => 'form-control select2', 'id' => 'klasifikasi','style' => 'width:100%']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Klasifikasi Bangunan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::select('is_bangunan_tambahan',['' => 'Pilih Klasifikasi Bangunan', '0' => 'Bangunan Utama', '1' => 'Bangunan Pendukung'], null, ['class' => 'form-control select2', 'id' => 'kbangunan','style' => 'width:100%']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Jenis Bangunan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                              {!! Form::select('is_bertingkat',['' => 'Pilih Jenis Bangunan', '0' => 'Tidak Bertingkat', '1' => 'Bertingkat'], null, ['class' => 'form-control select2', 'id' => 'jenisbangunan','style' => 'width:100%']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Harga',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('harga', null, ['class' => 'form-control currency', 'placeholder' => 'Masukkan Harga']) !!}
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
      $(document).ready(function(){
            $(".select2").select2();
            $('.currency').inputmask({
                alias:"decimal",
                digits:0,
                groupSeparator: '.',
                rightAlign: false,
                autoGroup: true,
                allowMinus:false   
            });
      });
</script>
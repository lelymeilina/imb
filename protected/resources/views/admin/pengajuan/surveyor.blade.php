<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($pengajuan, [ 'method' => 'PUT','id' => 'setsurveyor','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id Fungsi', 'id' => 'id']) !!}


                          <div class="form-group">
                            {!! Form::label('tahun', 'Tahun Pengajuan IMB',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('tahun',[""=>"Pilih Tahun IMB"]+$tahun, null, ['class' => 'form-control select2','style'=>'width:100%','disabled'=>'disabled']) !!}
                            </div>
                          </div>
                          
                          <div class="form-group">
                            {!! Form::label('nik', ($pengajuan->id_jenis_identitas == 1?"NIK":($pengajuan->id_jenis_identitas == 2?"KITAS":"Paspor")).' Pemohon',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nik', null, ['class' => 'form-control', 'placeholder' => 'Masukkan NIK (Nomor Identitas Kependudukan) Pendaftar Pengajuan','disabled'=>'disabled']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Nama Pemohon',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Pendaftar Pengajuan','disabled'=>'disabled']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'No. NIB',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('no_nib', null, ['class' => 'form-control', 'placeholder' => 'Masukkan No. NIB','disabled'=>'disabled']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('deskripsi_bangunan', 'Deskripsi Bangunan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::textarea('deskripsi_bangunan', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Deskripsi Singkat Bangunan, Contoh : Akomodasi Pariwisata Non Bintang (Villa)','disabled'=>'disabled','rows'=>'3']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Survey 1',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('id_surveyor_1',[""=>"Pilih Surveyor 1"]+$surveyor, null, ['class' => 'form-control select2','style'=>'width:100%','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Survey 2',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('id_surveyor_2',[""=>"Pilih Surveyor 2"]+$surveyor, null, ['class' => 'form-control select2','style'=>'width:100%','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('Awal', 'Tgl Survey',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                            <div class="input-group date">
                              {!! Form::text('tgl_survey', date('d M Y',strtotime($pengajuan->tgl_survey)), ['class' => 'form-control', 'placeholder' => 'Tgl Survey']) !!}
                              <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                            </div>
                          </div>



                        <div class="modal-footer">
                          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="clear">Batal</button>
                          {!! Form::submit('Simpan Data', ['class' => 'btn btn-primary']) !!}
                        </div>

{!! Form::close() !!}
<!-- Button trigger modal -->
<!-- Modal -->

<script type="text/javascript">
    $(".select2").select2();

    $('.date').datepicker({
            // format: "yyyy/mm/dd",
            format: "d M yyyy",
            // startDate: "2000-01-01",
            // endDate: "2050-01-01",
            setDate: new Date("{{date('d M Y',strtotime($pengajuan->tgl_survey))}}"),
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true
    });
</script>
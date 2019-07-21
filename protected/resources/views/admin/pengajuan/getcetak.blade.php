<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($pengajuan, [ 'method' => 'PUT','id' => 'cetakpengajuan','class' => 'form-horizontal','role' => 'form']) !!}

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
                            {!! Form::label('nama', 'NIP Kepala Bidang',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nip_kepala_bidang', (!empty($pengajuan->nip_kepala_bidang)?$pengajuan->nip_kepala_bidang:$pejabat->nip_kepala_bidang), ['class' => 'form-control', 'placeholder' => 'Masukkan NIP Kepala Bidang','required'=>'required','id'=>'nip_kepala_bidang','onChange'=>'btncetak()']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Nama Kepala Bidang',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('kepala_bidang', (!empty($pengajuan->kepala_bidang)?$pengajuan->kepala_bidang:$pejabat->kepala_bidang), ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Kepala Bidang','required'=>'required','id'=>'kepala_bidang','onChange'=>'btncetak()']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Pangkat/Gol Kepala Bidang',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('pangkat_kepala_bidang', (!empty($pengajuan->pangkat_kepala_bidang)?$pengajuan->pangkat_kepala_bidang:$pejabat->pangkat_kepala_bidang), ['class' => 'form-control', 'placeholder' => 'Masukkan Pangkat/Gol Kepala Bidang','required'=>'required','id'=>'pangkat_kepala_bidang','onChange'=>'btncetak()']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'NIP Kasi',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nip_kasi', (!empty($pengajuan->nip_kasi)?$pengajuan->nip_kasi:$pejabat->nip_kasi), ['class' => 'form-control', 'placeholder' => 'Masukkan NIP Kasi','required'=>'required','id'=>'nip_kasi','onChange'=>'btncetak()']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Nama Kasi',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('kasi', (!empty($pengajuan->kasi)?$pengajuan->kasi:$pejabat->kasi), ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Kasi','required'=>'required','id'=>'kasi','onChange'=>'btncetak()']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Pangkat/Gol Kasi',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('pangkat_kasi', (!empty($pengajuan->pangkat_kasi)?$pengajuan->pangkat_kasi:$pejabat->pangkat_kasi), ['class' => 'form-control', 'placeholder' => 'Masukkan Pangkat/Gol Kepala Bidang','required'=>'required','id'=>'pangkat_kasi','onChange'=>'btncetak()']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('Awal', 'Tgl Cetak',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                            <div class="input-group date">
                              {!! Form::text('tgl_cetak', null, ['class' => 'form-control', 'placeholder' => 'Tgl Cetak','id'=>'tgl_cetak','onChange'=>'btncetak()']) !!}
                              <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                            </div>
                          </div>



                        <div class="modal-footer">
                          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true" id="clear">Batal</button>
                          <a href="#" target="_blank" class="btn btn-success" id="btnCetak">Cetak</a>
                        </div>

{!! Form::close() !!}
<!-- Button trigger modal -->
<!-- Modal -->

<script type="text/javascript">
    $(".select2").select2();

    $('.date').datepicker({
            format: "yyyy/mm/dd",
            startDate: "2000-01-01",
            endDate: "2050-01-01",
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true
    });

    function btncetak(){
      $('#btnCetak').attr('href','{{URL("/")}}'+'/admin/pengajuan/'+'{{$pengajuan->id}}'+'/cetak?nip_kepala_bidang='+$('#nip_kepala_bidang').val()+'&kepala_bidang='+$('#kepala_bidang').val()+'&pangkat_kepala_bidang='+$('#pangkat_kepala_bidang').val()+'&nip_kasi='+$('#nip_kasi').val()+'&kasi='+$('#kasi').val()+'&pangkat_kasi='+$('#pangkat_kasi').val()+'&tgl_cetak='+$('#tgl_cetak').val());
    }

</script>
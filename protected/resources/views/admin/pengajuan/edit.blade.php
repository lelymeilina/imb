<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($pengajuan, [ 'method' => 'PUT','id' => 'ubahpengajuan','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id Fungsi', 'id' => 'id']) !!}


                          <div class="form-group">
                            {!! Form::label('tahun', 'Tahun Pengajuan IMB',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('tahun',[""=>"Pilih Tahun IMB"]+$tahun, null, ['class' => 'form-control select2','style'=>'width:100%','required'=>'required']) !!}
                            </div>
                          </div>
                          
                          <div class="form-group">
                            {!! Form::label('nik', 'NIK Pendaftar',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nik', null, ['class' => 'form-control', 'placeholder' => 'Masukkan NIK (Nomor Identitas Kependudukan) Pendaftar Pengajuan','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Nama Pendaftar',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Pendaftar Pengajuan','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Jenis Kegiatan IMB',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('id_jenis_imb',[""=>"Pilih Jenis IMB"]+$jenisImb, null, ['class' => 'form-control select2','style'=>'width:100%','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Fungsi Bangunan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('id_harga_bangunan',[""=>"Pilih Fungsi Bangunan"]+$hargaBangunan, null, ['class' => 'form-control select2','style'=>'width:100%','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('deskripsi_bangunan', 'Deskripsi Bangunan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::textarea('deskripsi_bangunan', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Deskripsi Singkat Bangunan, Contoh : Akomodasi Pariwisata Non Bintang (Villa)','required'=>'required','rows'=>'3']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('lokasi', 'Lokasi Bangunan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::textarea('lokasi', null, ['class' => 'form-control', 'placeholder' => 'Alamat/Banjar/Desa/Kecamatan/Lokasi Bangunan Yang Akan didirikan','required'=>'required','rows'=>'3']) !!}
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
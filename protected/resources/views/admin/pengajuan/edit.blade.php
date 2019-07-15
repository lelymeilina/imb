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
                            {!! Form::label('nama', 'Jenis Identitas Pemohon',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('id_jenis_identitas',[""=>"Pilih Jenis Identitas","1"=>"NIK","2"=>"KITAS","3"=>"Paspor"], null, ['class' => 'form-control select2','style'=>'width:100%','required'=>'required','id'=>'edit_jenis_id']) !!}
                            </div>
                          </div>
                          
                          <div class="form-group">
                            {!! Form::label('nik', 'NIK Pemohon',['class' => 'col-md-3 control-label','id'=>'editidentitas']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nik', null, ['class' => 'form-control', 'placeholder' => 'Masukkan NIK (Nomor Identitas Kependudukan) Pemohon Pengajuan','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Nama Pemohon',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Pemohon Pengajuan','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'No. NIB',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('no_nib', null, ['class' => 'form-control', 'placeholder' => 'Masukkan No. NIB','required'=>'required']) !!}
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

                          <div class="form-group">
                            {!! Form::label('nama', 'Latitude',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('latitude', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Latitude','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Longitude',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('longitude', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Longitude','required'=>'required']) !!}
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
    $('#editidentitas').text($( "#edit_jenis_id option:selected" ).text() +" Pemohon");
    $(document).on('change', '#edit_jenis_id', function() {
        $('#editidentitas').text($( "#edit_jenis_id option:selected" ).text() +" Pemohon");
    });
</script>
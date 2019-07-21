<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($pengajuan, [ 'method' => 'PUT','id' => 'cekpersyaratan','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id Fungsi', 'id' => 'id']) !!}


                          <div class="form-group">
                            {!! Form::label('tahun', 'Tahun Pengajuan IMB',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('tahun',[""=>"Pilih Tahun IMB"]+$tahun, null, ['class' => 'form-control select2','style'=>'width:100%','disabled'=>'disabled']) !!}
                            </div>
                          </div>
                          
                          <div class="form-group">
                            {!! Form::label('nik', ($pengajuan->id_jenis_identitas == 1?"NIK":($pengajuan->id_jenis_identitas == 2?"KITAS":"Paspor")).' Pendaftar',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('nik', null, ['class' => 'form-control', 'placeholder' => 'Masukkan NIK (Nomor Identitas Kependudukan) Pendaftar Pengajuan','disabled'=>'disabled']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Nama Pendaftar',['class' => 'col-md-3 control-label']) !!}
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

                          <div class="col-md-12">
                              <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Persyaratan Teknis</th>
                                      <th>Memenuhi</th>
                                      <th>Tidak Memenuhi</th>
                                      <th>Keterangan</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <!-- {{ $no = 1 }} -->
                                    @foreach($PengajuanPersyaratan AS $d)
                                    <tr>
                                      <td>{{$no}}</td>
                                      <td>{{$d->getPersyaratan->nama}}</td>
                                      
                                      <fieldset id="group{{$no}}">
                                      @if($d->is_memenuhi == 1)
                                        <td><input type="radio" name="is_memenuhi[{{$d->id_persyaratan}}]" checked value="1"></td>
                                      @else
                                        <td><input type="radio" name="is_memenuhi[{{$d->id_persyaratan}}]" value="1"></td>
                                      @endif

                                      @if(empty($d->is_memenuhi))
                                        <td><input type="radio" name="is_memenuhi[{{$d->id_persyaratan}}]" checked value="0"></td>
                                      @else
                                        <td><input type="radio" name="is_memenuhi[{{$d->id_persyaratan}}]" value="0"></td>
                                      @endif
                                      </fieldset>

                                      <td>
                                        @if($d->id_persyaratan == 7)
                                            {!! Form::textarea('keterangan['.$d->id_persyaratan.']', (!empty($d->keterangan)?$d->keterangan:$kdb_klb), ['class' => 'form-control', 'placeholder' => 'Masukkan Keterangan Hasil Survey '.$d->getPersyaratan->nama,'required'=>'required','rows'=>'6']) !!}
                                        @else
                                            {!! Form::textarea('keterangan['.$d->id_persyaratan.']', $d->keterangan, ['class' => 'form-control', 'placeholder' => 'Masukkan Keterangan Hasil Survey '.$d->getPersyaratan->nama,'required'=>'required','rows'=>'3']) !!}
                                        @endif
                                      </td>

                                    </tr>
                                    <!-- {{$no++}} -->
                                    @endforeach
                                  </tbody>
                              </table>
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
</script>
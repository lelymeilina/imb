<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($pengajuan, [ 'method' => 'PUT','id' => 'prasarana','class' => 'form-horizontal','role' => 'form']) !!}

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
                                      <th width="5%">No</th>
                                      <th width="30%">Nama Prasarana</th>
                                      <th width="20%">Hasil Survey Lapangan</th>
                                      <th width="25%">Jenis Kegiatan IMB</th>
                                      <th width="10%">Volume</th>
                                      <th width="10%">Satuan</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <!-- {{ $no = 1 }} -->
                                    @foreach($PengajuanPrasarana AS $d)
                                    <tr>
                                      <td>{{$no}}</td>
                                      <td>{{$d->nama}}</td>
                                      
                                      <td>
                                        {!! Form::select('id_harga_bangunan['.$d->id.']',[""=>"Pilih Hasil Survey"]+ \App\PengajuanPrasarana::getPrasarana($d->id_fungsi,$d->nama), $d->id_harga_bangunan, ['class' => 'form-control select2','style'=>'width:100%']) !!}
                                      </td>

                                      <td>
                                        {!! Form::select('id_jenis_imb_prasarana['.$d->id.']',["0"=>"Pilih Jenis IMB"]+$jenisImb, $d->id_jenis_imb_prasarana, ['class' => 'form-control select2','style'=>'width:100%']) !!}
                                      </td>

                                      <td>
                                        {!! Form::text('volume['.$d->id.']', $d->volume, ['class' => 'form-control', 'placeholder' => 'Contoh 235.5']) !!}
                                      </td>
                                      <td>
                                        {{$d->satuan}}
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
<!-- Button trigger modal -->
<!-- Modal -->


{!! Form::model($pengajuan, [ 'method' => 'PUT','id' => 'parameter','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id Fungsi', 'id' => 'id']) !!}


                          <div class="form-group">
                            {!! Form::label('tahun', 'Tahun Pengajuan IMB',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('tahun',[""=>"Pilih Tahun IMB"]+$tahun, null, ['class' => 'form-control select2','style'=>'width:100%','disabled'=>'disabled']) !!}
                            </div>
                          </div>
                          
                          <div class="form-group">
                            {!! Form::label('nik', 'NIK Pendaftar',['class' => 'col-md-3 control-label']) !!}
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
                                      <th width="30%">Persyaratan Teknis</th>
                                      <th width="35%">Hasil Survey Lapangan</th>
                                      <th width="30%">Keterangan</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <!-- {{ $no = 1 }} -->
                                    @foreach($PengajuanParameter AS $d)
                                    <tr>
                                      <td>{{$no}}</td>
                                      <td>{{$d->getParameter->nama}}</td>
                                      
                                      <td>
                                        {!! Form::select('id_klasifikasi_parameter_detail['.$d->id_klasifikasi_parameter.']',[""=>"Pilih Hasil Survey"]+ \App\PengajuanParameter::getDetailParameter($d->id_klasifikasi_parameter), $d->id_klasifikasi_parameter_detail, ['class' => 'form-control select2','style'=>'width:100%','required'=>'required']) !!}
                                      </td>

                                      <td>
                                        {!! Form::textarea('keterangan['.$d->id_klasifikasi_parameter.']', $d->keterangan, ['class' => 'form-control', 'placeholder' => 'Masukkan Keterangan Hasil Survey '.$d->getParameter->nama,'required'=>'required','rows'=>'3']) !!}
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
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
                                      <th width="30%" colspan="4">Fungsi</th>
                                      <th width="20%" colspan="6">Klasifikasi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td colspan="2">Detail</td>
                                      <td colspan="2">Indeks</td>
                                      <td colspan="4" rowspan="2">Bobot</td>
                                      <td colspan="2" rowspan="2">Kode</td>
                                    </tr>
                                    <tr >
                                      <!-- detail -->
                                      <td rowspan="{{count($PengajuanParameter) - 1}}">
                                          1. Fungsi Bangunan<br/>
                                          2. Jenis Kegiatan</br/>
                                          3. Klasifikasi Bangunan
                                      </td>
                                      <td rowspan="{{count($PengajuanParameter) - 1}}">
                                          1. {{$pengajuan->getHargaBangunan->getFungsi->nama}}<br/>
                                          2. {{$pengajuan->getJenisImb->nama}}<br/>
                                          3. {{$pengajuan->getHargaBangunan->getKlasifikasiBangunan->nama}}
                                      </td>
                                      <td rowspan="{{count($PengajuanParameter) - 1}}">
                                          Indeks <br/>
                                          Indeks <br/>
                                          Indeks 
                                      </td>
                                      <td rowspan="{{count($PengajuanParameter) - 1}}" style="border: 1px solid #f4f4f4;">
                                          {{$pengajuan->getHargaBangunan->getFungsi->indeks}}<br/>
                                          {{$pengajuan->getJenisImb->indeks}}<br/>
                                          -
                                      </td>

                                      <!-- bobot -->
                                      <!-- <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td> -->

                                      <!-- kode -->
                                      <!-- <td>&nbsp;</td>
                                      <td>&nbsp;</td> -->
                                    </tr>
                                    <!-- {{ $totalbobot = 0 }} -->
                                    <!-- {{ $indekswaktu = 0 }} -->
                                    <!-- {{ $indeksjalan = 0 }} -->
                                    @if(count($PengajuanParameter) >= 1)
                                        @foreach($PengajuanParameter AS $d)
                                            @if($d->getParameter->is_sum == 1)
                                            <tr>
                                              <!-- indeks -->
                                              <td>{{$d->getParameter->indeks}}</td>
                                              <td>{{$d->getParameterSurvey->indeks}}</td>
                                              <td>=</td>
                                              <td>{{round($d->getParameter->indeks * $d->getParameterSurvey->indeks,2)}}</td>
                                              <!-- {{$totalbobot = $totalbobot + ( round($d->getParameter->indeks * $d->getParameterSurvey->indeks,2) ) }} -->

                                              <!-- kode -->
                                              <td>{{$d->getParameter->nama}}</td>
                                              <td>{{$d->getParameterSurvey->nama}}</td>
                                            </tr>
                                            @endif

                                            @if($d->getParameter->is_waktu == 1)
                                                <!-- {{$indekswaktu = $d->getParameterSurvey->indeks}} -->
                                            @endif
                                            @if($d->getParameter->is_jalan == 1)
                                                <!-- {{$indeksjalan = $d->getParameterSurvey->indeks}} -->
                                            @endif
                                        @endforeach
                                    @endif
                                    
                                    <tr>
                                        <!-- indeks -->
                                        <td rowspan="2">Indeks Terintegrasi</td>
                                        <td>IJK IMB</td>
                                        <td>x</td>
                                        <td>Koef I</td>
                                        <td>x</td>
                                        <td>I waktu</td>
                                        <td>x</td>
                                        <td>IJ</td>

                                        <!-- kode -->
                                        <td>=</td>
                                        <td>It</td>
                                    </tr>
                                    <tr>
                                        <!-- indeks -->
                                        <td>{{$pengajuan->getHargaBangunan->getFungsi->indeks}}</td>
                                        <td>x</td>
                                        <td>{{round($totalbobot,2)}}</td>
                                        <td>x</td>
                                        <td>{{$indekswaktu}}</td>
                                        <td>x</td>
                                        <td>{{$indeksjalan}}</td>

                                        <!-- kode -->
                                        <td>=</td>
                                        <td>{{\App\HargaBangunan::round($pengajuan->getHargaBangunan->getFungsi->indeks * round($totalbobot,2) * $indekswaktu * $indeksjalan,2)}}</td>
                                    </tr>
                                    <tr>
                                        <!-- indeks -->
                                        <td rowspan="3">Retribusi {{$pengajuan->getJenisImb->nama}} {{($pengajuan->getHargaBangunan->getFungsi->is_bertingkat == 0?"Tidak Bertingkat":"Bertingkat")}}</td>
                                        <td>2%</td>
                                        <td>x</td>
                                        <td>Indeks</td>
                                        <td>x</td>
                                        <td>Luas</td>
                                        <td>x</td>
                                        <td>Indeks Integrasi</td>

                                        <!-- kode -->
                                        <td>x</td>
                                        <td>Harga</td>
                                    </tr>
                                    <tr>
                                        <!-- indeks -->
                                        <td>0.02</td>
                                        <td>x</td>
                                        <td>{{$pengajuan->getJenisImb->indeks}}</td>
                                        <td>x</td>
                                        <td>{{$pengajuan->luas}}</td>
                                        <td>x</td>
                                        <td>{{\App\HargaBangunan::round($pengajuan->getHargaBangunan->getFungsi->indeks * round($totalbobot,2) * $indekswaktu * $indeksjalan,2)}}</td>

                                        <!-- kode -->
                                        <td>x</td>
                                        <td>Rp. {{number_format($pengajuan->getHargaBangunan->harga)}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="8">Total Biaya Retribusi {{$pengajuan->getJenisImb->nama}} {{($pengajuan->getHargaBangunan->getFungsi->is_bertingkat == 0?"Tidak Bertingkat":"Bertingkat")}}</td>
                                        <td >Rp. {{ number_format((0.02 * $pengajuan->getJenisImb->indeks * $pengajuan->luas * \App\HargaBangunan::round($pengajuan->getHargaBangunan->getFungsi->indeks * round($totalbobot,2) * $indekswaktu * $indeksjalan,2) *  $pengajuan->getHargaBangunan->harga)) }}</td>
                                    </tr>

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
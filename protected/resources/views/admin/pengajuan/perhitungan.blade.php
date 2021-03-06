<!-- Button trigger modal -->
<!-- Modal -->

<div class="col-md-12" align="center"><h2>Perhitungan IMB Karangasem</h2></div>

{!! Form::model($pengajuan, [ 'method' => 'PUT','id' => 'perhitungan','class' => 'form-horizontal','role' => 'form']) !!}

  {!! Form::hidden('id', null, ['class' => 'form-control', 'placeholder' => 'Id Fungsi', 'id' => 'id']) !!}
  <h3>A. Biodata</h3>
  <div class="col-md-12">
        <div class="col-md-2"><strong>Tahun Pengajuan IMB</strong></div><div class="col-md-10">{{$pengajuan->tahun}}</div>
        <div class="col-md-2"><strong>{{ ($pengajuan->id_jenis_identitas == 1?"NIK":($pengajuan->id_jenis_identitas == 2?"KITAS":"Paspor")) }} Pendaftar</strong></div><div class="col-md-10">{{$pengajuan->nik}}</div>
        <div class="col-md-2"><strong>Nama Pendaftar</strong></div><div class="col-md-10">{{$pengajuan->nama}}</div>
        <div class="col-md-2"><strong>No. NIB</strong></div><div class="col-md-10">{{$pengajuan->no_nib}}</div>
        <div class="col-md-2"><strong>Deskripsi Bangunan</strong></div><div class="col-md-10">{{$pengajuan->deskripsi_bangunan}}</div>
        <div class="col-md-12">&nbsp;</div>
  </div>

  <h3>B. Perhitungan Retribusi Bangunan Utama</h3>
                          <div class="col-md-12">
                              <table class="table table-bordered">
                                  <thead>
                                    <tr class="info">
                                      <th width="30%" colspan="4">Fungsi</th>
                                      <th width="20%" colspan="6">Klasifikasi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr class="warning">
                                      <td colspan="2">Detail</td>
                                      <td colspan="2">Indeks</td>
                                      <td colspan="4" rowspan="2">Bobot</td>
                                      <td colspan="2" rowspan="2">Kode</td>
                                    </tr>
                                    <tr >
                                      <!-- detail -->
                                      <td rowspan="{{count($PengajuanParameter) - 1}}">
                                          1. Fungsi Bangunan<br/>
                                          2. Jenis Kegiatan<br/>
                                          3. Klasifikasi Bangunan
                                      </td>
                                      <td rowspan="{{count($PengajuanParameter) - 1}}">
                                          1. {{$pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->nama}}<br/>
                                          2. {{$pengajuan->getJenisImb->nama}}<br/>
                                          3. {{$pengajuan->getJenisKlasifikasiBangunan->getKlasifikasi->nama}}
                                      </td>
                                      <td rowspan="{{count($PengajuanParameter) - 1}}">
                                          Indeks <br/>
                                          Indeks <br/>
                                          Indeks 
                                      </td>
                                      <td rowspan="{{count($PengajuanParameter) - 1}}" style="border: 1px solid #f4f4f4;">
                                          {{$pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks}}<br/>
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
                                              <td>{{$d->getParameter->indeks * $d->getParameterSurvey->indeks}}</td>
                                              <!-- {{$totalbobot = $totalbobot + ( $d->getParameter->indeks * $d->getParameterSurvey->indeks ) }} -->

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
                                    
                                    <tr >
                                        <td colspan="6">Koefisien I (Total Bobot)</td>
                                        
                                        <td >=</td>
                                        <td colspan="3"><strong>{{$totalbobot}}</strong></td>
                                    </tr>
                                    
                                    <tr >
                                        <!-- indeks -->
                                        <td rowspan="2">Indeks Terintegrasi</td>
                                        <td class="info">IJK IMB</td>
                                        <td class="info">x</td>
                                        <td class="info">Koef I</td>
                                        <td class="info">x</td>
                                        <td class="info">I waktu</td>
                                        <td class="info">x</td>
                                        <td class="info">IJ</td>

                                        <!-- kode -->
                                        <td class="info">=</td>
                                        <td class="info">It</td>
                                    </tr>
                                    <tr>
                                        <!-- indeks -->
                                        <td>{{$pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks}}</td>
                                        <td>x</td>
                                        <td>{{$totalbobot}}</td>
                                        <td>x</td>
                                        <td>{{$indekswaktu}}</td>
                                        <td>x</td>
                                        <td>{{$indeksjalan}}</td>

                                        <!-- kode -->
                                        <td>=</td>
                                        <td>{{\App\HargaBangunan::round($pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks * $totalbobot * $indekswaktu * $indeksjalan,2)}}</td>
                                    </tr>
                                    <tr>
                                        <!-- indeks tidak bertingkat-->
                                        <td >Retribusi {{$pengajuan->getJenisImb->nama}} </td>
                                        <td class="info">2%</td>
                                        <td class="info">x</td>
                                        <td class="info">Indeks</td>
                                        <td class="info">x</td>
                                        <td class="info">Luas</td>
                                        <td class="info">x</td>
                                        <td class="info">Indeks Integrasi</td>

                                        <!-- kode -->
                                        <td class="info">x</td>
                                        <td class="info">Harga</td>
                                    </tr>
                                    <tr>
                                        <!-- indeks -->
                                        <td><strong>Tidak Bertingkat</strong></td>
                                        <td>0.02</td>
                                        <td>x</td>
                                        <td>{{$pengajuan->getJenisImb->indeks}}</td>
                                        <td>x</td>
                                        <td>{{$pengajuan->luas_tidakbertingkat}}</td>
                                        <td>x</td>
                                        <td>{{\App\HargaBangunan::round($pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks * $totalbobot * $indekswaktu * $indeksjalan,2)}}</td>

                                        <!-- kode -->
                                        <td>x</td>
                                        <td>Rp. {{number_format(App\HargaBangunan::getHargaBangunan($pengajuan->id_jenis_klasifikasi_bangunan,0)->harga)}}</td>
                                    </tr>

                                    <tr>
                                        <!-- indeks bertingkat-->
                                        <td > <strong>Bertingkat</strong></td>
                                        <td>0.02</td>
                                        <td>x</td>
                                        <td>{{$pengajuan->getJenisImb->indeks}}</td>
                                        <td>x</td>
                                        <td>{{$pengajuan->luas_bertingkat}}</td>
                                        <td>x</td>
                                        <td>{{\App\HargaBangunan::round($pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks * $totalbobot * $indekswaktu * $indeksjalan,2)}}</td>

                                        <!-- kode -->
                                        <td>x</td>
                                        <td>Rp. {{number_format(App\HargaBangunan::getHargaBangunan($pengajuan->id_jenis_klasifikasi_bangunan,1)->harga)}}</td>
                                    </tr>

                                    <tr>
                                        <!-- indeks basement-->
                                        <td > <strong>Basement</strong></td>
                                        <td>0.02</td>
                                        <td>x</td>
                                        <td>1.3</td>
                                        <td>x</td>
                                        <td>{{$pengajuan->luas_basement}}</td>
                                        <td>x</td>
                                        <td>{{\App\HargaBangunan::round($pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks * $totalbobot * $indekswaktu * $indeksjalan,2)}}</td>

                                        <!-- kode -->
                                        <td>x</td>
                                        <td>Rp. {{number_format(3000000)}}</td>
                                    </tr>

                                    <tr>
                                        <!-- total all-->
                                        <td > </td>
                                        <td colspan="8" class="danger">Total Biaya Retribusi {{$pengajuan->getJenisImb->nama}} </td>
                                        <td class="danger">Rp. {{ number_format( \App\HargaBangunan::pembulatan( (0.02 * $pengajuan->getJenisImb->indeks * $pengajuan->luas_tidakbertingkat * \App\HargaBangunan::round($pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks * $totalbobot * $indekswaktu * $indeksjalan,2) *  App\HargaBangunan::getHargaBangunan($pengajuan->id_jenis_klasifikasi_bangunan,0)->harga) + (0.02 * $pengajuan->getJenisImb->indeks * $pengajuan->luas_bertingkat * \App\HargaBangunan::round($pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks * $totalbobot * $indekswaktu * $indeksjalan,2) *  App\HargaBangunan::getHargaBangunan($pengajuan->id_jenis_klasifikasi_bangunan,1)->harga) + (0.02 * 1.3 * $pengajuan->luas_basement * \App\HargaBangunan::round($pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks * $totalbobot * $indekswaktu * $indeksjalan,2) *  3000000) ) ) }}</td>
                                        <input type="hidden" name="jumlah_biaya" value="{{ \App\HargaBangunan::pembulatan( (0.02 * $pengajuan->getJenisImb->indeks * $pengajuan->luas_tidakbertingkat * \App\HargaBangunan::round($pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks * $totalbobot * $indekswaktu * $indeksjalan,2) *  App\HargaBangunan::getHargaBangunan($pengajuan->id_jenis_klasifikasi_bangunan,0)->harga) + (0.02 * $pengajuan->getJenisImb->indeks * $pengajuan->luas_bertingkat * \App\HargaBangunan::round($pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks * $totalbobot * $indekswaktu * $indeksjalan,2) *  App\HargaBangunan::getHargaBangunan($pengajuan->id_jenis_klasifikasi_bangunan,1)->harga) + (0.02 * 1.3 * $pengajuan->luas_basement * \App\HargaBangunan::round($pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks * $totalbobot * $indekswaktu * $indeksjalan,2) *  3000000) ) }}">

                                        <!-- {{$jumlah_biaya = \App\HargaBangunan::pembulatan( (0.02 * $pengajuan->getJenisImb->indeks * $pengajuan->luas_tidakbertingkat * \App\HargaBangunan::round($pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks * $totalbobot * $indekswaktu * $indeksjalan,2) *  App\HargaBangunan::getHargaBangunan($pengajuan->id_jenis_klasifikasi_bangunan,0)->harga) + (0.02 * $pengajuan->getJenisImb->indeks * $pengajuan->luas_bertingkat * \App\HargaBangunan::round($pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks * $totalbobot * $indekswaktu * $indeksjalan,2) *  App\HargaBangunan::getHargaBangunan($pengajuan->id_jenis_klasifikasi_bangunan,1)->harga) + (0.02 * 1.3 * $pengajuan->luas_basement * \App\HargaBangunan::round($pengajuan->getJenisKlasifikasiBangunan->getJenisBangunan->getFungsi->indeks * $totalbobot * $indekswaktu * $indeksjalan,2) *  3000000) ) }} -->
                                    </tr>

                                  </tbody>
                              </table>
                          </div>

<h3>C. Perhitungan Retribusi Bangunan Prasarana Pendukung</h3>

                          <div class="col-md-12">
                              <table class="table table-bordered table-striped">
                                  <thead>
                                    <tr class="info">
                                      <th width="30%" colspan="2">Rumusan</th>
                                      <th width="10%">2%</th>
                                      <th width="3%">x</th>
                                      <th width="10%">Volume</th>
                                      <th width="3%">x</th>
                                      <th width="10%">Indeks Retribusi</th>
                                      <th width="3%">x</th>
                                      <th width="10%">Harga</th>
                                      <th width="3%">=</th>
                                      <th width="15%">Jumlah</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <!-- {{$jumlahPrasarana = 0}} -->
                                    @if(count($PengajuanPrasarana)>=1)
                                        @foreach($PengajuanPrasarana AS $d)
                                          @if($d->volume > 0)
                                            <!-- {{$warna = "success"}} -->
                                          @else
                                            <!-- {{$warna = ""}} -->
                                          @endif
                                          <tr class="{{$warna}}">
                                              <td>{{$d->getFungsi->nama}}</td>
                                              <td>{{$d->nama}}</td>
                                              <td>0.02</td>
                                              <td>x</td>
                                              <td>{{$d->volume}}</td>
                                              <td>x</td>
                                              <td>{{($d->id_jenis_imb_prasarana == 0?"-":$d->getJenisImb->indeks)}}</td>
                                              <td>x</td>
                                              <td>Rp. {{ ($d->id_harga_bangunan == 0?"-":number_format($d->getHargaBangunan->harga)) }}</td>
                                              <td>=</td>
                                              <td>Rp. {{ number_format(0.02 * $d->volume * ($d->id_jenis_imb_prasarana == 0?"1":$d->getJenisImb->indeks) * ($d->id_harga_bangunan == 0?"1":$d->getHargaBangunan->harga)) }}</td>
                                              <!-- {{ $jumlahPrasarana = $jumlahPrasarana + (0.02 * $d->volume * ($d->id_jenis_imb_prasarana == 0?"1":$d->getJenisImb->indeks) * ($d->id_harga_bangunan == 0?"1":$d->getHargaBangunan->harga)) }} -->
                                              <input type="hidden" name="jumlah_biaya_prasarana[{{$d->id}}]" value="{{(0.02 * $d->volume * ($d->id_jenis_imb_prasarana == 0?"1":$d->getJenisImb->indeks) * ($d->id_harga_bangunan == 0?"1":$d->getHargaBangunan->harga))}}"/>
                                              
                                          </tr>
                                        @endforeach
                                    @endif
                                    <input type="hidden" name="total_biaya_prasarana" value="{{$jumlahPrasarana}}"/>

                                    <tr>
                                      <td class="danger" colspan="10">Jumlah Biaya</td>
                                      <td class="danger">Rp. {{number_format(\App\HargaBangunan::pembulatan($jumlahPrasarana))}}</td>
                                    </tr>
                                  </tbody>
                              </table>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Jumlah Total',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('total_all', number_format($jumlah_biaya + \App\HargaBangunan::pembulatan($jumlahPrasarana)), ['class' => 'form-control', 'placeholder' => 'Biaya B + C','disabled'=>'disabled']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('nama', 'Pembulatan Total Manual',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::text('total_biaya_pembulatan', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Total Biaya Pembulatan','required'=>'required']) !!}
                            </div>
                          </div>

                          <div class="form-group">
                            {!! Form::label('status', 'Simpan Status Pengajuan',['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-8">
                                   {!! Form::select('status_pengajuan_id',[""=>"Pilih Status Pengajuan"]+$statusPengajuan, null, ['class' => 'form-control select2','style'=>'width:100%','required'=>'required']) !!}
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
</script>
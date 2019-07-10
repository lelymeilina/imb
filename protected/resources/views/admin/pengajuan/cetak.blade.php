<style type="text/css">
  .table-border-top th, .table-border-top td {
    padding: 7px 10px 7px 0px;
    font-size:12px;
  }
  .table-border-top {
    border-collapse: collapse;
  }
  .table-border-top th {
    vertical-align:middle;
    text-align:center;
  }
  .table-border-top th {
    border-top: 1px solid black;
    border: 1px solid black;
    text-align: center;
  }
  .table-border-top-2 th, .table-border-top-2 td {
    padding: 3px 10px 2px 0px;
    font-size:12px;
  }
  .table-border-top-2 {
    border-collapse: collapse;
  }
  .table-border-top-2 th {
    vertical-align:middle;
    text-align:center;
  }
  .table-border-top-2 th {
    border-top: 1px solid black;
    border: 1px solid black;
    text-align: center;
  }
  .table-header-top td {
  	
  }
  .td-bottom{
  	border: 1px solid black !important;
  	padding-left: 7px;
  }
  .td-no-border{
  	border-top: 1px solid black !important;
  	border-bottom: 1px solid black !important;
  	border-right: 1px solid black !important;

  	padding-left: 7px;
  }
  .bold{
  	font-weight: bold;
  }





</style>

<!-- halaman 4 -->

<page backtop="15mm" backbottom="25mm" backleft="13mm" backright="25mm" style="font-size: 9pt" class="bodies">
	<table style="font-size: 8pt; margin: 0px 0px 0px 240px;" >
	<tr>
		<td width="50px">
			<img  src="{{URL('assets/img/logo.png')}}" style="width: 90px; height: 80px;" />
		</td>
		<td width="400px">
			<div style="width:100%;text-align:center;font-size: 14pt;" class="">PEMERINTAH KABUPATEN KARANGASEM</div>
			<div style="width:100%;text-align:center;font-size: 14pt; padding-left:20px">DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</div>
			<div style="width:100%;text-align:center;font-size: 11pt;" >Jalan Nenas, Telp. ( 0363 ) 21007. 21757 Amlapura 80811 </div>
		</td>
	</tr>
	</table>
	<hr style="font-size: 12pt; margin: 0px 0px 0px 25px;" width="50%"  />

	<div style="width:100%;text-align:center;font-size: 10pt; margin-top: 10px; margin-left:25px;" align="right"><b>Amlapura, 11 September 2018</b></div>

	<div style="width:100%;text-align:center;font-size: 12pt; margin-top: 10px; margin-left:25px; text-decoration: "><b>REKAPITULASI PERHITUNGAN BESARNYA RETRIBUSI IMB</b></div>
	<br/>

	<table style="margin-left:25px;">
        <tr>
        	<td><strong>Tahun Pengajuan IMB</strong></td><td>:</td><td>{{$pengajuan->tahun}}</td>
        </tr>
        <tr>
        	<td><strong>NIK Pendaftar</strong></td><td>:</td><td>{{$pengajuan->nik}}</td>
        </tr>
        <tr>
        	<td><strong>Nama Pendaftar</strong></td><td>:</td><td>{{$pengajuan->nama}}</td>
        </tr>
        <tr>
        	<td><strong>Fungsi IMB</strong></td><td>:</td><td>{{$pengajuan->getHargaBangunan->getFungsi->nama}} - {{$pengajuan->getHargaBangunan->nama}}</td>
        </tr>
        <tr>
        	<td><strong>Deskripsi Bangunan</strong></td><td>:</td><td>{{$pengajuan->deskripsi_bangunan}}</td>
        </tr>
        <tr>
        	<td><strong>Lokasi </strong></td><td>:</td><td>{{$pengajuan->lokasi}}</td>
        </tr>
  	</table>

  	<br/>

	<table class="table-border-top" style="margin-left:25px;">
			<thead>
				<tr>
					<th align="left" width="2px;" style="padding-left:5px;">No.</th>
					<th align="left" width="355px;" style="padding-left:5px;">Jenis Retribusi</th>
					<th align="left" width="135px;" style="padding-left:5px;">Jumlah</th>
					<th align="left" width="135px;" style="padding-left:5px;">Total</th>
					<th align="left" width="155px;" style="padding-left:5px;">Keterangan</th>
				</tr>
			</thead>
			<tbody>
			@if(count($pengajuan)>=1)
					<tr class="td-bottom">
						<td class="td-bottom">1</td>
						<td class="td-bottom">{!! wordwrap("RETRIBUSI PEMBINAAN PENYELENGGARAAN BANGUNAN GEDUNG",100,"<br/>\n") !!}</td>
						<td class="td-bottom">Rp. {!! wordwrap(number_format($pengajuan->jumlah_biaya),25,"<br/>\n") !!}</td>
						<td class="td-bottom">-</td>
						<td class="td-bottom">-</td>
					</tr>
					<tr class="td-bottom">
						<td class="td-bottom">2</td>
						<td class="td-bottom">{!! wordwrap("RETRIBUSI PRASARANA BANGUNAN GEDUNG",100,"<br/>\n") !!}</td>
						<td class="td-bottom">Rp. {!! wordwrap(number_format($pengajuan->jumlah_biaya_prasarana),25,"<br/>\n") !!}</td>
						<td class="td-bottom">-</td>
						<td class="td-bottom">-</td>
					</tr>
					<tr class="td-bottom">
						<td class="td-bottom">-</td>
						<td class="td-bottom">Dibulatkan</td>
						<td class="td-bottom">-</td>
						<td class="td-bottom">Rp. {!! wordwrap(number_format($pengajuan->jumlah_biaya + $pengajuan->jumlah_biaya_prasarana),30,"<br/>\n") !!} <br/> Rp. {!! wordwrap(number_format(\App\HargaBangunan::pembulatan($pengajuan->jumlah_biaya + $pengajuan->jumlah_biaya_prasarana)),30,"<br/>\n") !!}</td>
						<td class="td-bottom">-</td>
					</tr>
					<tr class="td-bottom">
						<td class="td-bottom" colspan="5">Terbilang : {{$terbilang}}</td>
					</tr>
			@else
				<tr class="td-bottom">
					<td colspan="7" class="td-bottom" align="center">Status Data Ini Belum disetujui</td>
				</tr>
			@endif
			</tbody>
	</table>
	<br/>

	<table style="border: none; border-collapse: none; margin-left:25px;">
		<tr>
			<td width="320">
				<div style="width:100%;text-align:left;font-size: 12pt;" > Mengetahui, </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > Kepala Bidang  Penataan Ruang</div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > Dinas PUPR Kabupaten Karangasem</div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;">I Nengah Bayu Pramana, ST., MT</div>
				<div style="width:100%;text-align:left;font-size: 12pt;">Penata TK 1</div>
				<div style="width:100%;text-align:left;font-size: 12pt;">NIP. 19801110 200501 1 015</div>
			</td>

			<td width="320">
				<div style="width:100%;text-align:left;font-size: 12pt;" > Menyetujui, </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > Kasi Pengendalian Tata Ruang</div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > Dinas PUPR. Kab. Karangasem.</div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;">I Gusti Made Artha Wijaya, ST</div>
				<div style="width:100%;text-align:left;font-size: 12pt;">Penata</div>
				<div style="width:100%;text-align:left;font-size: 12pt;">NIP. 19840906 201101 1 004</div>
			</td>

			<td width="320">
				<div style="width:100%;text-align:left;font-size: 12pt;" >  </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > Staf</div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > Dinas PUPR Kabupaten Karangasem</div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;">{{$pengajuan->getSurveyor1->nama}}</div>
				<div style="width:100%;text-align:left;font-size: 12pt;">Pengatur</div>
				<div style="width:100%;text-align:left;font-size: 12pt;">NIP.{{$pengajuan->getSurveyor1->nip}}</div>
			</td>
		</tr>
	</table>


</page>

<!-- //halaman 2 -->
<page backtop="15mm" backbottom="25mm" backleft="13mm" backright="25mm" style="font-size: 9pt" class="bodies">
	<h3>Perhitungan Retribusi Bangunan Utama</h3>
	<table class="table-border-top" style="margin-left:10px;">
          <thead>
            <tr style="background: #d9edf7;">
              <th width="450px" colspan="4">Fungsi</th>
              <th width="450px" colspan="6">Klasifikasi</th>
            </tr>
          </thead>
          <tbody>
            <tr class="td-bottom" style="background: #fcf8e3;">
              <td colspan="2" class="td-bottom">Detail</td>
              <td colspan="2" class="td-bottom">Indeks</td>
              <td colspan="4" rowspan="2" class="td-bottom">Bobot</td>
              <td colspan="2" rowspan="2" class="td-bottom">Kode</td>
            </tr>
            <tr class="td-bottom">
              <!-- detail -->

              <td rowspan="{{count($PengajuanParameter) - 1}}" class="td-bottom">
                  1. Fungsi Bangunan<br/>
                  2. Jenis Kegiatan<br/>
                  3. Klasifikasi Bangunan
              </td>
              <td rowspan="{{count($PengajuanParameter) - 1}}" class="td-bottom">
                  1. {{$pengajuan->getHargaBangunan->getFungsi->nama}}<br/>
                  2. {{$pengajuan->getJenisImb->nama}}<br/>
                  3. {{$pengajuan->getHargaBangunan->getKlasifikasiBangunan->nama}}
              </td>
              <td rowspan="{{count($PengajuanParameter) - 1}}" style="border-bottom: 1px solid #000000;">
                   Indeks <br/>
                   Indeks <br/>
                   Indeks 
              </td>
              <td rowspan="{{count($PengajuanParameter) - 1}}" style="border-bottom: 1px solid #000000;" >
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

            <!-- sini -->

            <!-- {{ $totalbobot = 0 }} -->
            <!-- {{ $indekswaktu = 0 }} -->
            <!-- {{ $indeksjalan = 0 }} -->
            @if(count($PengajuanParameter) >= 1)
                @foreach($PengajuanParameter AS $d)
                    @if($d->getParameter->is_sum == 1)
                    <tr class="td-bottom">
                      <!-- indeks -->
                      <td class="td-bottom">{{$d->getParameter->indeks}}</td>
                      <td class="td-bottom">{{$d->getParameterSurvey->indeks}}</td>
                      <td class="td-bottom">=</td>
                      <td class="td-bottom">{{round($d->getParameter->indeks * $d->getParameterSurvey->indeks,2)}}</td>
                      <!-- {{$totalbobot = $totalbobot + ( round($d->getParameter->indeks * $d->getParameterSurvey->indeks,2) ) }} -->

                      <!-- kode -->
                      <td class="td-bottom">{{$d->getParameter->nama}}</td>
                      <td class="td-bottom">{{$d->getParameterSurvey->nama}}</td>
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
            
            <tr class="td-bottom">
                <td colspan="6" class="td-bottom">Koefisien I (Total Bobot)</td>
                
                <td class="td-bottom">=</td>
                <td colspan="3" class="td-bottom"><strong>{{round($totalbobot,2)}}</strong></td>
            </tr>
            
            <tr class="td-bottom">
                <!-- indeks -->
                <td rowspan="2" class="td-bottom">Indeks Terintegrasi</td>
                <td style="background: #d9edf7;" class="td-bottom">IJK IMB</td>
                <td style="background: #d9edf7;" class="td-bottom">x</td>
                <td style="background: #d9edf7;" class="td-bottom">Koef I</td>
                <td style="background: #d9edf7;" class="td-bottom">x</td>
                <td style="background: #d9edf7;" class="td-bottom">I waktu</td>
                <td style="background: #d9edf7;" class="td-bottom">x</td>
                <td style="background: #d9edf7;" class="td-bottom">IJ</td>

                <!-- kode -->
                <td style="background: #d9edf7;" class="td-bottom">=</td>
                <td style="background: #d9edf7;" class="td-bottom">It</td>
            </tr>
            <tr class="td-bottom">
                <!-- indeks -->
                <td class="td-bottom">{{$pengajuan->getHargaBangunan->getFungsi->indeks}}</td>
                <td class="td-bottom">x</td>
                <td class="td-bottom">{{round($totalbobot,2)}}</td>
                <td class="td-bottom">x</td>
                <td class="td-bottom">{{$indekswaktu}}</td>
                <td class="td-bottom">x</td>
                <td class="td-bottom">{{$indeksjalan}}</td>

                <!-- kode -->
                <td class="td-bottom">=</td>
                <td class="td-bottom">{{\App\HargaBangunan::round($pengajuan->getHargaBangunan->getFungsi->indeks * round($totalbobot,2) * $indekswaktu * $indeksjalan,2)}}</td>
            </tr>
            <tr class="td-bottom">
                <!-- indeks -->
                <td rowspan="3" class="td-bottom">{!! wordwrap("Retribusi ".$pengajuan->getJenisImb->nama." ".($pengajuan->getHargaBangunan->getFungsi->is_bertingkat == 0?"Tidak Bertingkat":"Bertingkat"),30,"<br/>") !!}</td>
                <td style="background: #d9edf7;" class="td-bottom">2%</td>
                <td style="background: #d9edf7;" class="td-bottom">x</td>
                <td style="background: #d9edf7;" class="td-bottom">Indeks</td>
                <td style="background: #d9edf7;" class="td-bottom">x</td>
                <td style="background: #d9edf7;" class="td-bottom">Luas</td>
                <td style="background: #d9edf7;" class="td-bottom">x</td>
                <td style="background: #d9edf7;" class="td-bottom">Indeks Integrasi</td>

                <!-- kode -->
                <td style="background: #d9edf7;" class="td-bottom">x</td>
                <td style="background: #d9edf7;" class="td-bottom">Harga</td>
            </tr>
            <tr class="td-bottom">
                <!-- indeks -->
                <td class="td-bottom">0.02</td>
                <td class="td-bottom">x</td>
                <td class="td-bottom">{{$pengajuan->getJenisImb->indeks}}</td>
                <td class="td-bottom">x</td>
                <td class="td-bottom">{{$pengajuan->luas}}</td>
                <td class="td-bottom">x</td>
                <td class="td-bottom">{{\App\HargaBangunan::round($pengajuan->getHargaBangunan->getFungsi->indeks * round($totalbobot,2) * $indekswaktu * $indeksjalan,2)}}</td>

                <!-- kode -->
                <td class="td-bottom">x</td>
                <td class="td-bottom">Rp. {{number_format($pengajuan->getHargaBangunan->harga)}}</td>
            </tr>
            <tr class="td-bottom">
                <td colspan="8" style="background: #f2dede;" class="td-bottom">Total Biaya Retribusi {{$pengajuan->getJenisImb->nama}} {{($pengajuan->getHargaBangunan->getFungsi->is_bertingkat == 0?"Tidak Bertingkat":"Bertingkat")}}</td>
                <td style="background: #f2dede;" class="td-bottom">Rp. {{ number_format((0.02 * $pengajuan->getJenisImb->indeks * $pengajuan->luas * \App\HargaBangunan::round($pengajuan->getHargaBangunan->getFungsi->indeks * round($totalbobot,2) * $indekswaktu * $indeksjalan,2) *  $pengajuan->getHargaBangunan->harga)) }}</td>
                <input type="hidden" name="jumlah_biaya" value="{{ (0.02 * $pengajuan->getJenisImb->indeks * $pengajuan->luas * \App\HargaBangunan::round($pengajuan->getHargaBangunan->getFungsi->indeks * round($totalbobot,2) * $indekswaktu * $indeksjalan,2) *  $pengajuan->getHargaBangunan->harga) }}">
            </tr>

          </tbody>
      </table>
</page>

<!-- //halaman 3 -->
<page backtop="15mm" backbottom="25mm" backleft="13mm" backright="25mm" style="font-size: 9pt" class="bodies">
	<h3>Perhitungan Retribusi Bangunan Prasarana Pendukung</h3>
	<table class="table-border-top-2" style="margin-left:10px;">
          <thead>
            <tr class="td-bottom" style="background: #d9edf7;">
              <th width="30%" colspan="2" class="td-bottom">Rumusan</th>
              <th width="10%" class="td-bottom">2%</th>
              <th width="3%" class="td-bottom">x</th>
              <th width="10%" class="td-bottom">Volume</th>
              <th width="3%" class="td-bottom">x</th>
              <th width="10%" class="td-bottom">Indeks Retribusi</th>
              <th width="3%" class="td-bottom">x</th>
              <th width="10%" class="td-bottom">Harga</th>
              <th width="3%" class="td-bottom">=</th>
              <th width="15%" class="td-bottom">Jumlah</th>
            </tr>
          </thead>
          <tbody>
          <!-- {{$jumlahPrasarana = 0}} -->
            @if(count($PengajuanPrasarana)>=1)
                @foreach($PengajuanPrasarana AS $d)
                  @if($d->volume > 0)
                    <!-- {{$warna = "background:#dff0d8;"}} -->
                  @else
                    <!-- {{$warna = ""}} -->
                  @endif
                  <tr class="td-bottom" style="{{$warna}}">
                      <td class="td-bottom">{{$d->getFungsi->nama}}</td>
                      <td class="td-bottom">{{$d->nama}}</td>
                      <td class="td-bottom">0.02</td>
                      <td class="td-bottom">x</td>
                      <td class="td-bottom">{{$d->volume}}</td>
                      <td class="td-bottom">x</td>
                      <td class="td-bottom">{{($d->id_jenis_imb_prasarana == 0?"-":$d->getJenisImb->indeks)}}</td>
                      <td class="td-bottom">x</td>
                      <td class="td-bottom">Rp. {{ ($d->id_harga_bangunan == 0?"-":number_format($d->getHargaBangunan->harga)) }}</td>
                      <td class="td-bottom">=</td>
                      <td class="td-bottom">Rp. {{ number_format(0.02 * $d->volume * ($d->id_jenis_imb_prasarana == 0?"1":$d->getJenisImb->indeks) * ($d->id_harga_bangunan == 0?"1":$d->getHargaBangunan->harga)) }}</td>
                      <!-- {{ $jumlahPrasarana = $jumlahPrasarana + (0.02 * $d->volume * ($d->id_jenis_imb_prasarana == 0?"1":$d->getJenisImb->indeks) * ($d->id_harga_bangunan == 0?"1":$d->getHargaBangunan->harga)) }} -->
                      <input type="hidden" name="jumlah_biaya_prasarana[{{$d->id}}]" value="{{(0.02 * $d->volume * ($d->id_jenis_imb_prasarana == 0?"1":$d->getJenisImb->indeks) * ($d->id_harga_bangunan == 0?"1":$d->getHargaBangunan->harga))}}"/>
                      
                  </tr>
                @endforeach
            @endif
            <input type="hidden" name="total_biaya_prasarana" value="{{$jumlahPrasarana}}"/>

            <tr>
              <td style="background: #f2dede;" colspan="10" class="td-bottom">Jumlah Biaya</td>
              <td style="background: #f2dede;" class="td-bottom">Rp. {{number_format($jumlahPrasarana)}}</td>
            </tr>
          </tbody>
      </table>
</page>

<!-- //halaman 4 -->
<page backtop="15mm" backbottom="25mm" backleft="13mm" backright="25mm" style="font-size: 9pt" class="bodies" orientation="portrait">
	<div style="width:100%;text-align:center;font-size: 11pt; margin-left:25px; text-decoration: "><b>LEMBAR KENDALI</b></div>
	<div style="width:100%;text-align:center;font-size: 11pt; margin-left:25px; text-decoration: "><b>PERSYARATAN TEKNIS</b></div>
	<div style="width:100%;text-align:center;font-size: 11pt; margin-left:25px; text-decoration: "><b>IMB</b></div>
	<br/>
	<table style="margin-left:25px;">
        <tr>
        	<td><strong>Tahun Pengajuan IMB</strong></td><td>:</td><td>{{$pengajuan->tahun}}</td>
        </tr>
        <tr>
        	<td><strong>NIK Pendaftar</strong></td><td>:</td><td>{{$pengajuan->nik}}</td>
        </tr>
        <tr>
        	<td><strong>Nama Pendaftar</strong></td><td>:</td><td>{{$pengajuan->nama}}</td>
        </tr>
        <tr>
        	<td><strong>Fungsi IMB</strong></td><td>:</td><td>{{$pengajuan->getHargaBangunan->getFungsi->nama}} - {{$pengajuan->getHargaBangunan->nama}}</td>
        </tr>
        <tr>
        	<td><strong>Deskripsi Bangunan</strong></td><td>:</td><td>{{$pengajuan->deskripsi_bangunan}}</td>
        </tr>
        <tr>
        	<td><strong>Lokasi </strong></td><td>:</td><td>{{$pengajuan->lokasi}}</td>
        </tr>
  	</table>

  	<br/>
	<table class="table-border-top-2" style="margin-left:25px;">
          <thead>
            <tr class="td-bottom" >
              <th width="50px">No</th>
              <th width="100px">Persyaratan Teknis</th>
              <th width="50px">Memenuhi</th>
              <th width="50px">Tidak <br/>Memenuhi</th>
              <th width="20px">Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <!-- {{ $no = 1 }} -->
            @foreach($PengajuanPersyaratan AS $d)
            <tr class="td-bottom">
              <td class="td-bottom" >{{$no}}</td>
              <td class="td-bottom" >{{$d->getPersyaratan->nama}}</td>
              

              @if($d->is_memenuhi == 1)
                <td class="td-bottom" align="center">
                    V
                </td>
              @else
                <td class="td-bottom" >-</td>
              @endif

              @if(empty($d->is_memenuhi))
                <td class="td-bottom" align="center">
                  V
                </td>
              @else
                <td class="td-bottom" >-</td>
              @endif

              <td class="td-bottom" >
                {!! wordwrap($d->keterangan,70,"<br/>") !!}
              </td>

            </tr>
            <!-- {{$no++}} -->
            @endforeach
          </tbody>
      </table>

      <br/>
      	<table style="margin-left:25px;">
	        <tr>
	        	<td style="font-size: 11pt; "><strong>Parameter</strong></td>
	        </tr>
    	</table>
      <br/>

      <table class="table-border-top-2" style="margin-left:25px;">
          <thead>
            <tr >
              <th width="10">No</th>
              <th width="100">Persyaratan Teknis</th>
              <th width="100">Hasil Survey Lapangan</th>
              <th width="270">Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <!-- {{ $no = 1 }} -->
            @foreach($PengajuanParameter AS $d)
            <tr class="td-bottom">
              <td class="td-bottom" >{{$no}}</td>
              <td class="td-bottom" >{{$d->getParameter->nama}}</td>
              
              <td class="td-bottom" >
                {!! $d->getParameterSurvey->nama !!}
              </td>

              <td class="td-bottom" >
                {!! wordwrap($d->keterangan,70,"<br/>") !!}
              </td>

            </tr>
            <!-- {{$no++}} -->
            @endforeach
          </tbody>
      </table>
      <br/>
      <br/>
		<div style="width:100%;text-align:center;font-size: 10pt; margin-left:25px; text-decoration: "><b>TIM PEMERIKSA</b></div>
		<div style="width:100%;text-align:center;font-size: 10pt; margin-left:25px; text-decoration: "><b>DINAS PUPR KAB. KARANGASEM</b></div>
      <br/>
      <table style="border: none; border-collapse: none; margin-left:25px;">
		<tr>
			<td width="280">
				<div style="width:100%;text-align:left;font-size: 12pt;" >  </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;">{{$pengajuan->getSurveyor1->nama}}</div>
				<div style="width:100%;text-align:left;font-size: 12pt;">NIP.{{$pengajuan->getSurveyor1->nip}}</div>
			</td>
			<td width="70">
				<div style="width:100%;text-align:left;font-size: 12pt;" >  </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
			</td>

			<td width="320">
				<div style="width:100%;text-align:left;font-size: 12pt;" > Amlapura,{{App\tanggalIndo::TanggalIndo(date('Y-m-d'))}} </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 12pt;">{{$pengajuan->getSurveyor2->nama}}</div>
				<div style="width:100%;text-align:left;font-size: 12pt;">NIP.{{$pengajuan->getSurveyor1->nip}}</div>
			</td>
		</tr>
	</table>

</page>

<!-- //halaman 4 -->
<page backtop="15mm" backbottom="25mm" backleft="13mm" backright="25mm" style="font-size: 9pt" class="bodies" orientation="portrait">

<table style="border: none; border-collapse: none; margin-left:20px;">
		<tr>
			<td width="420">
				<div style="width:100%;text-align:left;font-size: 8pt;" >  </div>
				<div style="width:100%;text-align:left;font-size: 8pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 8pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 8pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 8pt;" > </div>
				<div style="width:100%;text-align:left;font-size: 8pt;" > </div>
			</td>

			<td width="220">
				<div style="width:100%;text-align:left;font-size: 8pt;" > LAMPIRAN I</div>
				<div style="width:100%;text-align:left;font-size: 8pt;" > PERATURAN BUPATI KARANGASEM </div>
				<div style="width:100%;text-align:left;font-size: 8pt;" > NOMOR 56 TAHUN 2017</div>
				<div style="width:100%;text-align:left;font-size: 8pt;" > TENTANG</div>
				<div style="width:100%;text-align:left;font-size: 8pt;" > PETUNJUK PELAKSANAAN PERATURAN DAERAH NOMER 5 TAHUN 2012 TENTANG RETRIBUSI </div>
				<div style="width:100%;text-align:left;font-size: 8pt;" > IZIN MENDIRIKAN BANGUNAN</div>
			</td>
		</tr>
	</table>

	<br/>
	<div style="width:100%;text-align:center;font-size: 12pt; margin-left:25px; text-decoration: "><b>SURAT KETETAPAN RETRIBUSI DAERAH (SKRD)</b></div>
	<br/>

	<table class="table-border-top-2" style="margin-left:5px;">
	<tr class="td-bottom">
		<td width="50" class="td-bottom" style="border-right: none;" colspan="2">
			<img  src="{{URL('assets/img/logo.png')}}" style="width: 60px; height: 80px;" />
		</td>
		<td width="200" align="center" class="td-bottom" colspan="8">
			PEMERINTAH <br/>
			KABUPATEN KARANGASEM <br/>
			DINAS PEKERJAAN UMUM DAN PENATAAN RUANG
		</td>
		<td width="100" align="center" class="td-bottom">
			SURAT KETETAPAN <br/>
			RETRIBUSI DAERAH <br/>
			(SKRD)
		</td>
		<td width="125" align="center" class="td-bottom">
			NO. SKRD : 
		</td>
	</tr>
	<tr class="td-bottom">
		<td style="border:1px solid #000; border-bottom: none; border-right: none;" colspan="5"> MASA </td>
		
		<td  > : </td>
		<td  colspan="4"> </td>

		<td width="120" align="center" style="border:1px solid #000; border-bottom: none;">
			
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>
	<tr class="td-bottom" style="border-bottom: 1px solid #000;">
		<td style="border:1px solid #000; border-right: none;" colspan="5"> TAHUN </td>
		
		<td  style="border-bottom: 1px solid #000;"> : </td>
		<td  style="border-bottom: 1px solid #000;" colspan="4"> 2018 </td>

		<td width="120" align="center" style="border:1px solid #000; ">
			
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>


	<tr class="td-bottom">
		<td style="border:1px solid #000; border-bottom: none; border-right: none;" colspan="5"> NAMA </td>
		
		<td  > : </td>
		<td  colspan="4"> </td>

		<td width="120" align="center" style="border:1px solid #000; border-bottom: none;">
			
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>
	<tr class="td-bottom">
		<td style="border:1px solid #000; border-bottom: none; border-right: none;" colspan="5"> ALAMAT </td>
		
		<td  > : </td>
		<td  colspan="4"> </td>

		<td width="120" align="center" style="border:1px solid #000; border-bottom: none;">
			
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>
	<tr class="td-bottom">
		<td style="border:1px solid #000; border-bottom: none; border-right: none;" colspan="5">  </td>
		
		<td  > : </td>
		<td  colspan="4"> </td>

		<td width="120" align="center" style="border:1px solid #000; border-bottom: none;">
			
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>
	<tr class="td-bottom" style="border-bottom: 1px solid #000;">
		<td style="border:1px solid #000; border-right: none;" colspan="5"> TANGGAL JATUH TEMPO </td>
		
		<td style="border-bottom: 1px solid #000;" > : </td>
		<td style="border-bottom: 1px solid #000;" colspan="4"> </td>
		
		<td width="120" align="center" style="border:1px solid #000; ">
			
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>

	<tr class="td-bottom">
		<td width="50" class="td-bottom" style="border-right: none;" >
			
		</td>
		<td width="225" align="center" class="td-bottom" colspan="9">
			KODE REKENING <br/>
		</td>
		<td width="120" align="center" class="td-bottom">
			URAIAN RETRIBUSI
		</td>
		<td width="150" align="center" class="td-bottom">
			JUMLAH (Rp.)
		</td>
	</tr>
	<tr class="td-bottom" style="border-bottom: 1px solid #000;">
		<td class="td-bottom"> 1 </td>
		<td class="td-bottom"> 22 </td>
		<td class="td-bottom"> 1 </td>
		<td class="td-bottom"> 5 </td>
		<td class="td-bottom"> 0 </td>
		<td class="td-bottom"> 0 </td>
		<td class="td-bottom"> 2 </td>
		<td class="td-bottom"> 4 </td>
		<td class="td-bottom"> 5 </td>
		<td class="td-bottom"> 5 </td>
		<td width="120" align="center" style="border:1px solid #000; " align="left">
			RETRIBUSI <br/>
			0 <br/>
			0 <br/>
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>
	<tr class="td-bottom" >
		<td class="td-bottom"> 2 </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td width="120" align="center" style="border:1px solid #000; ">
			
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>
		<tr class="td-bottom" >
		<td class="td-bottom"> 3 </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td width="120" align="center" style="border:1px solid #000; ">
			
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>
	<tr class="td-bottom">
		<td class="td-bottom"> 4 </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td width="120" align="center" style="border:1px solid #000; ">
			
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>
	<tr class="td-bottom" >
		<td class="td-bottom"> 5 </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td class="td-bottom">  </td>
		<td width="120" align="center" style="border:1px solid #000; ">
			
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>
	<tr class="td-bottom" style="border-bottom: 1px solid #000;">
		<td class="td-bottom" rowspan="5">  </td>
		<td style="border-bottom: 1px solid #000; border-right: 1px solid #000;" colspan="9" rowspan="5">  </td>
		<td width="120" align="center" class="td-bottom" style="border-left: none;" align="left">
			Jumlah Ketetapan Retribusi:
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>
	<tr class="td-bottom" style="border-bottom: 1px solid #000;">
		<td width="120" align="center" class="td-bottom" style="border-left: none;" align="left">
			Jumlah Sanksi :
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>
	<tr class="td-bottom" style="border-bottom: 1px solid #000;">
		<td width="120" align="center" class="td-bottom" style="border-left: none;" align="left">
			a. Bunga
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>
	<tr class="td-bottom" style="border-bottom: 1px solid #000;">
		<td width="120" align="center" class="td-bottom" style="border-left: none;" align="left">
			b. Kenaikan
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			
		</td>
	</tr>
	<tr class="td-bottom" style="border-bottom: 1px solid #000;">
		<td width="120" align="center" class="td-bottom" style="border-left: none;" align="left">
			Jumlah Keseluruhan:
		</td>
		<td width="150" align="center" style="border:1px solid #000;">
			0.00
		</td>
	</tr>
	<tr class="td-bottom" style="border-bottom: 1px solid #000;">
		<td width="150" align="center" style="border:1px solid #000;" colspan="12" align="left">
			Dengan huruf:  
		</td>
	</tr>
	<tr class="td-bottom" style="border-bottom: 1px solid #000;">
		<td width="150" align="center" style="border:1px solid #000;" colspan="12" align="left">
			PERHATIAN:
		</td>
	</tr>
	<tr class="td-bottom" style="border-bottom: 1px solid #000;">
		<td width="150" align="center" style="border:1px solid #000;" colspan="12" align="left">
			1. Pembayaran dilakukan pada petugas penerima/bendahara penerimaan atau penyetoran ke rekening bendahara penerimaan pada Bank BPD Bali.
		</td>
	</tr>
	<tr class="td-bottom" style="border-bottom: 1px solid #000;">
		<td width="150" align="center" style="border:1px solid #000;" colspan="12" align="left">
			2. Apabila SKRD ini tidak atau kurang bayar lewat waktu paling lama 30 hari setelah SKRD diterima atau (tanggal jatuh tempo)
		</td>
	</tr>
	<tr class="td-bottom" style="border-bottom: 1px solid #000;">
		<td width="150" align="center" style="border:1px solid #000; border-bottom:none;" colspan="12" align="right">
			
		</td>
	</tr>
	<tr class="td-bottom" style="border-bottom: 1px solid #000;">
		<td width="150" align="center" style="border:1px solid #000;" colspan="12" align="left">
			<table>
				<tr>
					<td width="400"> </td>
					<td width="200">Amlapura, {{App\tanggalIndo::TanggalIndo(date('Y-m-d'))}}</td>
				</tr>
				<tr>
					<td width="400"> </td>
					<td width="200">Kepala Dinas Pekerjaan Umum </td>
				</tr>
				<tr>
					<td width="400"></td>
					<td width="200"> Dan Penataan Ruang Kabupaten Karangasem</td>
				</tr>
				<tr>
					<td width="400"> </td>
					<td width="200"> </td>
				</tr>
				<tr>
					<td width="400"> </td>
					<td width="200"> </td>
				</tr>
				<tr>
					<td width="400"> </td>
					<td width="200"> </td>
				</tr>
				<tr>
					<td width="400"> </td>
					<td width="200"> </td>
				</tr>
				<tr>
					<td width="400"> </td>
					<td width="200"> </td>
				</tr>
				<tr>
					<td width="400">  </td>
					<td width="200"> I Ketut Sedana Merta, ST., MT </td>
				</tr>
				<tr>
					<td width="400"> </td>
					<td width="200"> NIP. 19670120 199703 1 003</td>
				</tr>
			</table>
		</td>
	</tr>
	

	</table>

	<br/>
	<div style="width:100%;text-align:center;font-size: 10pt; margin-left:25px; text-decoration: ">.....................................................................potong disini...................................................................</div>
	<br/>

	<table class="table-border-top" style="margin-left:5px;">
		<tr>
			<td width="310" class="td-bottom">
				<table>
				<tr class="td-bottom">
					<td width="200">TANDA TERIMA </td>
				</tr>
				<tr class="td-bottom">
					<td width="200">NAMA      : </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> ALAMAT   :  </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> </td>
				</tr>
				<tr class="td-bottom">
					<td width="200">  </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> </td>
				</tr>
				</table>
			</td>
			<td width="310" class="td-bottom">
				<table>
				<tr class="td-bottom">
					<td width="200">NO. SKRD : </td>
				</tr>
				<tr class="td-bottom">
					<td width="200">Amlapura, {{App\tanggalIndo::TanggalIndo(date('Y-m-d'))}}</td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> Yang Menerima </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> ................................ </td>
				</tr>
				<tr class="td-bottom">
					<td width="200"> </td>
				</tr>
				</table>
			</td>
		</tr>
	</table>

</page>
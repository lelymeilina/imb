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
				<div style="width:100%;text-align:left;font-size: 12pt;">I Gusti Ayu Nyoman Sugianti, ST.,MT</div>
				<div style="width:100%;text-align:left;font-size: 12pt;">Pembina</div>
				<div style="width:100%;text-align:left;font-size: 12pt;">NIP.19750907 200003 2 004</div>
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
				<div style="width:100%;text-align:left;font-size: 12pt;">I Ketut Supatra,ST.,Msi</div>
				<div style="width:100%;text-align:left;font-size: 12pt;">Penata Tk. I</div>
				<div style="width:100%;text-align:left;font-size: 12pt;">NIP.19791109 200501 1 010</div>
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
				<div style="width:100%;text-align:left;font-size: 12pt;">I Kadek Purnawan, ST</div>
				<div style="width:100%;text-align:left;font-size: 12pt;">Penata Muda</div>
				<div style="width:100%;text-align:left;font-size: 12pt;">NIP.19891211 201403 1 002</div>
			</td>
		</tr>
	</table>


</page>




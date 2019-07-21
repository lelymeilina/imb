<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Datatables;
use App\Pengajuan;
use App\Pejabat;
use App\PengajuanPersyaratan;
use App\PengajuanParameter;
use App\PengajuanPrasarana;
use App\JenisImb;
use App\HargaBangunan;
use App\PersyaratanTeknis;
use App\PengajuanKdbKlb;
use App\KlasifikasiParameter;
use App\StatusPengajuan;
use App\Surveyor;
use HTML2PDF;

class PengajuanController extends Controller
{
    //
    //
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $jenisImb = JenisImb::where('flag_delete','=',0)->pluck('nama','id')->toArray();
        // $hargaBangunan = DB::table('m_harga_bangunan AS h')->where('h.flag_delete','=',0)
        // 								->join('m_fungsi AS f','f.id','=','h.id_fungsi')
        // 								->join('m_klasifikasi_bangunan AS k','k.id','=','h.id_klasifikasi')
        //                                 ->where('h.is_bangunan_tambahan','=',0)
        // 								->pluck(DB::raw('CONCAT(f.nama," - ",h.nama," - ",k.nama," - ",IF(h.is_bertingkat = 0,"Tidak Bertingkat","Bertingkat")) AS fungsi_klasifikasi'),'h.id');

        $jenisKlasifikasiBangunan = DB::table('m_jenis_klasifikasi_bangunan AS k')
                            ->join('m_jenis_bangunan AS j','j.id','=','k.id_jenis_bangunan')
                            ->join('m_fungsi AS f','f.id','=','j.id_fungsi')
                            ->join('m_klasifikasi_bangunan AS b','b.id','=','k.id_klasifikasi')
                            ->pluck(DB::raw('CONCAT(f.nama," - ",j.nama," - ",b.nama) AS fungsi_klasifikasi'),'k.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }
        // dd($tahun);
        return view('admin.pengajuan.index',compact('jenisImb','jenisKlasifikasiBangunan','tahun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
    	$no_urut = Pengajuan::where('id_jenis_imb','=',$request->id_jenis_imb)
    						->where('id_jenis_klasifikasi_bangunan','=',$request->id_jenis_klasifikasi_bangunan)
    						->count();

    	$no_urut = $no_urut+1;
    	$no_urut_new = sprintf("%04d", $no_urut);
    	$no_imb = sprintf("%02d",$request->id_jenis_imb);
    	$no_hb = sprintf("%03d",$request->id_jenis_klasifikasi_bangunan);
    	$no_registrasi = $request->tahun.$no_imb.$no_hb.$no_urut_new;

        $Pengajuan = new Pengajuan();
        $Pengajuan->no_registrasi = $no_registrasi;
        $Pengajuan->tahun = $request->tahun;
        $Pengajuan->id_jenis_identitas = $request->id_jenis_identitas;
        $Pengajuan->nik = $request->nik;
        $Pengajuan->nama = $request->nama;
        $Pengajuan->id_jenis_imb = $request->id_jenis_imb;
        $Pengajuan->id_jenis_klasifikasi_bangunan = $request->id_jenis_klasifikasi_bangunan;
        $Pengajuan->deskripsi_bangunan = $request->deskripsi_bangunan;
        $Pengajuan->lokasi = $request->lokasi;
        $Pengajuan->no_nib = $request->no_nib;
        $Pengajuan->latitude = $request->latitude;
        $Pengajuan->longitude = $request->longitude;
        $Pengajuan->save();

        $PersyaratanTeknis = PersyaratanTeknis::where('flag_delete','=','0')->get();
        $PengajuanPersyaratan = array();
        foreach ($PersyaratanTeknis as $d) {
        	# code...
        	$PengajuanPersyaratan['no_registrasi'] = $no_registrasi;
        	$PengajuanPersyaratan['id_pengajuan'] = $Pengajuan->id;
        	$PengajuanPersyaratan['id_persyaratan'] = $d->id;
        	PengajuanPersyaratan::updateOrCreate($PengajuanPersyaratan,$PengajuanPersyaratan);
        }


        $KlasifikasiParameter = KlasifikasiParameter::where('flag_delete','=','0')->get();
        $PengajuanParameter = array();
        foreach ($KlasifikasiParameter as $d) {
        	# code...
        	$PengajuanParameter['no_registrasi'] = $no_registrasi;
        	$PengajuanParameter['id_pengajuan'] = $Pengajuan->id;
        	$PengajuanParameter['id_klasifikasi_parameter'] = $d->id;
        	PengajuanParameter::updateOrCreate($PengajuanParameter,$PengajuanParameter);
        }

        $Prasarana = HargaBangunan::select('m_harga_bangunan.nama','m_harga_bangunan.satuan','f.id as id_fungsi')
                                    ->where('m_harga_bangunan.flag_delete','=','0')
                                    ->join('m_jenis_klasifikasi_bangunan AS k','k.id','=','m_harga_bangunan.id_klasifikasi_bangunan')
                                    ->join('m_jenis_bangunan AS j','j.id','=','k.id_jenis_bangunan')
                                    ->join('m_fungsi AS f','f.id','=','j.id_fungsi')
                                    ->where('m_harga_bangunan.is_bangunan_tambahan','=',1)
                                    ->groupBy('m_harga_bangunan.id_klasifikasi_bangunan')
                                    ->orderBy('m_harga_bangunan.id')
                                    ->get();
        $PengajuanPrasarana = array();
        //disini
        foreach ($Prasarana as $d) {
            # code...
            $PengajuanPrasarana['no_registrasi'] = $no_registrasi;
            $PengajuanPrasarana['id_pengajuan'] = $Pengajuan->id;
            $PengajuanPrasarana['id_fungsi'] = $d->id_fungsi;
            $PengajuanPrasarana['nama'] = $d->nama;
            $PengajuanPrasarana['satuan'] = $d->satuan;
            PengajuanPrasarana::updateOrCreate($PengajuanPrasarana,$PengajuanPrasarana);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    	$jenisImb = JenisImb::where('flag_delete','=',0)->pluck('nama','id')->toArray();
        $jenisKlasifikasiBangunan = DB::table('m_jenis_klasifikasi_bangunan AS k')
                            ->join('m_jenis_bangunan AS j','j.id','=','k.id_jenis_bangunan')
                            ->join('m_fungsi AS f','f.id','=','j.id_fungsi')
                            ->join('m_klasifikasi_bangunan AS b','b.id','=','k.id_klasifikasi')
                            ->pluck(DB::raw('CONCAT(f.nama," - ",j.nama," - ",b.nama) AS fungsi_klasifikasi'),'k.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }

        $pengajuan = Pengajuan::find($id);
        return view('admin.pengajuan.edit', compact('pengajuan','jenisImb','jenisKlasifikasiBangunan','tahun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $pengajuan = Pengajuan::find($id);
        $pengajuan->update($request->all());
    }

    public function hapus($id)
    {
        
        $pengajuan = Pengajuan::find($id);
        return view('admin.pengajuan.hapus', compact('pengajuan'));
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->flag_delete = "1";
        $pengajuan->save();
    }


        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getcetak($id)
    {
        $jenisImb = JenisImb::where('flag_delete','=',0)->pluck('nama','id')->toArray();
        $jenisKlasifikasiBangunan = DB::table('m_jenis_klasifikasi_bangunan AS k')
                            ->join('m_jenis_bangunan AS j','j.id','=','k.id_jenis_bangunan')
                            ->join('m_fungsi AS f','f.id','=','j.id_fungsi')
                            ->join('m_klasifikasi_bangunan AS b','b.id','=','k.id_klasifikasi')
                            ->pluck(DB::raw('CONCAT(f.nama," - ",j.nama," - ",b.nama) AS fungsi_klasifikasi'),'k.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }

        $pengajuan = Pengajuan::find($id);
        $pejabat = Pejabat::orderBy('id','DESC')->first();

        // dd($pejabat);


        return view('admin.pengajuan.getcetak', compact('pengajuan','jenisImb','jenisKlasifikasiBangunan','tahun','pejabat'));
    }


        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function surveyor($id)
    {
    	$jenisImb = JenisImb::where('flag_delete','=',0)->pluck('nama','id')->toArray();
        $jenisKlasifikasiBangunan = DB::table('m_jenis_klasifikasi_bangunan AS k')
                            ->join('m_jenis_bangunan AS j','j.id','=','k.id_jenis_bangunan')
                            ->join('m_fungsi AS f','f.id','=','j.id_fungsi')
                            ->join('m_klasifikasi_bangunan AS b','b.id','=','k.id_klasifikasi')
                            ->pluck(DB::raw('CONCAT(f.nama," - ",j.nama," - ",b.nama) AS fungsi_klasifikasi'),'k.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }

        $pengajuan = Pengajuan::find($id);

        $surveyor = Surveyor::where('flag_delete','=',0)->pluck('nama','id')->toArray();

        return view('admin.pengajuan.surveyor', compact('pengajuan','jenisImb','jenisKlasifikasiBangunan','tahun','surveyor'));
    }

    public function updatesurveyor(Request $request, $id)
    {
        //
        $pengajuan = Pengajuan::find($id);
        $pengajuan->update($request->all());
        $pengajuan = Pengajuan::find($id);
        $pengajuan->id_status_pengajuan = 2;
        $pengajuan->tgl_survey = date('Y-m-d',strtotime($request->tgl_survey));
        $pengajuan->save();
    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function persyaratan($id)
    {
    	$jenisImb = JenisImb::where('flag_delete','=',0)->pluck('nama','id')->toArray();
        $jenisKlasifikasiBangunan = DB::table('m_jenis_klasifikasi_bangunan AS k')
                            ->join('m_jenis_bangunan AS j','j.id','=','k.id_jenis_bangunan')
                            ->join('m_fungsi AS f','f.id','=','j.id_fungsi')
                            ->join('m_klasifikasi_bangunan AS b','b.id','=','k.id_klasifikasi')
                            ->pluck(DB::raw('CONCAT(f.nama," - ",j.nama," - ",b.nama) AS fungsi_klasifikasi'),'k.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }

        $pengajuan = Pengajuan::find($id);

        $kdb_klb = "";
        $kdb_klb .= "KDB Lama : ".$pengajuan->kdb_lama."&#13;&#10;";
        $kdb_klb .= "KLB Lama : ".$pengajuan->klb_lama."&#13;&#10;";
        $kdb_klb .= "KDB Baru : ".$pengajuan->kdb_baru."&#13;&#10;";
        $kdb_klb .= "KLB Baru : ".$pengajuan->klb_baru."&#13;&#10;";
        $kdb_klb .= "KDB Total : ".$pengajuan->total_kdb."&#13;&#10;";
        $kdb_klb .= "KLB Total : ".$pengajuan->total_klb."";

        $PengajuanPersyaratan = PengajuanPersyaratan::where('no_registrasi','=',$pengajuan->no_registrasi)->get();

        return view('admin.pengajuan.persyaratan', compact('pengajuan','jenisImb','jenisKlasifikasiBangunan','tahun','PengajuanPersyaratan','kdb_klb'));
    }


    public function updatepersyaratan(Request $request, $id)
    {
        //
        $pengajuan = Pengajuan::find($id);
        foreach ($request->keterangan as $key => $value) {
        	# code...
        	// echo $request->is_memenuhi[$key];
        	$PengajuanPersyaratan = PengajuanPersyaratan::where('no_registrasi','=',$pengajuan->no_registrasi)
        												->where('id_persyaratan','=',$key)
        												->update(['is_memenuhi'=>$request->is_memenuhi[$key],'keterangan'=>$value]);
        }
        // $pengajuan = Pengajuan::find($id);
        // $pengajuan->id_status_pengajuan = 3;
        // $pengajuan->save();
    }


    public function parameter($id)
    {
    	$jenisImb = JenisImb::where('flag_delete','=',0)->pluck('nama','id')->toArray();
        $jenisKlasifikasiBangunan = DB::table('m_jenis_klasifikasi_bangunan AS k')
                            ->join('m_jenis_bangunan AS j','j.id','=','k.id_jenis_bangunan')
                            ->join('m_fungsi AS f','f.id','=','j.id_fungsi')
                            ->join('m_klasifikasi_bangunan AS b','b.id','=','k.id_klasifikasi')
                            ->pluck(DB::raw('CONCAT(f.nama," - ",j.nama," - ",b.nama) AS fungsi_klasifikasi'),'k.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }

        $pengajuan = Pengajuan::find($id);
        $PengajuanParameter = PengajuanParameter::where('no_registrasi','=',$pengajuan->no_registrasi)->get();
        return view('admin.pengajuan.parameter', compact('pengajuan','jenisImb','jenisKlasifikasiBangunan','tahun','PengajuanParameter'));
    }

   	public function updateparameter(Request $request, $id)
    {
        //
        $pengajuan = Pengajuan::find($id);
        foreach ($request->keterangan as $key => $value) {
        	# code...
        	// echo $request->is_memenuhi[$key];
        	$PengajuanParameter = PengajuanParameter::where('no_registrasi','=',$pengajuan->no_registrasi)
        												->where('id_klasifikasi_parameter','=',$key)
        												->update(['id_klasifikasi_parameter_detail'=>$request->id_klasifikasi_parameter_detail[$key],'keterangan'=>$value]);
        }
        $pengajuan = Pengajuan::find($id);
        $pengajuan->luas_tidakbertingkat = str_replace(',','.',$request->luas_tidakbertingkat);
        $pengajuan->luas_bertingkat = str_replace(',','.',$request->luas_bertingkat);
        $pengajuan->luas_basement = str_replace(',','.',$request->luas_basement);
        // $pengajuan->luas_tanah = str_replace(',','.',$request->luas_tanah);
        // if($request->jenis_kdb_klb == 1){
        //     $i = 0;
        //     foreach ($request->hasil as $d) {
        //         # code...
        //         $PengajuanKdbKlb = new PengajuanKdbKlb();
        //         $PengajuanKdbKlb->id_pengajuan = $pengajuan->id;
        //         $PengajuanKdbKlb->no_registrasi = $pengajuan->no_registrasi;
        //         $PengajuanKdbKlb->is_hasil = $request->is_hasil[$i];
        //         $PengajuanKdbKlb->tidak_bertingkat = $request->tidak_bertingkat[$i];
        //         $PengajuanKdbKlb->bertingkat = $request->bertingkat[$i];
        //         $PengajuanKdbKlb->basement = $request->basement[$i];
        //         $PengajuanKdbKlb->hasil = $request->hasil[$i];
        //         $PengajuanKdbKlb->save();
        //         $i++;
        //     }
        //     $pengajuan->kdb = str_replace(',','.',$request->total_kdb);
        //     $pengajuan->klb = str_replace(',','.',$request->total_kdb);
        // }else{
        //     $pengajuan->kdb = str_replace(',','.',$request->kdb);
        //     $pengajuan->klb = str_replace(',','.',$request->kdb);
        //     $pengajuan->no_sk_kdb = $request->no_sk_kdb;
        //     $pengajuan->no_sk_klb = $request->no_sk_klb;

        // }
        // $pengajuan->jenis_kdb_klb = $request->jenis_kdb_klb;
        $pengajuan->kdb_lama = $request->kdb_lama;
        $pengajuan->klb_lama = $request->klb_lama;
        $pengajuan->kdb_baru = $request->kdb_baru;
        $pengajuan->klb_baru = $request->klb_baru;
        $pengajuan->total_klb = $request->total_klb;
        $pengajuan->total_kdb = $request->total_kdb;
        $pengajuan->id_status_pengajuan = 3;
        $pengajuan->save();
    }



    public function prasarana($id)
    {
        $jenisImb = JenisImb::where('flag_delete','=',0)->pluck('nama','id')->toArray();
        $jenisKlasifikasiBangunan = DB::table('m_jenis_klasifikasi_bangunan AS k')
                    ->join('m_jenis_bangunan AS j','j.id','=','k.id_jenis_bangunan')
                    ->join('m_fungsi AS f','f.id','=','j.id_fungsi')
                    ->join('m_klasifikasi_bangunan AS b','b.id','=','k.id_klasifikasi')
                    ->pluck(DB::raw('CONCAT(f.nama," - ",j.nama," - ",b.nama) AS fungsi_klasifikasi'),'k.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }

        $pengajuan = Pengajuan::find($id);
        $PengajuanPrasarana = PengajuanPrasarana::where('no_registrasi','=',$pengajuan->no_registrasi)->get();
        // echo "string"; exit;

        return view('admin.pengajuan.prasarana', compact('pengajuan','jenisImb','jenisKlasifikasiBangunan','tahun','PengajuanPrasarana'));
    }

    public function updateprasarana(Request $request, $id)
    {
        //
        $pengajuan = Pengajuan::find($id);
        foreach ($request->volume as $key => $value) {
            # code...
            // echo str_replace(',','.',$value);

            $PengajuanParameter = PengajuanPrasarana::where('no_registrasi','=',$pengajuan->no_registrasi)
                                                        ->where('id','=',$key)
                                                        ->update(['id_jenis_imb_prasarana'=>$request->id_jenis_imb_prasarana[$key],'id_harga_bangunan'=>$request->id_harga_bangunan[$key],'volume'=>str_replace(',','.',$value)]);
        }
    }


    public function perhitungan($id)
    {
        $jenisImb = JenisImb::where('flag_delete','=',0)->pluck('nama','id')->toArray();
        $jenisKlasifikasiBangunan = DB::table('m_jenis_klasifikasi_bangunan AS k')
                    ->join('m_jenis_bangunan AS j','j.id','=','k.id_jenis_bangunan')
                    ->join('m_fungsi AS f','f.id','=','j.id_fungsi')
                    ->join('m_klasifikasi_bangunan AS b','b.id','=','k.id_klasifikasi')
                    ->pluck(DB::raw('CONCAT(f.nama," - ",j.nama," - ",b.nama) AS fungsi_klasifikasi'),'k.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }

        $statusPengajuan = StatusPengajuan::where('flag_delete','=',0)->pluck('nama','id')->toArray();


        $pengajuan = Pengajuan::find($id);
        $PengajuanPersyaratan = PengajuanPersyaratan::where('no_registrasi','=',$pengajuan->no_registrasi)->get();
        $PengajuanParameter = PengajuanParameter::where('no_registrasi','=',$pengajuan->no_registrasi)->get();
        $PengajuanPrasarana = PengajuanPrasarana::where('no_registrasi','=',$pengajuan->no_registrasi)->get();

        return view('admin.pengajuan.perhitungan', compact('pengajuan','jenisImb','jenisKlasifikasiBangunan','tahun','PengajuanPrasarana','PengajuanParameter','PengajuanPersyaratan','statusPengajuan'));
    }

    public function updateperhitungan(Request $request, $id)
    {
        //

        // dd($request->all());
        foreach ($request->jumlah_biaya_prasarana as $key => $value) {
            # code...
            PengajuanPrasarana::where('id','=',$key)->update(['jumlah_biaya'=>$value]);
        }

        $pengajuan = Pengajuan::find($id);
        $pengajuan->id_status_pengajuan = $request->status_pengajuan_id;
        $pengajuan->jumlah_biaya = $request->jumlah_biaya;
        $pengajuan->jumlah_biaya_prasarana = $request->total_biaya_prasarana;
        $pengajuan->total_biaya_pembulatan = $request->total_biaya_pembulatan;
        $pengajuan->save();
    }
    

    public function cetak($id,Request $request)
    {
        $jenisImb = JenisImb::where('flag_delete','=',0)->pluck('nama','id')->toArray();
        $jenisKlasifikasiBangunan = DB::table('m_jenis_klasifikasi_bangunan AS k')
                            ->join('m_jenis_bangunan AS j','j.id','=','k.id_jenis_bangunan')
                            ->join('m_fungsi AS f','f.id','=','j.id_fungsi')
                            ->join('m_klasifikasi_bangunan AS b','b.id','=','k.id_klasifikasi')
                            ->pluck(DB::raw('CONCAT(f.nama," - ",j.nama," - ",b.nama) AS fungsi_klasifikasi'),'k.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }

        $statusPengajuan = StatusPengajuan::where('flag_delete','=',0)->pluck('nama','id')->toArray();


        $pengajuan = Pengajuan::find($id);
        $pengajuan->nip_kepala_bidang = $request->nip_kepala_bidang;
        $pengajuan->kepala_bidang = $request->kepala_bidang;
        $pengajuan->pangkat_kepala_bidang = $request->pangkat_kepala_bidang;
        $pengajuan->nip_kasi = $request->nip_kasi;
        $pengajuan->kasi = $request->kasi;
        $pengajuan->pangkat_kasi = $request->pangkat_kasi;
        $pengajuan->save();

        $Pejabat = new Pejabat();
        $Pejabat->nip_kepala_bidang = $request->nip_kepala_bidang;
        $Pejabat->kepala_bidang = $request->kepala_bidang;
        $Pejabat->pangkat_kepala_bidang = $request->pangkat_kepala_bidang;
        $Pejabat->nip_kasi = $request->nip_kasi;
        $Pejabat->kasi = $request->kasi;
        $Pejabat->pangkat_kasi = $request->pangkat_kasi;
        $Pejabat->save();

        $PengajuanPersyaratan = PengajuanPersyaratan::where('no_registrasi','=',$pengajuan->no_registrasi)->get();
        $PengajuanParameter = PengajuanParameter::where('no_registrasi','=',$pengajuan->no_registrasi)->get();
        $PengajuanPrasarana = PengajuanPrasarana::where('no_registrasi','=',$pengajuan->no_registrasi)->get();

        $terbilang = $this->terbilang(HargaBangunan::pembulatan($pengajuan->jumlah_biaya + $pengajuan->jumlah_biaya_prasarana));
        $width_in_mm = 210;
        $height_in_mm = 297;

        $data = $request;

        $html2pdf = new HTML2PDF('L',array($width_in_mm,$height_in_mm),'de',false,'UTF-8',array(0,0,0,0));
        $doc = view('admin.pengajuan.cetak', compact('pengajuan','jenisImb','hargaBangunan','tahun','PengajuanPrasarana','PengajuanParameter','PengajuanPersyaratan','statusPengajuan','terbilang','data'));


        // return $doc;

        $html2pdf->pdf->SetTitle('REKAPITULASI PERHITUNGAN BESARNYA RETRIBUSI IMB');
        // $html2pdf->addFont('timess','normal',default:timess);
        $html2pdf->setDefaultFont('Times');

        $html2pdf->writeHTML($doc,false);
        $html2pdf->Output('REKAPITULASI PERHITUNGAN BESARNYA RETRIBUSI IMB '.$pengajuan->nik.'.pdf');

    }

    public function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = $this->penyebut($nilai - 10). " Belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai/10)." Puluh". $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " Seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai/100) . " Ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " Seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai/1000) . " Ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai/1000000) . " Juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai/1000000000) . " Milyar" . $this->penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai/1000000000000) . " Trilyun" . $this->penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }

    public function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "Minus ". trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }           
        return $hasil;
    }

    public function getData(Request $request){

        // DB::statement(DB::raw('set @rownum = 0'));
        // $data = DB::table('t_pengajuan As a')
        // ->join('m_harga_bangunan AS b','b.id','=','a.id_harga_bangunan')
        // ->join('m_status_pengajuan AS c','c.id','=','a.id_status_pengajuan')
        // ->leftjoin('m_surveyor AS d','d.id','=','a.id_surveyor_1')
        // ->leftjoin('m_surveyor AS e','e.id','=','a.id_surveyor_2')
        // ->join('m_jenis_imb AS f','f.id','=','a.id_jenis_imb')
        // ->join('m_fungsi AS g','g.id','=','b.id_fungsi')
        // ->join('m_klasifikasi_bangunan AS h','h.id','=','b.id_klasifikasi')
        // ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'a.id','a.tahun','a.nik','a.nama','f.nama AS jenis_imb',DB::raw('CONCAT(g.nama," - ",b.nama," - ",h.nama," - ",IF(b.is_bertingkat = 0,"Tidak Bertingkat","Bertingkat")) AS fungsi_klasifikasi'),DB::raw('if(a.id_surveyor_1 = 0,"Belum Ada Survey",CONCAT("1. ",d.nama,"<br/> 2. ",e.nama)) As surveyor'),DB::raw('CONCAT(\'<small><span class="\',c.label,\'">\',c.nama,"</span></small>") as status_pengajuan')])
        // ->where('a.flag_delete','=','0')
        // ->orderBy('a.id','DESC');
        //debug($data);

        DB::statement(DB::raw('set @rownum = 0'));
        $data = DB::table('t_pengajuan As a')
        ->join('m_jenis_klasifikasi_bangunan AS b','b.id','=','a.id_jenis_klasifikasi_bangunan')
        ->join('m_status_pengajuan AS c','c.id','=','a.id_status_pengajuan')
        ->leftjoin('m_surveyor AS d','d.id','=','a.id_surveyor_1')
        ->leftjoin('m_surveyor AS e','e.id','=','a.id_surveyor_2')
        ->join('m_jenis_imb AS f','f.id','=','a.id_jenis_imb')
        ->join('m_jenis_bangunan AS j','j.id','=','b.id_jenis_bangunan')
        ->join('m_fungsi AS g','g.id','=','j.id_fungsi')
        ->join('m_klasifikasi_bangunan AS h','h.id','=','b.id_klasifikasi')
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'a.id','a.tahun','a.nik','a.nama','f.nama AS jenis_imb',DB::raw('CONCAT(g.nama," - ",j.nama," - ",h.nama) AS fungsi_klasifikasi'),DB::raw('if(a.id_surveyor_1 = 0,"Belum Ada Survey",CONCAT("1. ",d.nama,"<br/> 2. ",e.nama)) As surveyor'),DB::raw('CONCAT(\'<small><span class="\',c.label,\'">\',c.nama,"</span></small>") as status_pengajuan')])
        ->where('a.flag_delete','=','0')
        ->orderBy('a.id','DESC');

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
            $datatables->filterColumn('fungsi_klasifikasi', 'whereRaw', 'CONCAT(g.nama," - ",h.nama," - ",IF(b.is_bertingkat = 0,"Tidak Bertingkat","Bertingkat")) like ?', ["%{$keyword}%"]);
            $datatables->filterColumn('surveyor', 'whereRaw', 'if(a.id_surveyor_1 = 0,"Belum Ada Survey",CONCAT("1. ",d.nama,"<br/> 2. ",e.nama)) like ?', ["%{$keyword}%"]);
        }

        return $datatables
        ->addcolumn('action','<a title="Edit Data" href="#" data-toggle="modal" data-target="#modalubahpengajuan" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-edit"></span></span></a> &nbsp; <a title="Penentuan Surveyor" href="#" data-toggle="modal" data-target="#modalsetsurveyor" data-id="{!! $id !!}" ><span class="label label-warning"><span class="fa fa-user"></span></span></a> &nbsp; <a title="Isi Survey" href="#" data-toggle="modal" data-target="#modalisisurvey" data-id="{!! $id !!}" ><span class="label label-success"><span class="fa fa-bar-chart"></span></span></a> &nbsp; <a title="Cek Persyaratan" href="#" data-toggle="modal" data-target="#modalcekpersyaratan" data-id="{!! $id !!}" ><span class="label label-primary"><span class="fa fa-check-square"></span></span></a> &nbsp; <a title="Tambah Prasarana" href="#" data-toggle="modal" data-target="#modaltambahprasarana" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-plus"></span></span></a> &nbsp; <a title="Hapus Data" href="#" data-toggle="modal" data-target="#modalhapuspengajuan" data-id="{!! $id !!}" ><span class="label label-danger"><span class="fa fa-trash"></span></span> </a> &nbsp; <a title="Proses Penilaian" href="#" data-toggle="modal" data-target="#modalperhitungan" data-id="{!! $id !!}" ><span class="label label-success"><span class="fa fa-cog"></span></span> </a> &nbsp; <a title="Cetak Rekapitulasi" href="#" data-toggle="modal" data-target="#modalcetak" data-href="{{URL(\'admin/pengajuan/\')}}/{!! $id !!}/cetak" data-id="{!! $id !!}" ><span class="label label-warning"><span class="fa fa-print"></span></span> </a>')
        ->make(true);
	}
}

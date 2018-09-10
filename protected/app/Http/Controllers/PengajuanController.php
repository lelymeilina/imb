<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Datatables;
use App\Pengajuan;
use App\PengajuanPersyaratan;
use App\PengajuanParameter;
use App\PengajuanPrasarana;
use App\JenisImb;
use App\HargaBangunan;
use App\PersyaratanTeknis;
use App\KlasifikasiParameter;
use App\Surveyor;

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
        $hargaBangunan = DB::table('m_harga_bangunan AS h')->where('h.flag_delete','=',0)
        								->join('m_fungsi AS f','f.id','=','h.id_fungsi')
        								->join('m_klasifikasi_bangunan AS k','k.id','=','h.id_klasifikasi')
        								->pluck(DB::raw('CONCAT(f.nama," - ",k.nama," - ",IF(h.is_bertingkat = 0,"Tidak Bertingkat","Bertingkat")) AS fungsi_klasifikasi'),'h.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }
        // dd($tahun);
        return view('admin.pengajuan.index',compact('jenisImb','hargaBangunan','tahun'));
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
    						->where('id_harga_bangunan','=',$request->id_harga_bangunan)
    						->count();

    	$no_urut = $no_urut+1;
    	$no_urut_new = sprintf("%04d", $no_urut);
    	$no_imb = sprintf("%02d",$request->id_jenis_imb);
    	$no_hb = sprintf("%03d",$request->id_harga_bangunan);
    	$no_registrasi = $request->tahun.$no_imb.$no_hb.$no_urut_new;

        $Pengajuan = new Pengajuan();
        $Pengajuan->no_registrasi = $no_registrasi;
        $Pengajuan->tahun = $request->tahun;
        $Pengajuan->nik = $request->nik;
        $Pengajuan->nama = $request->nama;
        $Pengajuan->id_jenis_imb = $request->id_jenis_imb;
        $Pengajuan->id_harga_bangunan = $request->id_harga_bangunan;
        $Pengajuan->deskripsi_bangunan = $request->deskripsi_bangunan;
        $Pengajuan->lokasi = $request->lokasi;
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

        $Prasarana = HargaBangunan::where('flag_delete','=','0')->where('is_bangunan_tambahan','=',1)->groupBy('nama')->orderBy('id')->get();
        $PengajuanPrasarana = array();
        //disini

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
        $hargaBangunan = DB::table('m_harga_bangunan AS h')->where('h.flag_delete','=',0)
        								->join('m_fungsi AS f','f.id','=','h.id_fungsi')
        								->join('m_klasifikasi_bangunan AS k','k.id','=','h.id_klasifikasi')
        								->pluck(DB::raw('CONCAT(f.nama," - ",k.nama," - ",IF(h.is_bertingkat = 0,"Tidak Bertingkat","Bertingkat")) AS fungsi_klasifikasi'),'h.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }

        $pengajuan = Pengajuan::find($id);
        return view('admin.pengajuan.edit', compact('pengajuan','jenisImb','hargaBangunan','tahun'));
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
    public function surveyor($id)
    {
    	$jenisImb = JenisImb::where('flag_delete','=',0)->pluck('nama','id')->toArray();
        $hargaBangunan = DB::table('m_harga_bangunan AS h')->where('h.flag_delete','=',0)
        								->join('m_fungsi AS f','f.id','=','h.id_fungsi')
        								->join('m_klasifikasi_bangunan AS k','k.id','=','h.id_klasifikasi')
        								->pluck(DB::raw('CONCAT(f.nama," - ",k.nama," - ",IF(h.is_bertingkat = 0,"Tidak Bertingkat","Bertingkat")) AS fungsi_klasifikasi'),'h.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }

        $pengajuan = Pengajuan::find($id);

        $surveyor = Surveyor::where('flag_delete','=',0)->pluck('nama','id')->toArray();

        return view('admin.pengajuan.surveyor', compact('pengajuan','jenisImb','hargaBangunan','tahun','surveyor'));
    }

    public function updatesurveyor(Request $request, $id)
    {
        //
        $pengajuan = Pengajuan::find($id);
        $pengajuan->update($request->all());
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
        $hargaBangunan = DB::table('m_harga_bangunan AS h')->where('h.flag_delete','=',0)
        								->join('m_fungsi AS f','f.id','=','h.id_fungsi')
        								->join('m_klasifikasi_bangunan AS k','k.id','=','h.id_klasifikasi')
        								->pluck(DB::raw('CONCAT(f.nama," - ",k.nama," - ",IF(h.is_bertingkat = 0,"Tidak Bertingkat","Bertingkat")) AS fungsi_klasifikasi'),'h.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }

        $pengajuan = Pengajuan::find($id);

        $PengajuanPersyaratan = PengajuanPersyaratan::where('no_registrasi','=',$pengajuan->no_registrasi)->get();

        return view('admin.pengajuan.persyaratan', compact('pengajuan','jenisImb','hargaBangunan','tahun','PengajuanPersyaratan'));
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
    }


    public function parameter($id)
    {
    	$jenisImb = JenisImb::where('flag_delete','=',0)->pluck('nama','id')->toArray();
        $hargaBangunan = DB::table('m_harga_bangunan AS h')->where('h.flag_delete','=',0)
        								->join('m_fungsi AS f','f.id','=','h.id_fungsi')
        								->join('m_klasifikasi_bangunan AS k','k.id','=','h.id_klasifikasi')
        								->pluck(DB::raw('CONCAT(f.nama," - ",k.nama," - ",IF(h.is_bertingkat = 0,"Tidak Bertingkat","Bertingkat")) AS fungsi_klasifikasi'),'h.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }

        $pengajuan = Pengajuan::find($id);
        $PengajuanParameter = PengajuanParameter::where('no_registrasi','=',$pengajuan->no_registrasi)->get();
        return view('admin.pengajuan.parameter', compact('pengajuan','jenisImb','hargaBangunan','tahun','PengajuanParameter'));
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
    }



    public function prasarana($id)
    {
        $jenisImb = JenisImb::where('flag_delete','=',0)->pluck('nama','id')->toArray();
        $hargaBangunan = DB::table('m_harga_bangunan AS h')->where('h.flag_delete','=',0)
                                        ->join('m_fungsi AS f','f.id','=','h.id_fungsi')
                                        ->join('m_klasifikasi_bangunan AS k','k.id','=','h.id_klasifikasi')
                                        ->pluck(DB::raw('CONCAT(f.nama," - ",k.nama," - ",IF(h.is_bertingkat = 0,"Tidak Bertingkat","Bertingkat")) AS fungsi_klasifikasi'),'h.id');
        for($i=date('Y')+1; $i>=date('Y')-1; $i--){
            // $tahuns = $i+1;
            // $tahun[$i]=$i.'/'.$tahuns;
            $tahun[$i]=$i;
        }

        $pengajuan = Pengajuan::find($id);
        $PengajuanPrasarana = PengajuanPrasarana::where('no_registrasi','=',$pengajuan->no_registrasi)->get();

        return view('admin.pengajuan.prasarana', compact('pengajuan','jenisImb','hargaBangunan','tahun','PengajuanPrasarana'));
    }

    public function updateprasarana(Request $request, $id)
    {
        //
        $pengajuan = Pengajuan::find($id);
        foreach ($request->volume as $key => $value) {
            # code...
            // echo $request->is_memenuhi[$key];
            $PengajuanParameter = PengajuanPrasarana::where('no_registrasi','=',$pengajuan->no_registrasi)
                                                        ->where('id','=',$key)
                                                        ->update(['id_jenis_imb'=>$request->id_jenis_imb[$key],'id_harga_bangunan'=>$request->id_harga_bangunan[$key],'volume'=>$value]);
        }
    }



    
    
    public function getData(Request $request){

        DB::statement(DB::raw('set @rownum = 0'));
        $data = DB::table('t_pengajuan As a')
        ->join('m_harga_bangunan AS b','b.id','=','a.id_harga_bangunan')
        ->join('m_status_pengajuan AS c','c.id','=','a.id_status_pengajuan')
        ->leftjoin('m_surveyor AS d','d.id','=','a.id_surveyor_1')
        ->leftjoin('m_surveyor AS e','e.id','=','a.id_surveyor_2')
        ->join('m_jenis_imb AS f','f.id','=','a.id_jenis_imb')
        ->join('m_fungsi AS g','g.id','=','b.id_fungsi')
        ->join('m_klasifikasi_bangunan AS h','h.id','=','b.id_klasifikasi')
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'a.id','a.tahun','a.nik','a.nama','f.nama AS jenis_imb',DB::raw('CONCAT(g.nama," - ",h.nama," - ",IF(b.is_bertingkat = 0,"Tidak Bertingkat","Bertingkat")) AS fungsi_klasifikasi'),DB::raw('if(a.id_surveyor_1 = 0,"Belum Ada Survey",CONCAT("1. ",d.nama,"<br/> 2. ",e.nama)) As surveyor'),DB::raw('CONCAT(\'<small><span class="\',c.label,\'">\',c.nama,"</span></small>") as status_pengajuan')])
        ->where('a.flag_delete','=','0');
        //debug($data);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
            $datatables->filterColumn('fungsi_klasifikasi', 'whereRaw', 'CONCAT(g.nama," - ",h.nama," - ",IF(b.is_bertingkat = 0,"Tidak Bertingkat","Bertingkat")) like ?', ["%{$keyword}%"]);
            $datatables->filterColumn('surveyor', 'whereRaw', 'if(a.id_surveyor_1 = 0,"Belum Ada Survey",CONCAT("1. ",d.nama,"<br/> 2. ",e.nama)) like ?', ["%{$keyword}%"]);
        }

        return $datatables
        ->addcolumn('action','<a title="Edit Data" href="#" data-toggle="modal" data-target="#modalubahpengajuan" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-edit"></span></span></a> &nbsp; <a title="Penentuan Surveyor" href="#" data-toggle="modal" data-target="#modalsetsurveyor" data-id="{!! $id !!}" ><span class="label label-warning"><span class="fa fa-user"></span></span></a> &nbsp; <a title="Cek Persyaratan" href="#" data-toggle="modal" data-target="#modalcekpersyaratan" data-id="{!! $id !!}" ><span class="label label-primary"><span class="fa fa-check-square"></span></span></a> &nbsp; <a title="Isi Survey" href="#" data-toggle="modal" data-target="#modalisisurvey" data-id="{!! $id !!}" ><span class="label label-success"><span class="fa fa-bar-chart"></span></span></a> &nbsp; <a title="Tambah Prasarana" href="#" data-toggle="modal" data-target="#modaltambahprasarana" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-plus"></span></span></a> &nbsp; <a title="Hapus Data" href="#" data-toggle="modal" data-target="#modalhapuspengajuan" data-id="{!! $id !!}" ><span class="label label-danger"><span class="fa fa-trash"></span></span> </a>')
        ->make(true);
	}
}

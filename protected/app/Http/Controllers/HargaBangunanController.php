<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Datatables;
use App\HargaBangunan;
use App\Fungsi;
use App\KlasifikasiBangunan;



class HargaBangunanController extends Controller
{
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
        // $kb = KlasifikasiBangunan::where('flag_delete','=','0')->pluck('nama','id')->toArray();
        // $fungsi = Fungsi::where('flag_delete','=','0')->pluck('nama','id')->toArray();
        $kb = DB::table('m_jenis_klasifikasi_bangunan AS k')
                            ->join('m_jenis_bangunan AS j','j.id','=','k.id_jenis_bangunan')
                            ->join('m_fungsi AS f','f.id','=','j.id_fungsi')
                            ->join('m_klasifikasi_bangunan AS b','b.id','=','k.id_klasifikasi')
                            ->pluck(DB::raw('CONCAT(f.nama," - ",j.nama," - ",b.nama) AS fungsi_klasifikasi'),'k.id');

        return view('admin.hargabangunan.index',compact('kb'));
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

        $hargabangunan = new HargaBangunan();
        // $hargabangunan->id_fungsi = $request->id_fungsi;
        $hargabangunan->nama = $request->nama;
        $hargabangunan->id_klasifikasi_bangunan = $request->id_klasifikasi_bangunan;
        $hargabangunan->is_bertingkat = $request->is_bertingkat;
        $hargabangunan->is_bangunan_tambahan = $request->is_bangunan_tambahan;
        $hargabangunan->harga = str_replace('.','',$request->harga);
        $hargabangunan->flag_delete = 0;
        $hargabangunan->save();
        
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
        // $kb = KlasifikasiBangunan::where('flag_delete','=','0')->pluck('nama','id')->toArray();
        // $fungsi = Fungsi::where('flag_delete','=','0')->pluck('nama','id')->toArray();
        $kb = DB::table('m_jenis_klasifikasi_bangunan AS k')
                    ->join('m_jenis_bangunan AS j','j.id','=','k.id_jenis_bangunan')
                    ->join('m_fungsi AS f','f.id','=','j.id_fungsi')
                    ->join('m_klasifikasi_bangunan AS b','b.id','=','k.id_klasifikasi')
                    ->pluck(DB::raw('CONCAT(f.nama," - ",j.nama," - ",b.nama) AS fungsi_klasifikasi'),'k.id');
        $hargabangunan = HargaBangunan::find($id);
        return view('admin.hargabangunan.edit', compact('hargabangunan','kb'));
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
        
        $hargabangunan = HargaBangunan::find($id);
        // $hargabangunan->id_fungsi = $request->id_fungsi;
        $hargabangunan->nama = $request->nama;
        $hargabangunan->id_klasifikasi_bangunan = $request->id_klasifikasi_bangunan;
        $hargabangunan->is_bertingkat = $request->is_bertingkat;
        $hargabangunan->is_bangunan_tambahan = $request->is_bangunan_tambahan;
        $hargabangunan->harga = str_replace('.','',$request->harga);
        $hargabangunan->save();
    }

    public function hapus($id)
    {
        
        $hargabangunan = HargaBangunan::find($id);
        return view('admin.hargabangunan.hapus', compact('hargabangunan'));
    }

    public function destroy($id)
    {
        $hargabangunan = HargaBangunan::find($id);
        $hargabangunan->flag_delete = "1";
        $hargabangunan->save();
    }
    
    
    public function getData(Request $request){

        DB::statement(DB::raw('set @rownum = 0'));
        $data = DB::table('m_harga_bangunan As a')
        ->join('m_jenis_klasifikasi_bangunan as b','b.id','=','a.id_klasifikasi_bangunan')
        ->join('m_klasifikasi_bangunan as c','c.id','=','b.id_klasifikasi')
        ->join('m_jenis_bangunan as d','d.id','=','b.id_jenis_bangunan')
        ->join('m_fungsi as e','e.id','=','d.id_fungsi')
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'a.id','a.nama as nama','e.nama as id_fungsi','c.nama as id_klasifikasi','a.is_bangunan_tambahan as bangunan','a.is_bertingkat as bertingkat','a.harga'])
        ->where('a.flag_delete','=','0');
        //debug($data);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);

        }

        return $datatables
        ->addcolumn('action','<a title="Edit Data" href="#" data-toggle="modal" data-target="#modalubahhargabangunan" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-edit"></span></span></a> <a title="Hapus Data" href="#" data-toggle="modal" data-target="#modalhapushargabangunan" data-id="{!! $id !!}" ><span class="label label-danger"><span class="fa fa-trash"></span></span> </a>')
          ->editcolumn('bangunan','@if($bangunan == 0)
                                        <span class="label" style="background-color:#138abb;"> Bangunan Utama </span>
                                     @else
                                        <span class="label" style="background-color:#018c6d;"> Bangunan Prasarana </span>
                                     @endif')
         ->editcolumn('bertingkat','@if($bertingkat == 0)
                                        <span class="label" style="background-color:#cf2200;"> Tidak Bertingkat </span>
                                     @else
                                        <span class="label" style="background-color:#da8000;"> Bertingkat </span>
                                     @endif')
        ->editcolumn('harga','{{number_format($harga)}}')
        ->make(true);
    }
}

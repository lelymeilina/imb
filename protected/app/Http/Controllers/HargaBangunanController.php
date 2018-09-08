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
        $kb = KlasifikasiBangunan::where('flag_delete','=','0')->pluck('nama','id')->toArray();
        $fungsi = Fungsi::where('flag_delete','=','0')->pluck('nama','id')->toArray();
        return view('admin.hargabangunan.index',compact('kb','fungsi'));
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
        $hargabangunan->id_fungsi = $request->id_fungsi;
        $hargabangunan->id_klasifikasi = $request->id_klasifikasi;
        $hargabangunan->is_bertingkat = $request->is_bertingkat;
        $hargabangunan->is_bangunan_tambahan = $request->is_bangunan_tambahan;
        $hargabangunan->harga = $request->harga;
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
        $kb = KlasifikasiBangunan::where('flag_delete','=','0')->pluck('nama','id')->toArray();
        $fungsi = Fungsi::where('flag_delete','=','0')->pluck('nama','id')->toArray();
        $hargabangunan = HargaBangunan::find($id);
        return view('admin.hargabangunan.edit', compact('hargabangunan','kb','fungsi'));
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
        $hargabangunan->id_fungsi = $request->id_fungsi;
        $hargabangunan->id_klasifikasi = $request->id_klasifikasi;
        $hargabangunan->is_bertingkat = $request->is_bertingkat;
        $hargabangunan->is_bangunan_tambahan = $request->is_bangunan_tambahan;
        $hargabangunan->harga = $request->harga;
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
        ->join('m_klasifikasi_bangunan as b','b.id','=','a.id_klasifikasi')
        ->join('m_fungsi as c','c.id','=','a.id_fungsi')
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'a.id','c.nama as id_fungsi','b.nama as id_klasifikasi',DB::raw('if(a.is_bangunan_tambahan=0,"Bangunan Tambahan","Bangunan Pendukung") as bangunan'),DB::raw('if(a.is_bertingkat=0,"Tidak Bertingkat","Bertingkat") as bertingkat'),'a.harga'])
        ->where('a.flag_delete','=','0');
        //debug($data);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);

        }

        return $datatables
        ->addcolumn('action','<a title="Edit Data" href="#" data-toggle="modal" data-target="#modalubahhargabangunan" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-edit"></span></span></a> &nbsp; <a title="Hapus Data" href="#" data-toggle="modal" data-target="#modalhapushargabangunan" data-id="{!! $id !!}" ><span class="label label-danger"><span class="fa fa-trash"></span></span> </a>')
        ->make(true);
    }
}

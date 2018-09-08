<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Datatables;
use App\KlasifikasiBangunan;

class KlasifikasiBangunanController extends Controller
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
        return view('admin.klasifikasibangunan.index');
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

        $klasifikasibangunan = new KlasifikasiBangunan();
        $klasifikasibangunan->nama = $request->nama;
        $klasifikasibangunan->is_bangunan_tambahan = $request->is_bangunan_tambahan;
        $klasifikasibangunan->flag_delete = 0;
        $klasifikasibangunan->save();
        
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
        $klasifikasibangunan = KlasifikasiBangunan::find($id);
        return view('admin.klasifikasibangunan.edit', compact('klasifikasibangunan'));
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
        
        $klasifikasibangunan = KlasifikasiBangunan::find($id);
        $klasifikasibangunan->nama = $request->nama;
        $klasifikasibangunan->indeks = $request->indeks;
        $klasifikasibangunan->save();
    }

    public function hapus($id)
    {
        
        $klasifikasibangunan = KlasifikasiBangunan::find($id);
        return view('admin.klasifikasibangunan.hapus', compact('klasifikasibangunan'));
    }

    public function destroy($id)
    {
        $klasifikasibangunan = KlasifikasiBangunan::find($id);
        $klasifikasibangunan->flag_delete = "1";
        $klasifikasibangunan->save();
    }
    
    
    public function getData(Request $request){

        DB::statement(DB::raw('set @rownum = 0'));
        $data = DB::table('m_klasifikasi_bangunan As a')
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'a.id','a.nama',DB::raw('if(a.is_bangunan_tambahan=0,"Bangunan Tambahan","Bangunan Pendukung") as bangunan')])
        ->where('a.flag_delete','=','0');
        //debug($data);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);

        }

        return $datatables
        ->addcolumn('action','<a title="Edit Data" href="#" data-toggle="modal" data-target="#modalubahklasifikasibangunan" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-edit"></span></span></a> &nbsp; <a title="Hapus Data" href="#" data-toggle="modal" data-target="#modalhapusklasifikasibangunan" data-id="{!! $id !!}" ><span class="label label-danger"><span class="fa fa-trash"></span></span> </a>')
        ->make(true);
    }
}

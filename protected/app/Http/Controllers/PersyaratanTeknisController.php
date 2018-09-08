<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Datatables;
use App\PersyaratanTeknis;

class PersyaratanTeknisController extends Controller
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
        return view('admin.persyaratanteknis.index');
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

        $persyaratanteknis = new PersyaratanTeknis();
        $persyaratanteknis->nama = $request->nama;
        $persyaratanteknis->flag_delete = 0;
        $persyaratanteknis->save();
        
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
        $persyaratanteknis = PersyaratanTeknis::find($id);
        return view('admin.persyaratanteknis.edit', compact('persyaratanteknis'));
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
        
        $persyaratanteknis = PersyaratanTeknis::find($id);
        $persyaratanteknis->nama = $request->nama;
        $persyaratanteknis->save();
    }

    public function hapus($id)
    {
        
        $persyaratanteknis = PersyaratanTeknis::find($id);
        return view('admin.persyaratanteknis.hapus', compact('persyaratanteknis'));
    }

    public function destroy($id)
    {
        $persyaratanteknis = PersyaratanTeknis::find($id);
        $persyaratanteknis->flag_delete = "1";
        $persyaratanteknis->save();
    }
    
    
    public function getData(Request $request){

        DB::statement(DB::raw('set @rownum = 0'));
        $data = DB::table('m_persyaratan_teknis As a')
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'a.id','a.nama'])
        ->where('a.flag_delete','=','0');
        //debug($data);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);

        }

        return $datatables
        ->addcolumn('action','<a title="Edit Data" href="#" data-toggle="modal" data-target="#modalubahpersyaratanteknis" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-edit"></span></span></a> &nbsp; <a title="Hapus Data" href="#" data-toggle="modal" data-target="#modalhapuspersyaratanteknis" data-id="{!! $id !!}" ><span class="label label-danger"><span class="fa fa-trash"></span></span> </a>')
        ->make(true);
    }
}

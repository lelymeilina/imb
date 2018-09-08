<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Datatables;
use App\JenisImb;

class JenisImbController extends Controller
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
        return view('admin.jenisimb.index');
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

        $jenisimb = new JenisImb();
        $jenisimb->nama = $request->nama;
        $jenisimb->indeks = $request->indeks;
        $jenisimb->flag_delete = 0;
        $jenisimb->save();
        
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
        $jenisimb = JenisImb::find($id);
        return view('admin.jenisimb.edit', compact('jenisimb'));
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
        
        $jenisimb = JenisImb::find($id);
        $jenisimb->nama = $request->nama;
        $jenisimb->indeks = $request->indeks;
        $jenisimb->save();
    }

    public function hapus($id)
    {
        
        $jenisimb = JenisImb::find($id);
        return view('admin.jenisimb.hapus', compact('jenisimb'));
    }

    public function destroy($id)
    {
        $jenisimb = JenisImb::find($id);
        $jenisimb->flag_delete = "1";
        $jenisimb->save();
    }
    
    
    public function getData(Request $request){

        DB::statement(DB::raw('set @rownum = 0'));
        $data = DB::table('m_jenis_imb As a')
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'a.id','a.nama','a.indeks'])
        ->where('a.flag_delete','=','0');
        //debug($data);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);

        }

        return $datatables
        ->addcolumn('action','<a title="Edit Data" href="#" data-toggle="modal" data-target="#modalubahjenisimb" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-edit"></span></span></a> &nbsp; <a title="Hapus Data" href="#" data-toggle="modal" data-target="#modalhapusjenisimb" data-id="{!! $id !!}" ><span class="label label-danger"><span class="fa fa-trash"></span></span> </a>')
        ->make(true);
    }
}

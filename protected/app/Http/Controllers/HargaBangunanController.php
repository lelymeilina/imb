<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Datatables;
use App\HargaBangunan;

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
        return view('admin.hargabangunan.index');
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
        admin::create($request->all());    		
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
        $admin = admin::find($id);
        return view('admin.admin.edit', compact('admin'));
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
        
        $admin = admin::find($id);
        $admin->update($request->all());
        //return redirect('pegawai')->with('message', 'Data berhasil dirubah!');
    }

    public function hapus($id)
    {
        
        $admin = admin::find($id);
        return view('admin.admin.hapus', compact('admin'));
    }

    public function destroy($id)
    {
        $admin = admin::find($id);
        $admin->flag_delete = "1";
        $admin->save();
    }
    
    
    public function getData(Request $request){

        DB::statement(DB::raw('set @rownum = 0'));
        $data = DB::table('m_admin As a')
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'a.id','a.email','a.nama','a.no_telp','a.foto'])
        ->where('a.flag_delete','=','0');
        //debug($data);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);

        }

        return $datatables
        ->addcolumn('action','<a title="Edit Data" href="#" data-toggle="modal" data-target="#modalUbahAdmin" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-edit"></span></span></a> &nbsp; <a title="Hapus Data" href="#" data-toggle="modal" data-target="#modalHapusAdmin" data-id="{!! $id !!}" ><span class="label label-danger"><span class="fa fa-trash"></span></span> </a>')
        ->make(true);
	}
}

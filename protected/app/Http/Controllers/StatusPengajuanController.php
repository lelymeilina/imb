<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Datatables;
use App\StatusPengajuan;

class StatusPengajuanController extends Controller
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
        return view('admin.statuspengajuan.index');
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

        $statuspengajuan = new StatusPengajuan();
        $statuspengajuan->nama = $request->nama;
        $statuspengajuan->flag_delete = 0;
        $statuspengajuan->save();
        
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
        $statuspengajuan = StatusPengajuan::find($id);
        return view('admin.statuspengajuan.edit', compact('statuspengajuan'));
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
        
        $statuspengajuan = StatusPengajuan::find($id);
        $statuspengajuan->nama = $request->nama;
        $statuspengajuan->save();
    }

    public function hapus($id)
    {
        
        $statuspengajuan = StatusPengajuan::find($id);
        return view('admin.statuspengajuan.hapus', compact('statuspengajuan'));
    }

    public function destroy($id)
    {
        $statuspengajuan = StatusPengajuan::find($id);
        $statuspengajuan->flag_delete = "1";
        $statuspengajuan->save();
    }
    
    
    public function getData(Request $request){

        DB::statement(DB::raw('set @rownum = 0'));
        $data = DB::table('m_status_pengajuan As a')
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'a.id','a.nama'])
        ->where('a.flag_delete','=','0');
        //debug($data);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);

        }

        return $datatables
        ->addcolumn('action','<a title="Edit Data" href="#" data-toggle="modal" data-target="#modalubahstatuspengajuan" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-edit"></span></span></a> &nbsp; <a title="Hapus Data" href="#" data-toggle="modal" data-target="#modalhapusstatuspengajuan" data-id="{!! $id !!}" ><span class="label label-danger"><span class="fa fa-trash"></span></span> </a>')
        ->make(true);
    }
}

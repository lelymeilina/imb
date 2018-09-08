<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Datatables;
use App\Surveyor;

class SurveyorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        return view('admin.surveyor.index');
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

        $surveyor = new Surveyor();
        $surveyor->nip = $request->nip;
        $surveyor->nama = $request->nama;
        $surveyor->telp = $request->telp;
        $surveyor->flag_delete = 0;
        $surveyor->save();
        
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
        $surveyor = Surveyor::find($id);
        return view('admin.surveyor.edit', compact('surveyor'));
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
        
        $surveyor = Surveyor::find($id);
        $surveyor->nip = $request->nip;
        $surveyor->nama = $request->nama;
        $surveyor->telp = $request->telp;
        $surveyor->save();
    }

    public function hapus($id)
    {
        
        $surveyor = Surveyor::find($id);
        return view('admin.surveyor.hapus', compact('surveyor'));
    }

    public function destroy($id)
    {
        $surveyor = Surveyor::find($id);
        $surveyor->flag_delete = "1";
        $surveyor->save();
    }
    
    
    public function getData(Request $request){

        DB::statement(DB::raw('set @rownum = 0'));
        $data = DB::table('m_surveyor As a')
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'a.id','a.nip','a.nama','a.telp'])
        ->where('a.flag_delete','=','0');
        //debug($data);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);

        }

        return $datatables
        ->addcolumn('action','<a title="Edit Data" href="#" data-toggle="modal" data-target="#modalubahsurveyor" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-edit"></span></span></a> &nbsp; <a title="Hapus Data" href="#" data-toggle="modal" data-target="#modalhapussurveyor" data-id="{!! $id !!}" ><span class="label label-danger"><span class="fa fa-trash"></span></span> </a>')
        ->make(true);
    }
}

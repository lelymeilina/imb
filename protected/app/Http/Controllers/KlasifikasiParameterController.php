<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Datatables;
use App\KlasifikasiParameter;

class KlasifikasiParameterController extends Controller
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
        return view('admin.klasifikasiparameter.index');
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

        $klasifikasiparameter = new KlasifikasiParameter();
        $klasifikasiparameter->nama = $request->nama;
        $klasifikasiparameter->indeks = $request->indeks;
        $klasifikasiparameter->flag_delete = 0;
        $klasifikasiparameter->save();
        
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
        $klasifikasiparameter = KlasifikasiParameter::find($id);
        return view('admin.klasifikasiparameter.edit', compact('klasifikasiparameter'));
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
        
        $klasifikasiparameter = KlasifikasiParameter::find($id);
        $klasifikasiparameter->nama = $request->nama;
        $klasifikasiparameter->indeks = $request->indeks;
        $klasifikasiparameter->save();
    }

    public function hapus($id)
    {
        
        $klasifikasiparameter = KlasifikasiParameter::find($id);
        return view('admin.klasifikasiparameter.hapus', compact('klasifikasiparameter'));
    }

    public function destroy($id)
    {
        $klasifikasiparameter = KlasifikasiParameter::find($id);
        $klasifikasiparameter->flag_delete = "1";
        $klasifikasiparameter->save();
    }
    
    
    public function getData(Request $request){

        DB::statement(DB::raw('set @rownum = 0'));
        $data = DB::table('m_klasifikasi_parameter As a')
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'a.id','a.nama','a.indeks'])
        ->where('a.flag_delete','=','0');
        //debug($data);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);

        }

        return $datatables
        ->addcolumn('action','<a title="Edit Data" href="#" data-toggle="modal" data-target="#modalubahklasifikasiparameter" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-edit"></span></span></a> &nbsp; <a title="Hapus Data" href="#" data-toggle="modal" data-target="#modalhapusklasifikasiparameter" data-id="{!! $id !!}" ><span class="label label-danger"><span class="fa fa-trash"></span></span> </a>')
        ->make(true);
    }
}

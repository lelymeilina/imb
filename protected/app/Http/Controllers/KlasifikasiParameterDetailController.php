<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Datatables;
use App\KlasifikasiParameterDetail;
use App\KlasifikasiParameter;
        



class KlasifikasiParameterDetailController extends Controller
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
        $kp = KlasifikasiParameter::where('flag_delete','=','0')->pluck('nama','id')->toArray();
        return view('admin.klasifikasiparameterdetail.index',compact('kp'));
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

        $klasifikasiparameterdetail = new KlasifikasiParameterDetail();
        $klasifikasiparameterdetail->nama = $request->nama;
        $klasifikasiparameterdetail->id_klasifikasi_parameter = $request->id_klasifikasi_parameter;
        $klasifikasiparameterdetail->indeks = $request->indeks;
        $klasifikasiparameterdetail->flag_delete = 0;
        $klasifikasiparameterdetail->save();
        
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
        $kp = KlasifikasiParameter::where('flag_delete','=','0')->pluck('nama','id')->toArray();
        $klasifikasiparameterdetail = KlasifikasiParameterDetail::find($id);
        return view('admin.klasifikasiparameterdetail.edit', compact('klasifikasiparameterdetail','kp'));
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
        
        $klasifikasiparameterdetail = KlasifikasiParameterDetail::find($id);
        $klasifikasiparameterdetail->nama = $request->nama;
        $klasifikasiparameterdetail->indeks = $request->indeks;
        $klasifikasiparameterdetail->save();
    }

    public function hapus($id)
    {
        
        $klasifikasiparameterdetail = KlasifikasiParameterDetail::find($id);
        return view('admin.klasifikasiparameterdetail.hapus', compact('klasifikasiparameterdetail'));
    }

    public function destroy($id)
    {
        $klasifikasiparameterdetail = KlasifikasiParameterDetail::find($id);
        $klasifikasiparameterdetail->flag_delete = "1";
        $klasifikasiparameterdetail->save();
    }
    
    
    public function getData(Request $request){

        DB::statement(DB::raw('set @rownum = 0'));
        $data = DB::table('m_klasifikasi_parameter_detail As a')
        ->join('m_klasifikasi_parameter as b','b.id','=','a.id_klasifikasi_parameter')
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'a.id','a.nama','b.nama as id_klasifikasi_parameter','a.indeks'])
        ->where('a.flag_delete','=','0');
        //debug($data);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);

        }

        return $datatables
        ->addcolumn('action','<a title="Edit Data" href="#" data-toggle="modal" data-target="#modalubahklasifikasiparameterdetail" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-edit"></span></span></a> &nbsp; <a title="Hapus Data" href="#" data-toggle="modal" data-target="#modalhapusklasifikasiparameterdetail" data-id="{!! $id !!}" ><span class="label label-danger"><span class="fa fa-trash"></span></span> </a>')
        ->make(true);
    }
}

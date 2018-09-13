<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Datatables;
use App\Content;
use App\JenisImb;


class HomeDepanController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$slider = Content::where('jenis','=','0')->where('flag_delete','=','0')->get();
    	$profile = Content::where('jenis','=','1')->where('flag_delete','=','0')->get();

         

        return view('home.home',compact('slider','profile'));
    }

    public function alur()
    {
        return view('home.alur');
    }
    public function simulasi()
    {
        // $jenisImb = JenisImb::where('flag_delete','=',0)->pluck('nama','id')->toArray();
        $hargaBangunan = DB::table('m_harga_bangunan AS h')->where('h.flag_delete','=',0)
                                        ->join('m_fungsi AS f','f.id','=','h.id_fungsi')
                                        ->join('m_klasifikasi_bangunan AS k','k.id','=','h.id_klasifikasi')
                                        ->pluck(DB::raw('CONCAT(f.nama," - ",h.nama," - ",k.nama," - ",IF(h.is_bertingkat = 0,"Tidak Bertingkat","Bertingkat")) AS fungsi_klasifikasi'),'h.id');

        return view('home.simulasi',compact('hargaBangunan'));
    }
    public function prosessimulasi(Request $request)
    {
        return view('home.simulasi');
    }
}

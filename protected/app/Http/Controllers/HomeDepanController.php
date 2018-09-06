<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Datatables;
use App\Content;

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

    public function hasil(Request $request)
    {
        if (isset($request->pemilu)){
            $pemilu = $request->pemilu;
            if($pemilu == 2){
                $warnaPaslon1 = "#f39c12";
                $warnaPaslon2 = "#9b0000";
            }else{
                $warnaPaslon1 = "#9b0000";
                $warnaPaslon2 = "#f39c12";
            }
        }else{
                $pemilu = 1;
                $warnaPaslon1 = "#9b0000";
                $warnaPaslon2 = "#f39c12";
        }
        $warnaNetral = "#757575";
        $warnaBelumMasuk = "#000";
        $suara = DB::table('tps AS t')->select(['kb.id_kabupaten AS id','kb.nama_kabupaten AS nama_kabupaten',DB::raw('SUM(t.paslon_1) AS paslon_1'),DB::raw('SUM(t.paslon_2) AS paslon_2'),DB::raw('IF(SUM(t.paslon_1) > SUM(t.paslon_2),SUM(t.paslon_1),SUM(t.paslon_2)) AS suara_pemenang'),DB::raw('IF(jenis_pemilu<>2,IF(SUM(t.paslon_1) > SUM(t.paslon_2),"#9b0000",IF(SUM(t.paslon_2) > SUM(t.paslon_1),"#f39c12","#757575")),IF(SUM(t.paslon_1) > SUM(t.paslon_2),"#f39c12",IF(SUM(t.paslon_2) > SUM(t.paslon_1),"#9b0000","#757575"))) AS warna_pemenang'),DB::raw('IF(SUM(t.paslon_1) > SUM(t.paslon_2),"KOSTER-ACE","MANTRA-KERTA") AS nama_pemenang'),DB::raw('SUM(suara_sah) AS suara_sah')])
                     ->join('desa AS d','d.id_desa','=','t.id_desa')
                     ->join('kecamatan AS k','k.id_kecamatan','=','d.id_kecamatan')
                     ->join('kabupaten AS kb','kb.id_kabupaten','=','k.id_kabupaten')
                     ->where('t.status', '<>', 2)
                     ->where('jenis_pemilu', $pemilu)
                     ->groupBy('kb.id_kabupaten')
                     ->get();

        $totalTps = DB::table('tps AS t')->where('jenis_pemilu', $pemilu)->count();
        $masukTps = DB::table('tps AS t')->where('jenis_pemilu', $pemilu)->where('t.paslon_1', '<>', 0)->where('t.status', '<>', 2)->count();
        $belumTps = $totalTps - $masukTps;


        return view('home.hasil',compact('suara','warnaPaslon1','warnaPaslon2','warnaNetral','warnaBelumMasuk','totalTps','masukTps','belumTps'));
    }
}

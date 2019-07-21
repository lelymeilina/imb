<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Datatables;
use App\Content;
use App\JenisImb;
use App\HargaBangunan;


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
                                        ->where('h.is_bangunan_tambahan','=',0)
                                        ->pluck(DB::raw('CONCAT(f.nama," - ",h.nama," - ",k.nama," - ",IF(h.is_bertingkat = 0,"Tidak Bertingkat","Bertingkat")) AS fungsi_klasifikasi'),'h.id');

        $hargaBangunan2 = DB::table('m_harga_bangunan AS h')->where('h.flag_delete','=',0)
                                        ->join('m_fungsi AS f','f.id','=','h.id_fungsi')
                                        ->join('m_klasifikasi_bangunan AS k','k.id','=','h.id_klasifikasi')
                                        ->where('h.is_bangunan_tambahan','=',1)
                                        ->pluck(DB::raw('CONCAT(f.nama," - ",h.nama," - ",k.nama) AS fungsi_klasifikasi'),'h.id');

        return view('home.simulasi',compact('hargaBangunan','hargaBangunan2'));
    }
    public function prosessimulasi(Request $request)
    {
        $indeks2persen = 0.02;
        $biayaRetribusiBangunanUtama = 0;

        if(!empty($request->id_harga_bangunan)){
            $HargaBangunan = HargaBangunan::find($request->id_harga_bangunan);
            $luas = (!empty($request->luas)?$request->luas:1);
            if($HargaBangunan->id_fungsi == 1){
                $indeksrumah = 0.25;
            }else{
                $indeksrumah = 1;
            }
            $biayaRetribusiBangunanUtama = ($indeks2persen * ($luas * $HargaBangunan->harga)) * $indeksrumah ;
        }

        $biayaRetribusiBangunanPrasarana = 0;
        if(!empty($request->id_harga_bangunan[0])){
            foreach ($request->id_harga_bangunan_prasarana as $key => $value) {
                # code...
                $volume = (!empty($request->volume[$key])?$request->volume[$key]:1);
                $HargaBangunanPrasarana = HargaBangunan::find($value);
                $biayaRetribusiBangunanPrasarana = $biayaRetribusiBangunanPrasarana + ($indeks2persen * $volume * $HargaBangunanPrasarana->harga);
            }
        }

        $totalbiaya = $biayaRetribusiBangunanUtama + $biayaRetribusiBangunanPrasarana;
        $terbilang = $this->terbilang($totalbiaya);

        session()->flash('biayaRetribusiBangunanUtama',$biayaRetribusiBangunanUtama);
        session()->flash('biayaRetribusiBangunanPrasarana',$biayaRetribusiBangunanPrasarana);
        session()->flash('totalbiaya',$totalbiaya);
        session()->flash('terbilang',$terbilang);

        // echo $totalbiaya; exit;

        return redirect('/simulasi');
    }

    public function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = $this->penyebut($nilai - 10). " Belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai/10)." Puluh". $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " Seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai/100) . " Ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " Seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai/1000) . " Ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai/1000000) . " Juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai/1000000000) . " Milyar" . $this->penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai/1000000000000) . " Trilyun" . $this->penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }

    public function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "Minus ". trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }           
        return $hasil;
    }
}

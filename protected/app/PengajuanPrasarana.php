<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PengajuanPrasarana extends Model
{
    //
    protected $table = 't_pengajuan_prasarana';
    protected $fillable = ['id','no_registrasi','id_pengajuan','nama','id_fungsi','id_jenis_imb_prasarana','id_harga_bangunan','volume','jumlah_biaya','created_at','updated_at'];

    public static function getPrasarana($id,$nama){
		$hargaBangunan = DB::table('m_harga_bangunan AS h')->where('h.flag_delete','=',0)
                                        ->where('h.is_bangunan_tambahan','=',1)
                                        ->where('h.id_fungsi','=',$id)
										->where('h.nama','=',$nama)
                                        ->join('m_fungsi AS f','f.id','=','h.id_fungsi')
                                        ->join('m_klasifikasi_bangunan AS k','k.id','=','h.id_klasifikasi')
                                        ->pluck(DB::raw('k.nama AS fungsi_klasifikasi'),'h.id');
        return $hargaBangunan;
	}
}

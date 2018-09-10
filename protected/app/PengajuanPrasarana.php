<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanPrasarana extends Model
{
    //
    protected $table = 't_pengajuan_prasarana';
    protected $fillable = ['id','no_registrasi','id_pengajuan','nama','id_fungsi','id_jenis_imb','id_harga_bangunan','volume','created_at','updated_at'];

    public static function getPrasarana($id,$nama){
		$hargaBangunan = DB::table('m_harga_bangunan AS h')->where('h.flag_delete','=',0)
										->where('h.is_bangunan_tambahan','=',1)
                                        ->join('m_fungsi AS f','f.id','=','h.id_fungsi')
                                        ->join('m_klasifikasi_bangunan AS k','k.id','=','h.id_klasifikasi')
                                        ->pluck(DB::raw('CONCAT(f.nama," - ",k.nama," - ",IF(h.is_bertingkat = 0,"Tidak Bertingkat","Bertingkat")) AS fungsi_klasifikasi'),'h.id');
        return $hargaBangunan;
	}
}

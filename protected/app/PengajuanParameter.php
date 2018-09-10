<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanParameter extends Model
{
    //
    protected $table = 't_pengajuan_parameter';
    protected $fillable = ['id','no_registrasi','id_pengajuan','id_klasifikasi_parameter','id_klasifikasi_parameter_detail','keterangan','created_at','updated_at'];

    public function getParameter(){
		return $this->belongsTo('App\KlasifikasiParameter','id_klasifikasi_parameter','id');
	}
	public function getParameterSurvey(){
		return $this->belongsTo('App\KlasifikasiParameterDetail','id_klasifikasi_parameter_detail','id');
	}

	public static function getDetailParameter($id){
		return \App\KlasifikasiParameterDetail::where('flag_delete','=',0)
												->where('id_klasifikasi_parameter','=',$id)
												->pluck('nama','id')
												->toArray();
	}
}

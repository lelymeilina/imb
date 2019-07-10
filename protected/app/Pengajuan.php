<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    //
    protected $table = 't_pengajuan';
    protected $fillable = ['id','no_registrasi','nik','nama','id_jenis_imb','id_harga_bangunan','jenis_bangunan','lokasi','tahun','luas','jumlah_biaya','id_surveyor_1','id_surveyor_2','id_status_pengajuan','flag_delete','created_at','updated_at'];

    public function getHargaBangunan(){
		return $this->belongsTo('App\HargaBangunan','id_harga_bangunan','id');
	}

	public function getJenisImb(){
		return $this->belongsTo('App\JenisImb','id_jenis_imb','id');
	}

	public function getSurveyor1(){
		return $this->belongsTo('App\Surveyor','id_surveyor_1','id');
	}

	public function getSurveyor2(){
		return $this->belongsTo('App\Surveyor','id_surveyor_2','id');
	}
    
}

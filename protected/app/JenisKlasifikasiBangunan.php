<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKlasifikasiBangunan extends Model
{
    //
    protected $table = 'm_jenis_klasifikasi_bangunan';
    protected $fillable = ['id', 'id_jenis_bangunan', 'id_klasifikasi', 'flag_delete'];

    public function getJenisBangunan(){
		return $this->belongsTo('App\JenisBangunan','id_jenis_bangunan','id');
	}

	public function getKlasifikasi(){
		return $this->belongsTo('App\KlasifikasiBangunan','id_klasifikasi','id');
	}

}

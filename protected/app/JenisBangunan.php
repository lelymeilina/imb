<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisBangunan extends Model
{
    //
    protected $table = 'm_jenis_bangunan';
    protected $fillable = ['id', 'id_fungsi', 'nama', 'flag_delete'];

    public function getFungsi(){
		return $this->belongsTo('App\Fungsi','id_fungsi','id');
	}

}

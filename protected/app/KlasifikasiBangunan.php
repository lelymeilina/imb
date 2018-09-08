<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KlasifikasiBangunan extends Model
{
    //
    protected $table = 'm_klasifikasi_bangunan';
    protected $fillable = ['id', 'nama', 'is_bangunan_tambahan', 'flag_delete'];
}

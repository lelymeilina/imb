<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HargaBangunan extends Model
{
    //
    protected $table = 'm_harga_bangunan';
    protected $fillable = ['id', 'id_fungsi', 'id_klasifikasi', 'nama', 'is_bertingkat', 'is_bangunan_tambahan', 'harga', 'flag_delete'];
}

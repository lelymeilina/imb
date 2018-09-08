<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KlasifikasiParameter extends Model
{
    //
    protected $table = 'm_klasifikasi_parameter';
    protected $fillable = ['id', 'nama', 'indeks', 'flag_delete'];
}

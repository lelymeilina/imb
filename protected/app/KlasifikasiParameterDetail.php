<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KlasifikasiParameterDetail extends Model
{
    //
    protected $table = 'm_klasifikasi_parameter_detail';
    protected $fillable = ['id', 'id_klasifikasi_parameter', 'nama', 'indeks', 'flag_delete'];
}

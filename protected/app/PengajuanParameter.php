<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanParameter extends Model
{
    //
    protected $table = 't_pengajuan_parameter';
    protected $fillable = ['id','no_registrasi','id_pengajuan','id_klasifikasi_parameter','id_klasifikasi_parameter_detail','keterangan','created_at','updated_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanPersyaratan extends Model
{
    //
    protected $table = 't_pengajuan_persyaratan';
    protected $fillable = ['id','no_registrasi','id_pengajuan','id_persyaratan','is_memenuhi','keterangan','created_at','updated_at'];
}

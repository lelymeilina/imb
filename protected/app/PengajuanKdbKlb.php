<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanKdbKlb extends Model
{
    //
    protected $table = 't_pengajuan_kdb_klb_baru';
    protected $fillable = ['id','no_registrasi','id_pengajuan','is_hasil','tidak_bertingkat','bertingkat','basement','created_at','updated_at'];

}

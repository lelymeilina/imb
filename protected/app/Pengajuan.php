<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    //
    protected $table = 't_pengajuan';
    protected $fillable = ['id','no_registrasi','nik','nama','id_jenis_imb','id_harga_bangunan','jenis_bangunan','lokasi','tahun','luas','jumlah_biaya','id_surveyor_1','id_surveyor_2','id_status_pengajuan','flag_delete','created_at','updated_at'];
    
}

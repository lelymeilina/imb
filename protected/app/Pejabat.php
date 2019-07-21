<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    //
    protected $table = 'm_pejabat';
    protected $fillable = ['id','nip_kepala_bidang','kepala_bidang','pangkat_kepala_bidang','nip_kasi','kasi','pangkat_kasi','created_at','updated_at'];
   
}

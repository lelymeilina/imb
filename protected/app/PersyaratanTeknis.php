<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersyaratanTeknis extends Model
{
    //
    protected $table = 'm_persyaratan_teknis';
    protected $fillable = ['id', 'nama', 'flag_delete'];
}

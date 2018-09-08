<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisImb extends Model
{
    //
    protected $table = 'm_jenis_imb';
    protected $fillable = ['id', 'nama', 'indeks', 'flag_delete'];
}

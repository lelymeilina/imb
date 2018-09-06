<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roleDosen extends Model
{
    //
    protected $table = 't_role_dosen';
    protected $fillable = ['id_dosen','id_periode', 'role_internal','role_eksternal','change_by'];
}

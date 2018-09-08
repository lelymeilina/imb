<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPengajuan extends Model
{
    //
    protected $table = 'm_status_pengajuan';
    protected $fillable = ['id', 'nama', 'flag_delete'];
}

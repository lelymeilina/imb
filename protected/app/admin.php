<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    //
    protected $table = 'm_admin';
    protected $fillable = ['nama','email', 'foto','no_telp','flag_delete'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surveyor extends Model
{
    //
    protected $table = 'm_surveyor';
    protected $fillable = ['id', 'nip', 'nama', 'flag_delete','telp'];
}

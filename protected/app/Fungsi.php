<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fungsi extends Model
{
    //
    protected $table = 'm_fungsi';
    protected $fillable = ['id', 'nama', 'indeks', 'flag_delete'];
}

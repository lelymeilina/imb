<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    protected $guarded = [];
    protected $table = 'content';
    protected $fillable = ['jenis', 'judul', 'katakunci','content','flag_delete'];
}

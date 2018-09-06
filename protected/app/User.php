<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','telp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRbacRole()
    {
        return $this->belongsTo('App\rbacRoleUser','username','user_id');
    }

    public function getDosen()
    {
        return $this->belongsTo('App\dosen','username','nidn');
    }
}

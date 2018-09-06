<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userRoleTree extends Model
{
    //

     protected $table = 'rbac_permissions';
     protected $fillable = ['permission_title', 'permission_slug','parent','weight'];

    public function parent() {
        return $this->hasOne('App\userRoleTree', 'id', 'parent');
    }

    public function children() {
        return $this->hasMany('App\userRoleTree', 'parent', 'id');
    }   

    public static function tree() {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent', '=', '0')->orderBy('weight','asc')->get();
    }


}

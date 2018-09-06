<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rbacPermissionRole extends Model
{
    //
    protected $table = 'rbac_permission_role';
    protected $fillable = ['permission_id', 'role_id'];

    // public function userRole() {
    //     return $this->belongsTo('App\userRole', 'role_id', 'id');
    // }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rbacRoleUser extends Model
{
    //
     protected $table = 'rbac_role_user';
     protected $fillable = ['role_id', 'user_id'];

     public static function getListRoleUser($id){
     	$listRole = \DB::table('rbac_role_user AS ru')
     				->join('rbac_roles AS r','r.id','=','ru.role_id')
                    ->where('ru.user_id','=',$id)
                    ->lists('r.role_title','r.id');
        return $listRole;
     }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\rbacPermissionRole;
use App\rbacRoleUser;
use App\rbacRole;
use App\userRoleTree;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/');
        }
        if (Auth::check()) {
            if(empty(Session::get('navigation'))){
                $userPermission = rbacRoleUser::where('user_id','=',Auth::user()->username)->first();
                session(['userPermission' => $userPermission->role_id]);
                $roleName = rbacRole::find($userPermission->role_id);
                session(['namePermission' => $roleName->role_title]);
                session(['navigation' => $this->navigation($this->getRole(),'',$userPermission->role_id)]);
                // return redirect('/admin');
                return $next($request);
            }


        }

        return $next($request);
    }

    public function getRole(){
        $items = userRoleTree::tree();
        return $items;
    }

    public function navigation($items,$isTree='',$userPermission){
        $test = '<ul class="'.($isTree==1?'treeview-menu':'sidebar-menu').'">';
           foreach($items as $item){
                $rolePermission = rbacPermissionRole::where('role_id','=',$userPermission)->join('rbac_permissions as r','r.id','=','rbac_permission_role.permission_id')->where('rbac_permission_role.permission_id','=',$item->id)->orderBy('r.weight','asc')->first();
                if(count($rolePermission)>0){
                    $test .= '<li class="'.($isTree!=1 && $item->permission_slug=='#'?'treeview ':'').'">
                    <a data-id="'.$item->weight.'" href="'.URL($item->permission_slug).'" '.$item->attribute.' > <i class="'.$item->icon.'"></i> <span>'.$item->permission_title.'</span>'.(count($item['children'])>0?'<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>':'').'</a>'.(count($item['children'])>0 ? $this->navigation($item['children'],"1",$userPermission) :'').'
                    </li>';
                }
           }
        $test .= '</ul>';
        return $test;
    }
    
}

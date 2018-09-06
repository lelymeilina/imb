<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\rbacPermissionRole;
use App\rbacPermission;
use App\rbacRoleUser;
use App\rbacRole;
use App\userRoleTree;
use Session;
use DB;
use Illuminate\Support\Facades\Route;

class Authenticate
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
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        // $action =  Route::getCurrentRoute()->getAction();
        $action = Route::getFacadeRoot()->current()->uri();
        // dd($action); exit;
        // if(strpos($action,"tb") === FALSE){

        //     $permissionAccess = rbacPermission::join('rbac_permission_role AS r','r.permission_id','=','rbac_permissions.id')->where('rbac_permissions.permission_slug','LIKE',DB::raw("'%".$action."%'"))->where('r.role_id','=',Session::get('userPermission'))->count();

        // }else{
        //     $permissionAccess = 1;
            
        // }
        // dd(Session::get('allPermission')); exit;
        if(!empty(Session::get('allPermission'))){
            if (in_array($action, Session::get('allPermission'))) {
                # code...
                if(in_array($action, Session::get('accessGranted'))){
                    if (Auth::check()) {
                        if(empty(Session::get('navigation'))){
                            $userPermission = rbacRoleUser::where('user_id','=',Auth::user()->username)->first();
                            session(['userPermission' => $userPermission->role_id]);
                            $roleName = rbacRole::find($userPermission->role_id);
                            session(['namePermission' => $roleName->role_title]);
                            session(['navigation' => $this->navigation($this->getRole(),'',$userPermission->role_id)]);

                            $allPermission = rbacPermission::pluck('permission_slug','id')->toArray();
                            $accessGranted = rbacPermission::join('rbac_permission_role AS r','r.permission_id','=','rbac_permissions.id')->where('r.role_id','=',$userPermission->role_id)->pluck('rbac_permissions.permission_slug','rbac_permissions.id')->toArray();
                            session(['allPermission' => $allPermission]);
                            session(['accessGranted' => $accessGranted]);
                            // return redirect('/admin');
                            return $next($request);
                        }
                        return $next($request);
                    }
                }else{
                    return view('errors.403');
                }
            }else{
                return $next($request);
            }
        }else{
            if(empty(Session::get('navigation'))){
                $userPermission = rbacRoleUser::where('user_id','=',Auth::user()->username)->first();
                session(['userPermission' => $userPermission->role_id]);
                $roleName = rbacRole::find($userPermission->role_id);
                session(['namePermission' => $roleName->role_title]);
                session(['navigation' => $this->navigation($this->getRole(),'',$userPermission->role_id)]);

                $allPermission = rbacPermission::pluck('permission_slug','id')->toArray();
                $accessGranted = rbacPermission::join('rbac_permission_role AS r','r.permission_id','=','rbac_permissions.id')->where('r.role_id','=',$userPermission->role_id)->pluck('rbac_permissions.permission_slug','rbac_permissions.id')->toArray();
                session(['allPermission' => $allPermission]);
                session(['accessGranted' => $accessGranted]);
                // return redirect('/admin');
                return $next($request);
            }
        }
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
                    <a data-id="'.$item->weight.'" href="'.URL($item->permission_slug).'" '.$item->attribute.' > <i class="'.$item->icon.'"></i> <span>'.$item->permission_title.'</span>'.(count($item['children'])>0?'<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>':'<span id="count'.$item->id.'" class="label label-warning pull-right"></span>').'</a>'.(count($item['children'])>0 ? $this->navigation($item['children'],"1",$userPermission) :'').'
                    </li>';
                }
           }
        $test .= '</ul>';
        return $test;
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Closure;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\rbacPermissionRole;
use App\rbacRoleUser;
use App\rbacRole;
use App\userRoleTree;
use Session;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';
    protected $username = 'username';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'telp' => 'required|max:14',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        rbacRoleUser::create(['role_id'=>'6','user_id'=>$data['username'],]);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'telp' => $data['telp'],
            'username'=>$data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::login($this->create($request->all()));
        $userPermission = rbacRoleUser::where('user_id','=',$user->username)->first();
        session(['userPermission' => $userPermission->role_id]);
        $roleName = rbacRole::find($userPermission->role_id);
        session(['namePermission' => $roleName->role_title]);
        session(['navigation' => $this->navigation($this->getRole(),'',$userPermission->role_id)]);
        return redirect('/admin');

    }

      /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        Session::forget('navigation');
        Session::flush();
        return redirect('/');
    }


}

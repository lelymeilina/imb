<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Datatables;
use App\User;
use App\rbacRole;
use App\rbacRoleUser;
use App\userRoleTree;
use App\rbacPermissionRole;
use App\rbacPermission;
use Hash;
use Session;
use Auth;



class userController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $lvluser = rbacRole::lists('role_title','id')->toArray();        
        return view('admin.user.index',compact('lvluser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        //user::create($request->all());
        $user = new User();
        $user->id = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->telp = $request->telp;
        $user->save();

        $leveluser = new rbacRoleUser();
        $leveluser->user_id = $user->username;
        $leveluser->role_id = 1;
        $leveluser->save();



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        
        $user = User::find($id);
        $lvluser = rbacRole::lists('role_title','id')->toArray();
        $roleuser = rbacRoleUser::where('user_id','=',$user->username)
                    ->lists('role_id')
                    ->toArray();

        return view('admin.user.edit',compact('user','lvluser','roleuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telp = $request->telp;
        if($request->reset_password == 1){
            if(!empty($request->password)){
                // if(Hash::check($request->passlama, $user->password)==true){
                if($request->password == $request->konfirm_password){
                    $user->password = bcrypt($request->password);
                }
                // }
            }
        }

        $user->save();

        rbacRoleUser::where('user_id', $user->username)->delete();

        $leveluser = new rbacRoleUser();
        $leveluser->user_id = $user->username;
        $leveluser->role_id = 1;
        $leveluser->save();
            

    }

    public function hapus($id)
    {
        
        $user = User::find($id);
        return view('admin.user.hapus', compact('user'));
    }

    public function changePermision($id){
        $userPermission = rbacRoleUser::where('user_id','=',Auth::user()->username)->where('role_id','=',$id)->first();
        session(['userPermission' => $userPermission->role_id]);
        $roleName = rbacRole::find($userPermission->role_id);
        session(['namePermission' => $roleName->role_title]);
        session(['navigation' => $this->navigation($this->getRole(),'',$userPermission->role_id)]);
        // print_r(Session::get('namePermission')); exit;
        $allPermission = rbacPermission::pluck('permission_slug','id')->toArray();
        $accessGranted = rbacPermission::join('rbac_permission_role AS r','r.permission_id','=','rbac_permissions.id')->where('r.role_id','=',$userPermission->role_id)->pluck('rbac_permissions.permission_slug','rbac_permissions.id')->toArray();
        session(['allPermission' => $allPermission]);
        session(['accessGranted' => $accessGranted]);
        return "Sukses";
    }

    public function getUbahPass($id)
    {
        
        $user = User::find($id);
        return view('admin.user.ubahpass',compact('user'));
    }

    public function getPassLama(Request $request, $id)
    {
        $user = User::find($id);
        return json_encode(Hash::check($request->passlama, $user->password));
    }

    public function postPass(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $idRole = $user->getRbacRole->id;
        rbacRoleUser::destroy($idRole); 
        user::destroy($id);
    }
    
    
    public function getUser(Request $request){

        DB::statement(DB::raw('set @rownum = 0'));
        $data = DB::table('users As u')
        ->select([DB::raw('@rownum  := @rownum  + 1 AS no'),'u.id','u.name','u.email','u.username','u.password','u.telp',DB::raw('GROUP_CONCAT(s.role_title,"") as role_title')])
        ->join('rbac_role_user as r','r.user_id','=','u.username')
        ->join('rbac_roles as s','s.id','=','r.role_id')
        ->groupBy('u.username')
       ;
        //debug($data);

        $datatables = Datatables::of($data);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('no', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

         return $datatables
        ->addcolumn('action','<a title="Edit Data" href="#" data-toggle="modal" data-target="#modalUbahuser" data-id="{!! $id !!}" ><span class="label label-info"><span class="fa fa-edit"></span></span></a> &nbsp; <a title="Hapus Data" href="#" data-toggle="modal" data-target="#modalHapusUser" data-id="{!! $id !!}" ><span class="label label-danger"><span class="fa fa-trash"></span></span> </a>')
        ->make(true);

	}

    public function navigation($items,$isTree='',$userPermission){
        $test = '<ul class="'.($isTree==1?'treeview-menu':'sidebar-menu').'">';
           foreach($items as $item){
                $rolePermission = rbacPermissionRole::where('role_id','=',$userPermission)->join('rbac_permissions as r','r.id','=','rbac_permission_role.permission_id')->where('rbac_permission_role.permission_id','=',$item->id)->orderBy('r.weight','asc')->first();
                if(count($rolePermission)>0){
                    $test .= '<li class="'.($isTree!=1 && $item->permission_slug=='#'?'treeview ':'').'">
                    <a data-id="'.$item->weight.'" href="'.URL($item->permission_slug).'" '.$item->attribute.' > <i class="'.$item->icon.'"></i> <span>'.$item->permission_title.'</span>'.(count($item['children'])>0?'<i class="fa fa-angle-left pull-right"></i>':'<span id="count'.$item->id.'" class="label label-warning pull-right"></span>').'</a>'.(count($item['children'])>0 ? $this->navigation($item['children'],"1",$userPermission) :'').'
                    </li>';
                }
           }
        $test .= '</ul>';
        return $test;
    }
    public function getRole(){
        $items = userRoleTree::tree();
        return $items;
    }

}

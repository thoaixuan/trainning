<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Permission;
use DB;
use App\Models\Role;

class checkPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $permission = null)
    {
        //Lấy tất cả các role của người dùng khi đăng nhập vào hệ thống
        $listRole=DB::table('users')
        ->join('role_user','users.id','=','role_user.user_id')
        ->join('roles','role_user.role_id','=','roles.id')
        ->where('users.id',auth()->id())
        ->select('roles.*')
        ->get()->pluck('id')->toArray();
        //Lấy tất cả các quyền khi người dùng đăng nhập vào hệ thống
        $listPermission=DB::table('roles')
        ->join('permission_role','roles.id','=','permission_role.role_id')
        ->join('permissions','permission_role.permission_id','=','permissions.id')
        ->where('roles.id',$listRole)
        ->select('permissions.*')
        ->get()->pluck('id')->unique();
        $checkPermission =Permission::where('name',$permission)->value('id');
        // Tối ưu hóa dữ liệu bằng mảng
        $checkArray=Role::where('id','=',(int)Auth::user()->permission_id)->pluck('roles_module')->first();
        $array=collect(explode(",",$checkArray));
        if($array->contains($permission)){
            return $next($request);
        }
        $domain= $_SERVER['REQUEST_URI'];
        if($permission=='user-list' || $permission=='room-list' || $permission=='role-list'){
          return redirect('/admin-info')->with('mess', 'Bạn không dùng được chức năng '.$permission.'!');
        }
        return redirect($domain)->with('error', 'Bạn không dùng được chức năng '.$permission.'!');


    }
}

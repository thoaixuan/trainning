<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Permission;
use Illuminate\Support\Facades\Response;
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
        // Tối ưu hóa dữ liệu bằng mảng
        $checkArray=Role::where('id','=',(int)Auth::user()->permission_id)->pluck('roles_module')->first();
        if($checkArray){
            $array=collect(explode(",",$checkArray));
        }
        if($request->ajax()){
            if($array->contains($permission)){
                return $next($request);
            }else{
                return response()->json([
                    'status'=>0,
                    'message'=>"Bạn không có quyền sử dụng chức năng này",
                    'code'=>401,
                ]);
            }
        }
        else{
            
            if($array->contains($permission)){
                return $next($request);
            }
            return response(view('admin.error.401'));
        }
    }
}

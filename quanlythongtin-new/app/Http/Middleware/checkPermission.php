<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Permission;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class checkPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission = null)
    {
        if (Auth::check()) {
        $checkArray=Permission::where('id','=',(int)Auth::user()->id_permissions)->pluck('permissions')->first();
        $array=collect(explode(",",$checkArray));

        if($request->ajax()){
            if($array->contains($permission)){
                return $next($request);
            }else{
                return response()->json([
                    'status'=>0,
                    'message'=>"Bạn không có quyền sử dụng chức năng này",
                ]);
            }
        }
        else{
            if($array->contains($permission)){
                return $next($request);
            }
            return redirect("/404");
        }
        }else {
            return response()->json([
                'status'=>0,
                'message'=>"Bạn chưa đăng nhập",
            ]);
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\Permissions;
use App\User;

use Auth;

class checkLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$key=null)
    {
        if (Auth::check()) {
            $data = Permissions::where('id','=',(int)Auth::user()->id_permissions)->pluck('permissions')->first();

            $array = collect(array());
            if($data){
                $array = collect(explode(",",$data));
            }

            if(!$array->contains($key)){
                return $next($request);
            }else{
                return redirect('/admin')->with('mess', 'Bạn không dùng được chức năng này !');
            }

        }else {
            return redirect('/admin')->with('mes', 'Bạn chưa đăng nhập !');
        }
        
        
    }
}

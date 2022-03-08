<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class authAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->permissions == 1){
                return $next($request);
            }else {
                return redirect('/admin/dashboard');
            }
            }else {
                return redirect('/admin')->with('message', 'Đăng nhập Admin thất bại !');
            }  
    }
}

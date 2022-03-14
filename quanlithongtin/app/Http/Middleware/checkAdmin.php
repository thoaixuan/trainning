<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\User;
use Closure;

class checkAdmin
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
        $User = User::join('group', 'users.id', '=', 'group.user_id')
        ->where('group.position_id','=',3)
        ->first();
        if($User !== null){
                return $next($request);
            }else {
                return redirect('/admin')->with('message', 'Đăng nhập Admin thất bại !');
                }
            }else {
                return redirect('/admin')->with('message', 'Đăng nhập Admin thất bại !');
            } 
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class checkPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user=User::leftjoin('rooms','users.room_id','=','rooms.id')
                ->leftjoin('permissions','rooms.permission_id','=','permissions.id')
                ->select(
                    'users.full_name',
                    'rooms.name',
                    'permissions.name',
                    'permissions.action'
                )->where('users.id','=',Auth::user()->id)->get();
         if($user){
            $action=json_decode($user[0]->action);
                 if($action->create&&$action->update&&$action->delete&&$action->view){
                      return $next($request);
                 }
                return redirect()->route('admin.index.login');

         }
        // $action=json_encode(checkLogin()->action);
    }
}

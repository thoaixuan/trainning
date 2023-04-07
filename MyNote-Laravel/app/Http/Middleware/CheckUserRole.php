<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->per_id !== 1) { // kiểm tra xem người dùng có quyền admin hay ko
            return redirect()->route('showLogin'); // nếu không có quyền, trả về mã lỗi HTTP 403 – Forbidden
        }
        
        return $next($request);
    }
}

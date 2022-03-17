<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    function checkLogin(Request $request){
       if(Auth::attempt([
        'email' => $request->email,
        'password' => $request->password,
        ])){
             return redirect('/admin/dashboard');
       }else {
           return redirect('admin')->with('mess','Thông tin đăng nhập không chính xác');
       }
   }

   function logout(){
       Auth::logout();
       return redirect('/admin');
   }
}

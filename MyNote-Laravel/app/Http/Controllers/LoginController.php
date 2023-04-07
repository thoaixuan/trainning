<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{

    function login(Request $request){

        if(Auth::attempt($request->only('email','password'))){
                return response()->json([
                    'status'=>1,
                    'message'=>"Đăng nhập thành công"    
                ],200);
        }
        
        return response()->json([
            'status'=>0,
            'message'=>"Email hoặc mật khẩu không đúng"  
        ]);
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }


}

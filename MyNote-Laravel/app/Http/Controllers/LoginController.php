<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{

    function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Nếu thông tin đăng nhập không hợp lệ, chuyển hướng người dùng trở lại trang đăng nhập với thông báo lỗi.
        if ($validator->fails()) {
            return response()->json([
                'status'=>0,
                'message'=>$validator->errors()->first()    
            ]);
        }

        if(Auth::attempt($request->only('email','password'))){
                return response()->json([
                    'status'=>1,
                    'message'=>"Đăng nhập thành công"    
                ]);
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

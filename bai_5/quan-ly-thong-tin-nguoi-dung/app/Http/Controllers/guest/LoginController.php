<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function index(){
        return view('guest.pages.signin.signin');
    }
    public function login(Request $request){
       
        if(Auth::attempt($request->only('email','password'))){
            return response()->json([
                'status'=>1,
                'message'=>"Đăng nhập thành công",
                'code'=>200
            ],200);
        }
        return response()->json([
            
            'status'=>0,
            'message'=>"Email và mật khẩu không khớp",
            'code'=>500
        ],500);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('guest.signin.home');
    }

}

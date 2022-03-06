<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function index(){
        return view("admin.pages.signin.signin");
    }
    public function login(Request $request){
       
        if(Auth::attempt($request->only('email','password'))){
            if(!Auth::user()->is_admin){
                return response()->json([
                    'status'=>0,
                    'message'=>"Bạn không đủ quyền truy cập",
                    'code'=>500
                ]);
            }
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
        ]);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.index.login');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('Admin.pages.dashboard.dashboard');
        }
        else{
            return view('Admin.auth.login');
        }
    }
    public function login(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            if(Auth::user()->permission_id==1){
                return response()->json([
                    'status'=>1,
                    'message'=>"Đăng nhập thành công",
                    'code'=>200,
    
                ],200);
            }
            return response()->json([
                'status'=>0,
                'message'=>"Bạn không đủ quyền truy cập",
                'code'=>500,
             
            ]);
           
        }
        return response()->json([
            'status'=>0,
            'message'=>"Email và mật khẩu không khớp",
            'code'=>500,
  
        ]);
    }
    public function logout(Request $request){
        if(Auth::logout()){
            return redirect()->route('admin_index_login');
        }else {
            return redirect()->route('admin_index_login');
        }
    }
}

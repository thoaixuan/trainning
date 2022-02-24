<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GuestController extends Controller
{
    
    function index(){
        return view('guest.pages.signin.signin');
    }
   
    public function signin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return response()->json([
                'status'=>1,
                'message'=>"Đăng nhập thành công",
                'code'=>200,
            ]); 
        }
        return response()->json([
            'status'=>0,
            'message'=>"Mật khẩu hoặc tài khoản bị sai hoặc bạn không đủ quyền, hãy thử lại",
            'code'=>404,
        ]); 
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('guest.signin');
    }
}

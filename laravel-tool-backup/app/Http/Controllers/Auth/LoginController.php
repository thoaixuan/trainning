<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Validator;

class LoginController extends Controller
{
    public function index404(){
        return view('admin.pages.error.404');
    }
    public function index(){
        if(Auth::check()){
            return view('admin.pages.dashboard.dashboard',['title'=>'Trang chủ']);
        }
        else{
            return view('admin.auth.login',['title'=>"Đăng nhập"]);
        }
    }
    public function login(Request $request){
        $message=[
            // 'g-recaptcha-response.required'=>"Hãy xác nhận nếu bạn không phải là robot",
            // 'g-recaptcha-response.captcha'=>"Captcha bị lỗi! Hãy thử lại",
            'email.required'=>"Bạn phải nhập email",
            'password.required'=>"Bạn phải nhập mật khẩu",
            'email.email'=>"Phải đúng định dạng email"
        ];
        $validate=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required',
            // 'g-recaptcha-response' => 'required|captcha',
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_number';
        $data = ['email'=>$request->email,'password'=>$request->password];
        if($fieldType=='phone_number'){
            $data = ['phone_number'=>$request->email,'password'=>$request->password];
        }
        if(Auth::attempt($data)){
            if(Auth::user()->action==0){
                return response()->json([
                    'status'=>1,
                    'message'=>"Đăng nhập thành công",
                    'code'=>200,
    
                ],200);
            }
            return response()->json([
                'status'=>0,
                'message'=>"Tài khoản của bạn đã bị khóa",
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
            return redirect()->route('admin.index.login');
        }else {
            return redirect()->route('admin.index.login');
        }
    }
}

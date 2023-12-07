<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function loginPost(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $message = [
            'password.required' => 'Mật khẩu không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
            return response()->json([
                'status'=>0,
                'data' => null,
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

    public function register(){
        return view('auth.register');
    }

    public function registerPost(Request $request){
        $rules = [
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'signuppassword' => 'required',
            'confirmpassword' => 'required'
        ];
        $message = [
            'fullName.required' => 'Họ và tên không được để trống',
            'signuppassword.required' => 'Mật khẩu không được để trống',
            'confirmpassword.required' => 'Xác nhận mật khẩu không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
            return response()->json([
                'status'=>0,
                'data' => null,
                'message'=>$validator->errors()->first()
            ]);
        }

        $Account = new User();
        $Account->name = $request->fullname;
        $Account->email = $request->email;
        $Account->password = Hash::make($request->signuppassword);
        if($Account->save()){
            return response()->json([
                'message' => 'Thêm thành công',
                'status' => 1,
                'data' => $Account,
            ]);
        }else{
            return response()->json([
                'message' => 'Thêm thất bại',
                'status' => 0,
                'data' => null
            ]);
        }

    }

    Public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}

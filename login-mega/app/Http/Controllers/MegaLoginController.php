<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class MegaLoginController extends Controller
{
    public function loginPost(Request $request){

        $message=[
            'required'=>":attribute không được để trống",
            'email'=>":attribute không đúng định dạng ",
        ];
        $validator=Validator::make($request->all(),[
            'email'=>['required', 'email'],
            'password'=>['required'],
        ],$message);

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
                'message'=>"Đăng nhập thành công",
            ]);
        }

        return response()->json([
            'status'=>0,
            'message'=>"Email hoặc mật khẩu không đúng"
        ]);
    }
}

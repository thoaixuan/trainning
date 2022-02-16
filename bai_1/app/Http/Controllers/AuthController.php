<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class AuthController extends Controller
{
    public function register(Request $request){
        $user=User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
        ]);

        return $user;
    }

    public function login(Request $request){
        if(!Auth::attempt($request->only('email','password'))){
            return response()->json([
                'status'=>0,
                'message'=>'Tài khoản bạn bị sai!',
                'code'=>404
            ],404);
        }

        $user=Auth::user();
        $token=$user->createToken('token')->plainTextToken;
        $cookie =cookie('jwt',$token,60*24*7);
        return response()->json([
            'status'=>0,
            'message'=>'Đăng nhập thành công',
            'code'=>200
        ])->withCookie($cookie);
    }
    public function getAll(){
        return response()->json([
            'status'=>0,
            'message'=>Auth::user(),
            'code'=>200
        ]);
    }
    public function logout(){
        $cookie=Cookie::forget('jwt');
        return response([
            'status'=>0,
            'message'=>'Đăng xuất thành công',
            'code'=>200
        ])->withCookie($cookie);
    }
}

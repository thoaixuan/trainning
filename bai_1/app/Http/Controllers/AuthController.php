<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
            ]);
        }
    }
    public function getAll(){
        return 'Authenticated auth';
    }
}

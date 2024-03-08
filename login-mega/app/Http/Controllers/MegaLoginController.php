<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\User;

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

        $user = User::where('email', $request->input('email'))->first();
        if (!$user) {
            $user = new User([
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'name'=> $request->name
            ]);
            $user->save();
        }

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return response()->json([
                'status' => 1,
                'message' => "Đăng nhập thành công",
            ]);
        }else {
            return response()->json([
                'status' => 0,
                'message' => "Email hoặc mật khẩu không đúng",
            ]);
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}

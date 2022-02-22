<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
class LoginController extends Controller
{
    public function index(){
        return view('admin.pages.signin.signin');
    }
    public function signin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('admin.get.index');
        }
        return redirect()->route('admin.signin');
    }
    public function getInfo(Request $request){
        $auth = Auth::user();
        return view('admin.pages.info.info');
        // return response()->json([
        //     'status'=>1,
        //     'message'=>"Get Data Successfully",
        //     'code'=>200,
        //     'data'=>$auth
        // ]);
    }
    public function postUpdate(Request $request){

        $reset_password = $request->reset_password;

        if(Hash::check($reset_password,Auth::user()->password)){
            $users=User::findOrFail($request->id);
            $users->password=Hash::make($request->password);
            $users->save();
            Auth::logout();
            
            if($users){
                return response()->json([
                    'status'=>1,
                    'message'=>"Đổi mật khẩu thành công",
                    'code'=>200,
                    'data'=>$users
                ]);
            }else{
                return response()->json([
                    'status'=>0,
                    'message'=>"Đã xảy ra lỗi bên phía chúng tôi, không phải lỗi của bạn",
                    'code'=>500,
                ]);
            }
        }
        return response()->json([
            'status'=>0,
            'message'=>"Mật khẩu bị sai, hãy thử lại",
            'code'=>404,
        ]); 
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.signin');
    }
}

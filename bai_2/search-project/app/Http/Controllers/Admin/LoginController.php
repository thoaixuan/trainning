<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
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
        $users=User::find($request->id);
        $reset_password = $request->reset_password;


        if(Auth::check()){
            $users->password=Hash::make($request->password);
            $users->save();
            Auth::logout();
            
            if($users){
                return response()->json([
                    'message'=>"Data Update Successfully",
                    'code'=>200,
                    'data'=>$users
                ]);
            }else{
                return response()->json([
                    'message'=>"Internal Server Error",
                    'code'=>500,
                ]);
            }
        }
        return response()->json([
            'message'=>"Data Update Falid",
            'code'=>404,
            'data'=>$users
        ]); 
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.signin');
    }
}

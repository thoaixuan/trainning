<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.signin');
    }
}

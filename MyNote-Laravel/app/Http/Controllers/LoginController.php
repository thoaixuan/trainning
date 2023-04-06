<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    function showLoginPage(){
        return view('auth.login');
    }

    function login(Request $request){

        if (Auth::attempt($request->only('email','password'))) {
            return 'Dang nhap thanh cong';
        }

        return 'Dang nhap that bai';
    }

    function create()
    {
        $email = request()->input('email');
        $password = request()->input('password');

        User::create([
            'name' => explode('@', $email)[0],
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        
        return 'Đăng ký thành công';
    }
}

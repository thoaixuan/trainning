<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class GuestController extends Controller
{
    
    function index(){
        return view('guest.pages.signin.signin');
    }
    function signin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
     
            return redirect()->route('guest.home');
        }
        return redirect()->route('guest.signin');
    }
}

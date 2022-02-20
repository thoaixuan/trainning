<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    function index(){
        return view('guest.pages.home.home');
    }
    function signin(){
        return view('guest.pages.signin.signin');
        
    }
}

<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('guest.pages.home.home');
    }
    public function login(){
        return view('guest.pages.signin.signin');
    }
}

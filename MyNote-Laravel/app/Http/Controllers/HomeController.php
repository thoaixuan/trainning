<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    function index(){
        return view('pages/home');
    }
   
    function notes(){
        return view('pages/notes/notes');
    }
}

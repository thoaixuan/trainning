<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterEnrollmentController extends Controller
{
    public function index(){
        return view('register.pages.index');
    }

    public function success(){
        return view('register.pages.success');
    }
}

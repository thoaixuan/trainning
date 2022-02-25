<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function getData(){
        return view('guest.pages.content.content');
    }
}

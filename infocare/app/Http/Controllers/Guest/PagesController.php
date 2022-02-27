<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pages;
class PagesController extends Controller
{
    public function getPages(Request $Request)
    {    
        $pages = Pages::where('pages_slug','=',$Request->slug)->first();

            return view('Guest.pages.pages.pages',['pages' => $pages]); 
    }
}

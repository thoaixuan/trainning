<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
class PageController extends Controller
{
    public function getPage(Request $request){
        $page=Page::where('slug','=',$request->slug)->where('status','=',0)->first();
        return view('guest.pages.page.page',compact('page'));
    }
}

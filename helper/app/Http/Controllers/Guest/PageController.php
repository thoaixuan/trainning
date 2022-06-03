<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;
class PageController extends Controller
{
    public function indexPage($slug = null) {
        $pages = Pages::where('slug',request()->slug)->first();
        $title = $pages->name;
        return view('guest.pages.pages.pages',['pages' => $pages,'title' => $title]);
    }
}

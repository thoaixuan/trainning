<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\notes;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index(){
        $notes = notes::whereDate('created_at', Carbon::today())->get();
        // dd($notes);
        return view('pages.home.homepage', (['notes'=> $notes]));
    }
}

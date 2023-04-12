<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notes;
use Illuminate\Support\Carbon;


class HomeController extends Controller
{
    function index(){
        $notes = notes::whereDate('created_at', Carbon::today())->get();
        return view('pages/home/home', (['notes'=> $notes]));
    }
}

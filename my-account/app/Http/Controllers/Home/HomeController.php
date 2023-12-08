<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\notes;
use App\User;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $notes = notes::where('userId',$user->id)->whereDate('created_at', Carbon::today())->get();
        return view('pages.home.homepage', (['notes'=> $notes, 'user'=>$user]));
    }
}

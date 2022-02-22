<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;

class UserController extends Controller
{
    public function getUsers(){
        $user_list = DB::table('users')->get();
        return view('admin.pages.users.users',['user_list' => $user_list]);
    }
}

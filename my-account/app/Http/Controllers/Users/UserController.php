<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.users.users');
    }
    public function createUsers()
    {
        return view('pages.users.addNewUsers');
    }
}

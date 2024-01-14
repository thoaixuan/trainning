<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home.home');
    }

    public function getfolder()
    {
        return view('pages.myfolder.folder');
    }
    public function viewFolder(Request $request, $id)
    {
        return view('pages.myfolder.folderchild');
    }
}

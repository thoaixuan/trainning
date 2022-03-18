<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
class RoleController extends Controller
{
    public function index(){
        return view("admin.pages.role.role");
    }
}

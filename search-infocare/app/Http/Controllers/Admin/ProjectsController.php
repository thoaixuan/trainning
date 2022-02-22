<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProjectsController extends Controller
{
    public function getProjects(){
        $projects_list = DB::table('projects')
        ->join('services', 'services.id', '=', 'projects.id')
        ->join('users', 'users.id', '=', 'projects.id')
        ->get();
        return view('admin.pages.projects.projects',['projects_list' => $projects_list]);
    }
}

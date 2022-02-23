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
        $services_list = DB::table('services')
        ->get();
        $users_list = DB::table('users')
        ->get();
        return view('admin.pages.projects.projects',[
            'projects_list' => $projects_list,
            'services_list' => $services_list,
            'users_list' => $users_list
        ]);
    }

    public function storeProjects(Request $request) {
        DB::table('projects')->insert([
            'projects_name' => $request->input('projects_name'),
            'userID' => $request->input('userID'),
            'serviceID' => $request->input('serviceID')
        ]);
        return redirect('/admin-cpanel/services');
    }

}

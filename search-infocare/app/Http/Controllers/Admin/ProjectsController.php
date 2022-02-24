<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Projects;

class ProjectsController extends Controller
{
    public function getProjects(){
        // $projects_list = DB::table('projects')
        // ->join('services', 'services.id', '=', 'projects.id')
        // ->join('users', 'users.id', '=', 'projects.id')
        // ->get();
        $projects_list = Projects::leftJoin('users', 'users.id', '=', 'projects.userID')
        ->leftJoin('services', 'services.id', '=', 'users.id')
        ->select('projects.*', 'services.services_name', 'users.full_name')
        ->orderByDesc("id")
        ->get();
        $services_list = DB::table('services')
        ->get();
        $users_list = DB::table('users')
        ->get();
        $services_list2 = DB::table('services')
        ->get();
        $users_list2 = DB::table('users')
        ->get();
        return view('admin.pages.projects.projects',[
            'projects_list' => $projects_list,
            'services_list' => $services_list,
            'users_list' => $users_list,
            'services_list2' => $services_list2,
            'users_list2' => $users_list2
        ]);
    }
    public function getDataProjects(){
        $projects_list = Projects::leftJoin('users', 'users.id', '=', 'projects.userID')
        ->leftJoin('services', 'services.id', '=', 'projects.userID')
        ->get();
        return view('admin.pages.projects.data',['projects_list' => $projects_list]);
    }
    public function storeProjects(Request $request) {
        DB::table('projects')->insert([
            'projects_name' => $request->input('projects_name'),
            'userID' => $request->input('userID'),
            'serviceID' => $request->input('serviceID')
        ]);
        return redirect('/admin-cpanel/services');
    }
    public function editProjects(Request $request){
        $id = $request->input('id');
        $projects_name = $request->input('projects_name');
        $userID = $request->input('userID');
        $serviceID = $request->input('serviceID');
        DB::table('projects')->where('id', $id)->update([
            'projects_name' => $projects_name,
            'userID' => $userID,
            'serviceID' => $serviceID
        ]);
        return redirect('/admin-cpanel/projects');
    }
    public function destroyProjects($id){
        Projects::destroy($id);
    }
    public function searchProjects(Request $request) {
        $keyword = $request->input('search');
        // $keyword = 'full';
        $list_search = Projects::leftJoin('users', 'users.id', '=', 'projects.userID')
        ->leftJoin('services', 'services.id', '=', 'projects.userID')
        // ->where(function ($query) use($keyword) {
        //     $query->where('projects_name', 'like', '%' . $keyword . '%');
        //     })
        ->Where(function($query)use($keyword){
            $query->where('projects.projects_name', '=', $keyword)
            ->orwhere('services.services_name', '=', $keyword)
            ->orwhere('users.full_name', '=', $keyword);
        })
        ->get();
        return $list_search;die();
        foreach($list_search as $list) {
            $output .= 
            '
            <tr>
            <td>'.$list->full_name.'</td>
            <td>'.$list->services_name.'</td>
            <td>'.$list->projects_name.'</td>
            <td>
            Xoa
            </td>
            </tr>
            ';
        }
        return response()->json($output);
    }
}

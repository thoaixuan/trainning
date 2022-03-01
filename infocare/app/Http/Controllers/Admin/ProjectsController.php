<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Projects;

class ProjectsController extends Controller
{
    public function getProject()
    {
       return view('Admin.pages.project.project'); 
    }
    public function getDatatable(Request $request)
    {
      
        $columns [] ='id';
        $columns [] ='full_name';
       
        $columns [] ='services_name';
        $columns [] ='projects_name';
        $columns [] ='time_start';
        $columns [] ='time_end';
        $columns [] ='projects_description';
        $columns [] ='id';
     
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search');
        $totalData = Projects::join('services', 'projects.serviceID', '=', 'services.id')
        ->join('users', 'users.id', '=', 'projects.userID')->count();
        if(empty($search)){
            $Projects = Projects::join('services', 'projects.serviceID', '=', 'services.id')
            ->join('users', 'users.id', '=', 'projects.userID')
            ->select('projects.*', 'services.services_name', 'users.full_name')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();

        }else{
            $Projects = Projects::join('services', 'projects.serviceID', '=', 'services.id')
            ->join('users', 'users.id', '=', 'projects.userID')
            ->where(function ($query) use ($search){
                $query->where('projects.projects_name', 'LIKE', "%{$search}%")
                ->orWhere('users.full_name', 'LIKE', "%{$search}%")
                ->orWhere('users.phone_number', 'LIKE', "%{$search}%")
                ->orWhere('users.email', 'LIKE', "%{$search}%")
                ->orWhere('services.services_name', 'LIKE', "%{$search}%");
            })
            ->select('projects.*', 'services.services_name', 'users.full_name')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();
            $totalFiltered = $Projects->count();
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalData),
            "data"            => $Projects
        );

        echo json_encode($json_data);
    }

    public function postInsertProjects(Request $Request) {
        $Projects = new Projects();
	    $Projects->userID = $Request->userID;
	    $Projects->serviceID = $Request->serviceID;
	    $Projects->projects_name = $Request->projects_name;
        $Projects->time_start = $Request->time_start;
        $Projects->time_end = $Request->time_end;
        $Projects->projects_description = $Request->projects_description;
	    if($Projects->save()){
	        return response()->json([
                'name' => 'Thành công',
                'status' => 200,
                'data' => $Projects
            ]);
	    }else{
	        return response()->json([
                'name' => 'Thất bại',
                'status' => 500,
                'data' => $Projects
            ]);
	    }
    }

    public function getUpdateProjects(Request $Request) {
        $Projects = Projects::where('id','=',$Request->id)->first();
        return response()->json([
            'name' => 'Thành công',
            'status' => 200,
            'data' => $Projects
        ]);
    }

    public function postUpdateProjects(Request $Request)
	{
	        $Projects =  Projects::find($Request->id);
	        $Projects->projects_name = $Request->projects_name;
		    $Projects->userID = $Request->userID;
		    $Projects->serviceID = $Request->serviceID;
            $Projects->time_start = $Request->time_start;
            $Projects->time_end = $Request->time_end;
            $Projects->projects_description = $Request->projects_description;
	        if($Projects->save()){
                return response()->json([
                    'name' => 'Thành công',
                    'status' => 200,
                    'data' => $Projects
                ]);
            }else{
                return response()->json([
                    'name' => 'Thất bại',
                    'status' => 500,
                    'data' => $Projects
                ]);
            }
	 
	}

    public function destroyProject( Request $Request ) {
        $result = Projects::where('id','=',$Request->id)->delete();
        return $result;
    }
}

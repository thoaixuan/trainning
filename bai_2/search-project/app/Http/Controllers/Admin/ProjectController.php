<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use Validator;


class ProjectController extends Controller
{
    function index(){
        $projects=Project::with('user')->with('service')->orderBy('id','DESC')->get();
        return view('admin.pages.project.project',compact('projects'));
    }
    
    public function add(Request $request){
        $message=[
            'required'=>":attribute không được để trống",
        ];
        $validate=Validator::make($request->all(),[
            'projects_name'=>['required'],
            'service_id'=>['required'],
            'user_id'=>['required']
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $project=new Project();
        $project->projects_name=$request->projects_name;
        $project->service_id=$request->service_id;
        $project->user_id=$request->user_id;
        $project->status=0;
        $project->save();
        if($project){
            return response()->json([
                'status'=>1,
                'message'=>"Data Inserted Successfully",
                'code'=>200
            ]);
        }
        else{
            return response()->json([
                'status'=>0,
                'message'=>"Internal Server Error",
                'code'=>500
            ]);
        }
    }

    public function anyData(Request $request)
    {
        $columns[]='id';
        $columns[]='projects_name';
        $columns[]='status';
        $columns[]='user.name';
        $columns[]='service.name';


        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Project::count();
        $totalFiltered=$totalData;

        if(empty($search)){
            $projects=Project::with('user')->with('service')->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();
        }else{
            $projects=Project::with('user')->with('service')->Where(function($query)use($search){
                $query->where('projects_name','like',"%{$search}%")
                        // ->orWhere('service.service_name','like',"%{$search}%")
                        // ->orWhere('user.name','like',"%{$search}%")
                        ->orWhere('id','like',"%{$search}%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered = $projects->count();
        }

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$projects,
        );
        echo json_encode($json_data);
    }

    public function getUpdate(Request $request){
        $project=Project::where('id','=',$request->id)->first();
        if($project){
            return response()->json([
                'message'=>"Data Inserted Successfully",
                'code'=>200,
                'data'=>$project
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }

    public function postUpdate(Request $request){
        $project=Project::find($request->id);
        $project->user_id=$request->user_id;
        $project->projects_name=$request->projects_name;
        $project->service_id=$request->service_id;
        $project->save();
        if($project){
            return response()->json([
                'message'=>"Data Update Successfully",
                'code'=>200,
                'data'=>$project
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }

    public function delete(Request $request){
        $project=Project::find($request->id);
        $project->delete();
        if($project){
            return response()->json([
                'message'=>"Data Delete Successfully",
                'code'=>200,
                'data'=>$project
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }

}

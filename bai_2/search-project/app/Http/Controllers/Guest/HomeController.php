<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
class HomeController extends Controller
{
   function index(){
        $projects=Project::with('user')->with('service')->orderBy('id','DESC')->get();
        return view('guest.pages.home.home',compact('projects'));
    }
    public function anyData(Request $request)
    {
        $columns[]='id';
        $columns[]='projects_name';
        $columns[]='status';
        $columns[]='user.name';
        $columns[]='service.name';
        $columns[]='user.phone';
        $columns[]='user.email';

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
            $projects=Project::whereHas('user',function($query) use ($search){
                $query->where('name','like',"%{$search}%");
                $query->orWhere('phone','like',"%{$search}%");
                $query->orWhere('keyword','like',"%{$search}%");
            })
            ->with(['user'=>function($query) use ($search){
                $query->where('name','like',"%{$search}%");
                $query->orWhere('phone','like',"%{$search}%");
                $query->orWhere('keyword','like',"%{$search}%");
            }])->with('service')
            ->offset($start)
            ->limit($limit)
            ->orderByDesc($order,$dir)
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
}

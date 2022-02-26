<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Service;
use DB;
class HomeController extends Controller
{
    public function index(){
        $user=User::with('project')->get();
        return view('guest.pages.home.home',compact('user'));
    }
    public function anyData(Request $request)
    {
        $columns[]='id';
        $columns[]='projects_name';
        $columns[]='status';
        $columns[]='name';
        $columns[]='services_name';
        $columns[]='phone';
        $columns[]='email';

        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=User::count();
        $totalFiltered=$totalData;

        if(empty($search)){
            $user=DB::table('users')
            ->leftjoin('projects','users.id','=','projects.user_id')
            ->leftjoin('services','services.id','=','projects.service_id')
            ->select(
                'users.id',
                'users.name',
                'users.phone',
                'users.email',
                'projects.projects_name',
                'services.service_name')
        ->offset($start)
        ->limit($limit)
        ->orderByDesc($order,$dir);
        }else{
            $user=DB::table('users')
            ->leftjoin('projects','users.id','=','projects.user_id')
            ->leftjoin('services','services.id','=','projects.service_id')
            ->Where(function($query)use($search){
                $query->where('name','=',$search)
                        ->orWhere('phone','=',$search);
            })
            ->select(
                'users.id',
                'users.name',
                'users.phone',
                'users.email',
                'projects.projects_name',
                'services.service_name')
            ->offset($start)
            ->limit($limit)
            ->orderByDesc($order,$dir)
            ->get();
            $totalFiltered = $user->count();
        }

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$user,
        );
        echo json_encode($json_data);
    }
    public function getData(){
    
        $user=User::get();
        return response()->json([
            'message'=>"Internal Server Error",
            'code'=>200,
            'data'=>$user
        ],206);
    }
    public function countServices(){
        $service=Service::count();
        return response()->json([
            'message'=>"Internal Server Error",
            'code'=>500,
            data=>$service
        ]);
    }
}

<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\User;
class HomeController extends Controller
{
   function index(){
        $user=User::with('project')->with('service')->orderBy('id','DESC')->get();
        return view('guest.pages.home.home',compact('user'));
    }
    public function anyData(Request $request)
    {
        $columns[]='id';
        $columns[]='project.projects_name';
        $columns[]='status';
        $columns[]='name';
        $columns[]='service.name';
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
       
            $user=User::with('project')->with('service')->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir);
        }else{
            $user=User::with('project')->with('service')->Where(function($query) use ($search){
                $query->where('name','=',$search)
                        ->orWhere('phone','=',$search);
            })
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
}

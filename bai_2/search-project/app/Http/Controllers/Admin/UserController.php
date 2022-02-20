<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    function index(){
        $users=User::orderBy('id','DESC')->get();
        return view('admin.pages.user.user',compact('users'));
    }

    public function anyData(Request $request)
    {
        $columns[]='id';
        $columns[]='name';
        $columns[]='email';
        $columns[]='phone';


        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=User::count();
        $totalFiltered=$totalData;

        // if(empty($search)){
            $users=User::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();
        // }else{
        //     $users=User::Where(function($query)use($search){
        //         $query->where('name','like',"%{$search}%")
        //                 ->orWhere('email','like',"%{$search}%")
        //                 ->orWhere('phone','like',"%{$search}%")
        //                 ->orWhere('id','like',"%{$search}%");
        //     })
        //     ->offset($start)
        //     ->limit($limit)
        //     ->orderBy($order,$dir)
        //     ->get();
        //     $totalFiltered =$users->count();
        // }

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$users,
        );
        echo json_encode($json_data);
    }
}

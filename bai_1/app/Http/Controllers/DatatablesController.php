<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use DB;
class DatatablesController extends Controller
{
    public function getIndex(){
        $users= User::orderBy('id','DESC')->get();
        return view('home',compact('users'));
    }
    public function addUser(Request $request){
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        if($user){
            return response()->json([
                'message'=>"Data Inserted Successfully",
                'code'=>200
            ]);
        }
        else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500
            ]);
        }
    }
    public function anyData(Request $request)
    {
        $columns[]='id';
        $columns[]='name';
        $columns[]='email';
        $columns[]='password';

        $limit=$request->input('length');
        $start=$request->input('start');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=User::count();
        $totalFiltered=$totalData;
        $users=User::offset($start)
        ->limit($limit)
        ->orderBy($order,$dir)->get();

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$users,
        );
        echo json_encode($json_data);
    }

    public function getUpdate(Request $request){
        $user=User::where('id','=',$request->id)->first();
        if($user){
            return response()->json([
                'message'=>"Data Inserted Successfully",
                'code'=>200,
                'data'=>$user
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }

    public function postUpdate(Request $request){
        $user=User::find($request->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        if($user){
            return response()->json([
                'message'=>"Data Update Successfully",
                'code'=>200,
                'data'=>$user
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }
    public function delete(Request $request){
        $user=User::find($request->id);
        $user->delete();
        if($user){
            return response()->json([
                'message'=>"Data Delete Successfully",
                'code'=>200,
                'data'=>$user
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }
}



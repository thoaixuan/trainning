<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use DB;
use Validator;
class DatatablesController extends Controller
{
    public function getIndex(){
        $users= User::orderBy('id','DESC')->get();
        return view('Admin.pages.dashboard.dashboard',compact('users'));
    }
    public function addUser(Request $request){
        $message=[
            'required'=>":attribute không được để trống",
            'min:3'=>":attribute dữ liệu tối thiểu chỉ được 3 ký tự",
            'max:20'=>":attribute dữ liệu tối đa 15 ký tự",
            'unique:users'=>":attribute bị trùng dữ liệu",
            'email'=>"Bạn phải nhập đúng định dạng email",
            'name.regex'=>"Bạn phải nhập chữ",
        ];
        $validate=Validator::make($request->all(),[
            'name'=>['required','min:3','max:20','regex:/^[a-z\d_]{5,20}$/i'],
            'email'=>['required','min:8','max:20','unique:users','email'],
            'password'=>['required','min:8','max:20']
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        if($user){
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
        $columns[]='name';
        $columns[]='email';
        $columns[]='password';

        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=User::count();
        $totalFiltered=$totalData;

        if(empty($search)){
            $users=User::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();
        }else{
            $users=User::Where(function($query)use($search){
                $query->where('name','like',"%{$search}%")
                        ->orWhere('email','like',"%{$search}%")
                        ->orWhere('id','like',"%{$search}%");
            })
            // $user=DB::table('users')->where('name','like',"Pink Kutch II")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered =$users->count();
        }

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



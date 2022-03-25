<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Validator;
use DB;
class RoleController extends Controller
{
    public function index(){
        return view("admin.pages.role.role");
    }
    public function dataPermission(){
        $permissions=Permission::all();
        return response()->json([
            'message'=>"Lấy dữ liệu phòng ban thành công",
            'code'=>200,
            'data'=>$permissions
        ]);
    }
    public function add(Request $request){
        $message=[
            'required'=>":attribute không được để trống",
            'name.unique'=>"Tên không được để trùng",
        ];
        $validate=Validator::make($request->all(),[
            'name'=>['required','unique:roles'],
            'roles_module'=>['required'],
                
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $roles=new Role();
        $roles->name=$request->name;
        $roles->description=$request->description;
        $roles->roles_module=$request->roles_module; 
        $roles->save();
     
        if($roles){
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
    public function anyData(Request $request){
        $columns[]='id';
        $columns[]='name';
        $columns[]='description';

        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Role::count();
        $totalFiltered=$totalData;

        if(empty($search)){
            $roles=Role::offset($start)
            ->limit($limit)
            ->orderByDesc($order,$dir)->get();  
        }else{
            $roles=Role::Where(function($query)use($search){
                $query->where('name','like',"%{$search}%")
                        ->orWhere('description','like',"%{$search}%")
                        ->orWhere('id','like',"%{$search}%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderByDesc($order,$dir)
            ->get();
            $totalFiltered =$roles->count();
        }

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$roles,
        );
        echo json_encode($json_data);
    }
    public function getUpdate(Request $request)
    {
        $roles=Role::where('id','=',$request->id)->first();
        if($roles){
            return response()->json([
                'status'=>1,
                'message'=>"Data Inserted Successfully",
                'code'=>200,
                'data'=>$roles
            ]);
        }else{
            return response()->json([
                'status'=>0,
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }

    public function getInsert(){
        return response()->json([
            'status'=>1,
            'message'=>"Data Inserted Successfully",
            'code'=>200,
        ]);
    }

    public function getDate(Request $request)
    {
        $roles=Role::where('id','=',$request->id)->first();
        if($roles){
            return response()->json([
                'status'=>1,
                'message'=>"Data Inserted Successfully",
                'code'=>200,
                'data'=>$roles
            ]);
        }else{
            return response()->json([
                'status'=>0,
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }
    public function delete(Request $request){
        $role=Role::find($request->id);
        $user=User::where('permission_id','=',$role->id);
        if($user->count()>0){
            return response()->json([
                'status'=>0,
                'message'=>"Bạn không thể xóa",
                'code'=>500,
            ]);
        }else{
            $role->delete();
            if($role){
                return response()->json([
                    'status'=>1,
                    'message'=>"Data Delete Successfully",
                    'code'=>200,
                    'data'=>$role
                ]);
            }else{
                return response()->json([
                    'status'=>0,
                    'message'=>"Internal Server Error",
                    'code'=>500,
                ]);
            }
        }
      
    }
    public function postUpdate(Request $request){
        $message=[
            'required'=>":attribute không được để trống",
        ];
        $validate=Validator::make($request->all(),[
            'name'=>['required'],
            'roles_module'=>['required'],
                
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $roles= Role::where('id','=',$request->id)->first();
        $roles->name=$request->name;
        $roles->description=$request->description;
        $roles->roles_module=$request->roles_module;   
        $roles->save();
     
        if($roles){
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
    
}

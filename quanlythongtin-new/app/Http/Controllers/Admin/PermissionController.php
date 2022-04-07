<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use Validator;

class PermissionController extends Controller
{
    public function index(){
        return view("admin.pages.permission.permission");
    }
    public function getDatatable(Request $Request)
    {
      
        $columns [] ='id';
        $columns [] ='per_name';
       
        $columns [] ='permissions';

        $columns [] ='id';
     
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $totalData =  Permission::count();
        if(empty($search)){
        $Permission = Permission::offset($start)
        ->limit($limit)
        ->orderBy($order,$dir)
        ->get();
        } else {
            $Permission = Permission::Where(function($query)use($search){
	            $query->where('per_name', 'LIKE',"%{$search}%");
	        })
	        ->offset($start)
	        ->limit($limit)
	        ->orderBy($order,$dir)
	        ->get();
	        $totalFiltered =$Permission->count();
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalData), 
            "data"            => $Permission   
        );
        echo json_encode($json_data); 
    }

    public function postInsertPermission(Request $Request) {
        $message = [
            'required'=>":attribute không được để trống",
        ];
        $validate = Validator::make($Request->all(),[
            'per_name'=>['required','max:150']
            
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status_validate' => 1,
                'data_error' => $validate->errors()->first()
            ]);
        }
        $Permission = new Permission();
        
	    $Permission->per_name = $Request->per_name;
	    $Permission->permissions = $Request->permissions?implode(",",$Request->permissions):'';
	    if($Permission->save()){
	        return response()->json([
                'name' => 'Thành công',
                'status' => 200,
                'data' => $Permission
            ]);
	    }else{
	        return response()->json([
                'name' => 'Thất bại',
                'status' => 500,
                'data' => $Permission
            ]);
	    }
    }

    public function getUpdatePermission(Request $Request) {
        $Permission = Permission::where('id','=',$Request->id)->first();
        return response()->json([
            'name' => 'Thành công',
            'status' => 200,
            'data' => $Permission
        ]);
    }

    public function getInsertPermission(){
        return response()->json([
            'status'=>1,
            'message'=>"Thành công",
        ]);
    }
    
    public function postUpdatePermission(Request $Request)
	{
            dd($Request->all());
            $message = [
                'required'=>":attribute không được để trống",
            ];
            $validate = Validator::make($Request->all(),[
                'per_name'=>['required']
                
            ],$message);
            if($validate->fails()){
                return response()->json([
                    'status_validate' => 1,
                    'data_error' => $validate->errors()->first()
                ]);
            }
	        $Permission =  Permission::find($Request->id);
            
	        $Permission->per_name = $Request->per_name;
            $Permission->permissions = $Request->permissions;
	        if($Permission->save()){
                return response()->json([
                    'name' => 'Thành công',
                    'status' => 200,
                    'data' => $Permission
                ]);
            }else{
                return response()->json([
                    'name' => 'Thất bại',
                    'status' => 500,
                    'data' => $Permission
                ]);
            }
	 
	}

    public function destroyPermission( Request $Request ) {
        $result = Permission::where('id','=',$Request->id)->delete();
        return response()->json([
            'status'=>1,
            'message'=>"Xóa thành công",
            'code'=>200,
            'data'=>$result
        ]);
    }
}

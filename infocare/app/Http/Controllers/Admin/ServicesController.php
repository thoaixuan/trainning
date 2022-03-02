<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services;
use Validator;

class ServicesController extends Controller
{
    public function getService()
    {
       return view('Admin.pages.service.service'); 
    }
    public function getDatatable(Request $Request)
    {
      
        $columns [] ='id';
        $columns [] ='service_name';
       
        $columns [] ='service_description';
        $columns [] ='service_slug';
        $columns [] ='id';
     
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $totalData =  Services::count();
        if(empty($search)){
        $Services = Services::offset($start)
        ->limit($limit)
        ->orderBy($order,$dir)
        ->get();
        } else {
            $Services = Services::Where(function($query)use($search){
	            $query->where('services_name', 'LIKE',"%{$search}%")
	            ->orWhere('services_description', 'LIKE',"%{$search}%")
	            ->orWhere('services_slug', 'LIKE',"%{$search}%");
	        })
	        ->offset($start)
	        ->limit($limit)
	        ->orderBy($order,$dir)
	        ->get();
	        $totalFiltered =$Services->count();
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalData), 
            "data"            => $Services   
        );
        echo json_encode($json_data); 
    }
    
    public function postInsertServices(Request $Request) {
        $message = [
            'required'=>":attribute không được để trống",
        ];
        $validate = Validator::make($Request->all(),[
            'services_name'=>['required']
                
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status_validate' => 1,
                'data_error' => $validate->errors()->first()
            ]);
        }
        $Services = new Services();
	    $Services->services_name=$Request->services_name;
	    $Services->services_description=$Request->services_description;
	    $Services->services_slug=change_to_slug($Request->services_name);
	    if($Services->save()){
	        return response()->json([
                'name' => 'Thành công',
                'status' => 200,
                'data' => $Services
            ]);
	    }else{
	        return response()->json([
                'name' => 'Thất bại',
                'status' => 500,
                'data' => $Services
            ]);
	    }
    }
    public function getUpdateServices(Request $Request) {
        $Service = Services::where('id','=',$Request->id)->first();
        return response()->json([
            'name' => 'Thành công',
            'status' => 200,
            'data' => $Service
        ]);
    }

    public function postUpdateServices(Request $Request)
	{
            $message = [
                'required'=>":attribute không được để trống",
            ];
            $validate = Validator::make($Request->all(),[
                'services_name'=>['required']
                    
            ],$message);
            if($validate->fails()){
                return response()->json([
                    'status_validate' => 1,
                    'data_error' => $validate->errors()->first()
                ]);
            }
	        $Services =  Services::find($Request->id);
	        $Services->services_name = $Request->services_name;
		    $Services->services_description = $Request->services_description;
		    $Services->services_slug = change_to_slug($Request->services_name);
	        if($Services->save()){
                return response()->json([
                    'name' => 'Thành công',
                    'status' => 200,
                    'data' => $Services
                ]);
            }else{
                return response()->json([
                    'name' => 'Thất bại',
                    'status' => 500,
                    'data' => $Services
                ]);
            }
	 
	}

    public function destroyService( Request $Request ) {
        $result = Services::where('id','=',$Request->id)->delete();
        return $result;
    }
}

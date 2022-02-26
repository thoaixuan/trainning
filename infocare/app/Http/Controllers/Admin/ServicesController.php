<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services;

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
        $totalData =  Services::count();

        $Services = Services::offset($start)
        ->limit($limit)
        ->orderBy($order,$dir)
        ->get();

        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalData), 
            "data"            => $Services   
        );
        echo json_encode($json_data); 
    }
    
    public function postInsertServices(Request $Request) {
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

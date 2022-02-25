<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use Validator;

class ServiceController extends Controller
{
    function index(){
        $services=Service::with('user')->orderBy('id','DESC')->get();
        return view('admin.pages.service.service',compact('services'));
    }

    public function anyData(Request $request)
    {
        $columns[]='id';
        $columns[]='service_name';
        $columns[]='service_description';



        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Service::count();
        $totalFiltered=$totalData;

        if(empty($search)){
            $services=Service::with('user')->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();
        }else{
            $services=Service::with('user')->Where(function($query)use($search){
                $query->where('service_name','like',"%{$search}%")
                        ->orWhere('service_description','like',"%{$search}%")
                        ->orWhere('id','like',"%{$search}%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered =$services->count();
        }

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$services,
        );
        echo json_encode($json_data);
    }

    public function add(Request $request){
        $message=[
            'required'=>":attribute không được để trống",
        ];
        $validate=Validator::make($request->all(),[
            'service_name'=>['required'],
            'service_description'=>['required'],
                
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $service=new Service();
        $service->service_name=$request->service_name;
        $service->service_description=$request->service_description;
        $service->save();
        if($service){
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

    public function getUpdate(Request $request){
        $service=Service::where('id','=',$request->id)->first();
        if($service){
            return response()->json([
                'message'=>"Data Inserted Successfully",
                'code'=>200,
                'data'=>$service
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }

    public function postUpdate(Request $request){
        $service=Service::find($request->id);
        $service->service_name=$request->service_name;
        $service->service_description=$request->service_description;
        $service->save();
        if($service){
            return response()->json([
                'message'=>"Data Update Successfully",
                'code'=>200,
                'data'=>$service
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }

    public function delete(Request $request){
        $service=Service::find($request->id);
        $service->delete();
        if($service){
            return response()->json([
                'message'=>"Data Delete Successfully",
                'code'=>200,
                'data'=>$service
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }
    
}

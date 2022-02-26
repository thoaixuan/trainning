<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    function index(){
        $pages=Page::orderBy('id','DESC')->get();
        return view('admin.pages.pages.pages',compact('pages'));
    }
    public function anyData(Request $request)
    {
        $columns[]='id';
        $columns[]='name';
        $columns[]='key';
        $columns[]='link';



        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Page::count();
        $totalFiltered=$totalData;

        if(empty($search)){
            $pages=Page::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();
        }else{
            $pages=Page::Where(function($query)use($search){
                $query->where('name','like',"%{$search}%")
                        ->orWhere('key','like',"%{$search}%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered =$pages->count();
        }

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$pages,
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

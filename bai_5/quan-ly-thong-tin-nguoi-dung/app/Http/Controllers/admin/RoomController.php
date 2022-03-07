<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Permission;
use Validator;

class RoomController extends Controller
{
    public function index(){
        return view("admin.pages.room.room");
    }
    
    public function anyData(Request $request)
    {
        $columns[]='id';
        $columns[]='name';
        $columns[]='description';
        $columns[]='permissions.name';

        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Room::count();
        $totalFiltered=$totalData;

        if(empty($search)){
            $rooms=Room::with('permissions')->offset($start)
            ->limit($limit)
            ->orderByDesc($order,$dir)->get();  
        }else{
            $rooms=Room::with('permissions')->Where(function($query)use($search){
                $query->where('name','like',"%{$search}%")
                        ->orWhere('description','like',"%{$search}%")
                        ->orWhere('id','like',"%{$search}%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderByDesc($order,$dir)
            ->get();
            $totalFiltered =$rooms->count();
        }

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$rooms,
        );
        echo json_encode($json_data);
    }
    public function getDate(){
        $rooms=Room::with('permissions')->get();  

        return $rooms;
    }
    public function add(Request $request){
        $message=[
            'required'=>":attribute không được để trống",
        ];
        $validate=Validator::make($request->all(),[
            'name'=>['required'],
                
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $rooms=new Room();
        $rooms->name=$request->name;
        $rooms->description=$request->description;
        $rooms->permission_id=$request->permission_id;
        $rooms->save();
        if($rooms){
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
    public function getPermision(){
        $permission=Permission::all();
        return response()->json([
            'message'=>"Lấy dữ liệu dịch vụ thành công",
            'code'=>200,
            'data'=>$permission
        ]);
    }
    
    public function getUpdate(Request $request){
        $rooms=Room::where('id','=',$request->id)->first();
        if($rooms){
            return response()->json([
                'message'=>"Data Inserted Successfully",
                'code'=>200,
                'data'=>$rooms
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }

    public function postUpdate(Request $request){
        $room=Room::find($request->id);
        $room->update($request->all());
        if($room){
            return response()->json([
                'message'=>"Data Update Successfully",
                'code'=>200,
                'data'=>$room
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }
    
    public function delete(Request $request){
        $room=Room::find($request->id);
        $room->delete();
        if($room){
            return response()->json([
                'message'=>"Data Delete Successfully",
                'code'=>200,
                'data'=>$room
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }
}

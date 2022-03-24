<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Permission;
use App\Models\User;
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

        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Room::count();
        $totalFiltered=$totalData;

        if(empty($search)){
            $rooms=Room::offset($start)
            ->limit($limit)
            ->orderByDesc($order,$dir)->get();  
        }else{
            $rooms=Room::Where(function($query)use($search){
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
        $rooms=Room::get();  

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
  
    public function getInsert(){
        return response()->json([
            'status'=>1,
            'message'=>"Mở khóa thành công",
            'code'=>200,
        ]);
    }
    public function getUpdate(Request $request){
        $rooms=Room::where('id','=',$request->id)->first();
        if($rooms){
            return response()->json([
                'status'=>1,
                'message'=>"Data Inserted Successfully",
                'code'=>200,
                'data'=>$rooms
            ]);
        }else{
            return response()->json([
                'status'=>0,
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
                'status'=>1,
                'message'=>"Data Update Successfully",
                'code'=>200,
                'data'=>$room
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
        $room=Room::find($request->id);
        $user=User::where('room_id','=',$room->id);
        if($user->count()>0){
            return response()->json([
                'status'=>0,
                'message'=>"Bạn không thể xóa",
                'code'=>200,
                'data'=>$room
            ]);
        }else{
            $room->delete();
            if($room){
                return response()->json([
                    'status'=>1,
                    'message'=>"Data Delete Successfully",
                    'code'=>200,
                    'data'=>$room
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
}

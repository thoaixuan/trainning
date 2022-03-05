<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use Validator;
use PDF;

class UserController extends Controller
{
    public function index(){
        return view("admin.pages.user.user");
    }
    public function anyData(Request $request)
    {
        $columns[]='id';

        $columns[]='full_name';
        $columns[]='gender';
        $columns[]='date';
        $columns[]='date_start';
        $columns[]='phone_number';
        $columns[]='room_id';
        $columns[]='position';
        $columns[]='action';
        $columns[]='cover';
        $columns[]='cover_after';

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
                $query->where('full_name','like',"%{$search}%")
                        ->orWhere('email','like',"%{$search}%")
                        ->orWhere('phone_number','like',"%{$search}%")
                        ->orWhere('keyword','like',"%{$search}%")
                        ->orWhere('id','like',"%{$search}%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderByDesc($order,$dir)
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
    public function add(Request $request){
        $message=[
            'required'=>":attribute không được để trống",
            'min:3'=>":attribute dữ liệu tối thiểu chỉ được 3 ký tự",
            'max:20'=>":attribute dữ liệu tối đa 15 ký tự",
            'email.unique'=>":attribute đã tồn tại trong dữ liệu",
            'email'=>"Bạn phải nhập đúng định dạng email",
            // 'name.regex'=>"Bạn phải nhập đúng định dạng của chữ",
            'phone.min'=>"Bạn phải nhập đủ 10 số",
            'phone.max'=>"Bạn phải nhập đủ 10 số",
            'phone.unique'=>"Số điện thoại đã tồn tại"
        ];
        $validate=Validator::make($request->all(),[
            'full_name'=>['required','min:3','max:40'],
            'email'=>['required','min:8','max:40','unique:users','email'],
            'phone_number'=>['required','min:10','max:10','unique:users']
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        if(!$request->hasFile("cover")||!$request->hasFile("cover_after")){   
            return response()->json([
            'status'=>0,
            'message'=>"File không được nhận",
            'code'=>500
            ]);  
        }
            $user=new User();
            $file=$request->file("cover");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("admin/cover"),$imageName);

            $file_after=$request->file("cover_after");
            $imageNameAfter=time().'_'.$file_after->getClientOriginalName();
            $file_after->move(\public_path("admin/cover"),$imageNameAfter);


            $user->full_name=$request->full_name;
            $user->password=Hash::make($request->password);
            $user->gender=$request->gender;
            $user->date=$request->date;
            $user->date_start=$request->date_start;
            $user->phone_number=$request->phone_number;
            $user->email=$request->email;
            $user->room_id=$request->room_id;
            $user->position=$request->position;
            $user->action=$request->action;
            $user->description=$request->description;
            if($request->description==null){
            $user->description="Chưa có dữ liệu";
            }
            $user->cover=$imageName;
            $user->cover_after=$imageNameAfter;
            $user->save();
            if($user){
                return response()->json([
                    'status'=>1,
                    'message'=>"Data Inserted Successfully",
                    'code'=>200,
                    'data'=>$user
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
        $message=[
            'required'=>":attribute không được để trống",
            'min:3'=>":attribute dữ liệu tối thiểu chỉ được 3 ký tự",
            'max:20'=>":attribute dữ liệu tối đa 15 ký tự",
            'email.unique'=>":attribute đã tồn tại trong dữ liệu",
            'email'=>"Bạn phải nhập đúng định dạng email",
            'phone.min'=>"Bạn phải nhập đủ 10 số",
            'phone.max'=>"Bạn phải nhập đủ 10 số",
            'phone.unique'=>"Số điện thoại đã tồn tại"
        ];
        $validate=Validator::make($request->all(),[
            'full_name'=>['required','min:3','max:40'],
            'email'=>['required','min:8','max:40','email'],
            'phone_number'=>['required','min:10','max:10']
        ],$message);
            if($validate->fails()){
                return response()->json([
                    'status'=>0,
                    'message'=>$validate->errors()->first(),
                    'code'=>200
                ]);
            }
            if(!$request->hasFile("cover")||!$request->hasFile("cover_after")){   
                $user=User::find($request->id);
                $user->full_name=$request->full_name;
                $user->password=Hash::make($request->password);
                $user->gender=$request->gender;
                $user->date=$request->date;
                $user->date_start=$request->date_start;
                $user->phone_number=$request->phone_number;
                $user->email=$request->email;
                $user->room_id=$request->room_id;
                $user->position=$request->position;
                $user->action=$request->action;
                $user->description=$request->description;
                if($request->description==null){
                $user->description="Chưa có dữ liệu";
                }
                $user->save();
                if($user){
                    return response()->json([
                        'status'=>1,
                        'message'=>"Data Inserted Successfully",
                        'code'=>200,
                        'data'=>$user
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
                $user=User::find($request->id);
                $file=$request->file("cover");
                $imageName=time().'_'.$file->getClientOriginalName();
                $file->move(\public_path("admin/cover"),$imageName);
    
                $file_after=$request->file("cover_after");
                $imageNameAfter=time().'_'.$file_after->getClientOriginalName();
                $file_after->move(\public_path("admin/cover"),$imageNameAfter);
    
    
                $user->full_name=$request->full_name;
                $user->password=Hash::make($request->password);
                $user->gender=$request->gender;
                $user->date=$request->date;
                $user->date_start=$request->date_start;
                $user->phone_number=$request->phone_number;
                $user->email=$request->email;
                $user->room_id=$request->room_id;
                $user->position=$request->position;
                $user->action=$request->action;
                $user->description=$request->description;
                if($request->description==null){
                $user->description="Chưa có dữ liệu";
                }
                $user->cover=$imageName;
                $user->cover_after=$imageNameAfter;
                $user->save();
                if($user){
                    return response()->json([
                        'status'=>1,
                        'message'=>"Data Inserted Successfully",
                        'code'=>200,
                        'data'=>$user
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
    public function getRoom(){
        $rooms=Room::all();
        return response()->json([
            'message'=>"Lấy dữ liệu phòng ban thành công",
            'code'=>200,
            'data'=>$rooms
        ]);
    }


}

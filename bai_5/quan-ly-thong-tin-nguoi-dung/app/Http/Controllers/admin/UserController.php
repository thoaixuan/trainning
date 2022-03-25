<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Room;
use Validator;
use PDF;
use File;  
use DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    private $uploadFolder;  
    public function __construct()  
    {  
      $this->uploadFolder = 'admin/cover/';  
    } 
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
            if(Auth::user()->position==1){
                $users=User::with('rooms')->whereHas('rooms',function($query){
                    $query->where('id',Auth::user()->room_id);
                })->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)->get();
            }else{
                $users=User::with('rooms')->offset($start)
                ->limit($limit)
                ->orderByDesc($order,$dir)->get();
            }   
     
        }else{
            if(Auth::user()->position==1){
                $users=User::with('rooms')->whereHas('rooms',function($query){
                    $query->where('id',Auth::user()->room_id);
                })->Where(function($query)use($search){
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
            }else{
                $users=User::with('rooms')->Where(function($query)use($search){
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
            'phone.min'=>"Bạn phải nhập đủ 10 số",
            'phone.max'=>"Bạn phải nhập đủ 10 số",
            'phone.unique'=>"Số điện thoại đã tồn tại"
        ];
        $validate=Validator::make($request->all(),[
            'full_name'=>['required','min:3','max:40'],
            'email'=>['required','min:8','max:40','unique:users','email'],
            'phone_number'=>['required','min:10','max:10','unique:users'],
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        if(!$request->hasFile("cover")||!$request->hasFile("cover_after")){ 
            //Thêm dữ liệu người dùng  
            $user=new User();
            $user->full_name=$request->full_name;
            $user->password=Hash::make($request->password);
            $user->gender=$request->gender;
            $user->date=$request->date;
            $user->date_start=$request->date_start;
            $user->phone_number=$request->phone_number;
            $user->email=$request->email;
            $user->room_id=$request->room_id;
            $user->status=$request->status;
            $user->description=$request->description;
            $user->permission_id=$request->permission_id;
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
            $user->permission_id=$request->permission_id;
            $user->status=$request->status;
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
                'status'=>1,
                'message'=>"Lấy dữ liệu người dùng thành công",
                'code'=>200,
                'data'=>$user
            ]);
        }else{
            return response()->json([
                'status'=>0,
                'message'=>"Đã xảy ra lỗi",
                'code'=>500,
            ]);
        }
    }
    public function getDetail(Request $request){
        $userId=Auth::user()->id;
        $user=User::where('id','=',$userId)->first();
        if($user){
            return response()->json([
                'status'=>1,
                'message'=>"Lấy dữ liệu người dùng thành công",
                'code'=>200,
                'data'=>$user
            ]);
        }else{
            return response()->json([
                'status'=>0,
                'message'=>"Đã xảy ra lỗi",
                'code'=>500,
                'data'=>$user
            ]);
        }
    }
    public function getInsert(Request $request){
        $userId=Auth::user()->id;
        $user=User::where('id','=',$userId)->first();
        if($user){
            return response()->json([
                'status'=>1,
                'message'=>"Lấy dữ liệu người dùng thành công",
                'code'=>200,
                'data'=>$user
            ]);
        }else{
            return response()->json([
                'status'=>0,
                'message'=>"Đã xảy ra lỗi",
                'code'=>500,
                'data'=>$user
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
                $user->gender=$request->gender;
                $user->date=$request->date;
                $user->date_start=$request->date_start;
                $user->phone_number=$request->phone_number;
                $user->email=$request->email;
                $user->room_id=$request->room_id;
                $user->permission_id=$request->permission_id;
                if($request->password){
                    $user->password=$request->password;
                }
                $user->status=$request->status;
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

                File::delete($this->uploadFolder. $user->cover);
                File::delete($this->uploadFolder. $user->cover_after);

                $file=$request->file("cover");
                $imageName=time().'_'.$file->getClientOriginalName();
                $file->move(\public_path("admin/cover"),$imageName);
    
                $file_after=$request->file("cover_after");
                $imageNameAfter=time().'_'.$file_after->getClientOriginalName();
                $file_after->move(\public_path("admin/cover"),$imageNameAfter);
                $user->full_name=$request->full_name;
                $user->gender=$request->gender;
                $user->date=$request->date;
                $user->date_start=$request->date_start;
                $user->phone_number=$request->phone_number;
                $user->email=$request->email;
                $user->room_id=$request->room_id;
                $user->permission_id=$request->permission_id;
                if($request->password){
                    $user->password=$request->password;
                }
                $user->status=$request->status;
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
                        'message'=>"Cập nhật dữ liệu người dùng thành công",
                        'code'=>200,
                        'data'=>$user
                    ]);
                }
                else{
                    return response()->json([
                        'status'=>0,
                        'message'=>"Đã xảy ra lỗi ",
                        'code'=>500
                    ]);
                }
    }
    public function delete(Request $request){
        $user=User::find($request->id);
        File::delete($this->uploadFolder. $user->cover);
        File::delete($this->uploadFolder. $user->cover_after);
        $user->delete();
        if($user){
            return response()->json([
                'status'=>1,
                'message'=>"Xóa dữ liệu người dùng thành công",
                'code'=>200,
                'data'=>$user
            ]);
        }else{
            return response()->json([
                'status'=>0,
                'message'=>"Đã xảy ra lỗi",
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
    public function checkLogin(){
        $user=User::leftjoin('rooms','users.room_id','=','rooms.id')
                ->leftjoin('permissions','rooms.permission_id','=','permissions.id')
                ->select(
                    'users.full_name',
                    'rooms.name',
                    'permissions.name',
                    'permissions.action'
                )->where('users.id','=',Auth::user()->id)->get();
         $action= json_decode($user[0]->action);
            return $action->update; 
    }
    public function dataRole(){
        $roles=Role::get();
        return response()->json([   
            'message'=>"Lấy dữ liệu chức vụ thành công",
            'code'=>200,
            'data'=>$roles
        ]);
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Permission;
use Illuminate\Support\Facades\Hash;
use Validator;
use Storage;
use File;

class UserController extends Controller
{
    public function index(){
        return view('admin.pages.user.user',['title'=>'Quản lý người dùng']);
    }
    public function anyData(Request $request){
        $columns[]='id';
        $columns[]='full_name';
        $columns[]='email';
        $columns[]='address';
        $columns[]='gender';
        $columns[]='phone_number';
        $columns[]='type';
        $columns[]='permissions.name';
     

        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=User::count();
        $totalFiltered=$totalData;
        // $userID=Auth::user()->id;

        if(empty($search)){
            $users=User::with('permissions')->offset($start)
            ->where('type','!=','AdminSystem')
            // ->where('users.id','!=',$userID)
            ->limit($limit)
            ->orderByDesc($order,$dir)->get();
        }else{
            $users=User::with('permissions')->Where(function($query)use($search){
                $query->where('full_name','like',"%{$search}%")
                        ->orWhere('email','like',"%{$search}%")
                        ->orWhere('id','like',"%{$search}%");   
            })
            ->where('type','!=','AdminSystem')
            // ->where('users.id','!=',$userID)
            ->offset($start)
            ->limit($limit)
            ->orderByDesc($order,$dir)
            ->get();
        }

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$users,
        );
        return json_encode($json_data);
    }
    public function getUsers(){
        $users=User::get();
        if($users){
            return response()->json([
                'status'=>1,
                'message'=>"Tải dữ liệu users thành công",
                'code'=>200,
                'data'=>$users,
            ]);
        }
        else{
            return response()->json([
                'status'=>0,
                'message'=>"Không tải được dữ liệu users",
                'code'=>500,
                'data'=>$users,
            ]);
        }
    }
    public function getPermission(){
        $permission=Permission::get();
        if($permission){
            return response()->json([
                'status'=>1,
                'message'=>"Tải dữ liệu phân quyền thành công",
                'code'=>200,
                'data'=>$permission,
            ]);
        }
        else{
            return response()->json([
                'status'=>0,
                'message'=>"Không tải được dữ liệu phân quyền",
                'code'=>500,
                'data'=>$permission,
            ]);
        }
    }
    public function getInsert(){
        return response()->json([
            'status'=>1,
            'message'=>"Thành công",
            'code'=>200
        ]);
    }
    public function insert(Request $request){
        $message=[
            'full_name.required'=>"Tên không được để trống",
            'full_name.min:3'=>"Tên tối thiểu 3 ký tự",
            'full_name.max:20'=>"Tên không quá 20 ký tự",
            'email.required'=>"Email không được để trống",
            'email.min:8'=>"Email tối thiểu 8 ký tự",
            'email.max:40'=>"Email không được quá 40 ký tự",
            'email.unique.tbl_users'=>"Email đã tồn tại",
            'email.email'=>"Nhập đúng định dạng email",
            'phone_number.unique'=>"Số điện thoại không được để trùng",
            
        ];
        $validate=Validator::make($request->all(),[
            'full_name'=>['required','min:3','max:20'],
            'email'=>['required','min:8','max:40','unique:tbl_users','email'],          
            'gender'=>['required'],
            'permission_id'=>['required'],
            'address'=>['required'],
            'phone_number'=>['required','unique:tbl_users'],     
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        //Thêm dữ liệu vào người dùng
        $users=new User();
        $users->email=$request->email;
        $users->gender=$request->gender;
        $users->permission_id=$request->permission_id;
        $users->address=$request->address;
        $users->phone_number=$request->phone_number;
        $users->type=$request->type;
        $users->full_name=$request->full_name;
        $users->password=Hash::make("abc123456");
        if($request->hasFile("cover")){
            $image = $request->file("cover");
            $name = time().'_'.convert_vi_to_en($image->getClientOriginalName());
            Storage::disk('profile')->put($name,File::get($image));
            $users->cover = $name;
        }
        else {
            $users->cover = '';
        }
        if($request->hasFile("cover_after")){
            $image2 = $request->file("cover_after");
            $name2 = time().'_'.convert_vi_to_en($image2->getClientOriginalName());
            Storage::disk('profile')->put($name2,File::get($image2));
            $users->cover_after = $name2;
        }
        else {
            $users->cover_after = '';
        }
        if($request->password){
           $users->password=Hash::make($request->password);
        }
        $users->description=$request->description;
        $users->save();
        if(!$users){
            return response()->json([
                'status'=>0,
                'message'=>"Đã xảy ra lỗi",
                'code'=>500
            ]);
        }

            return response()->json([
                'status'=>1,
                'message'=>"Cập nhật dữ liệu thành công",
                'code'=>200
            ]);
    }
    public function getUpdate(Request $request){
        $user=User::where('id','=',$request->id)->first();
        return response()->json([
            'status'=>1,
            'message'=>"Lấy dữ liệu người dùng thành công",
            'code'=>200,
            'data'=>$user,
        ]);
    }
    public function update(Request $request){
        $message=[
            'full_name.required'=>"Tên không được để trống",
            'full_name.min:3'=>"Tên tối thiểu 3 ký tự",
            'full_name.max:20'=>"Tên không quá 20 ký tự",
            'email.required'=>"Email không được để trống",
            'email.min:8'=>"Email tối thiểu 8 ký tự",
            'email.max:40'=>"Email không được quá 40 ký tự",
            'email.unique.users'=>"Email đã tồn tại",
            'email.email'=>"Nhập đúng định dạng email",
         
        ];
        $validate=Validator::make($request->all(),[
            'full_name'=>['required','min:3','max:20'],
            'email'=>['required','min:8','max:40','email'],          
            'gender'=>['required'],
            'permission_id'=>['required'],
            'address'=>['required'],
            'phone_number'=>['required'],     
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $users=User::where('id','=',$request->id)->first();
        if(!empty($request->password)){
            $users->password=Hash::make($request->password);
        }
        if($request->hasFile("cover")){
            if(!empty($users->cover)){
                Storage::disk('profile')->delete($users->cover);
            }
            $image = $request->file("cover");
            $name_img = time().'_'.convert_vi_to_en($image->getClientOriginalName());
            Storage::disk('profile')->put($name_img,File::get($image));
            $imageName = $name_img;
        }
        else {
            $imageName = $users->cover;
        }
        if($request->hasFile("cover_after")){
            if(!empty($users->cover_after)){
                Storage::disk('profile')->delete($users->cover_after);
            }
            $image2 = $request->file("cover_after");
            $name_img2 = time().'_'.convert_vi_to_en($image2->getClientOriginalName());
            Storage::disk('profile')->put($name_img2,File::get($image2));
            $imageName2 = $name_img2;
        }
        else {
            $imageName2 = $users->cover_after;
        }
        $users->cover = $imageName;
        $users->cover_after = $imageName2;
        $users->full_name=$request->full_name;
        $users->email=$request->email;
        $users->gender=$request->gender;
        $users->permission_id=$request->permission_id;
        $users->address=$request->address;
        $users->phone_number=$request->phone_number;
        $users->type=$request->type;
        $users->description=$request->description;
        $users->save();
        if(!$users){
            return response()->json([
                'status'=>0,
                'message'=>"Đã xảy ra lỗi",
                'code'=>500
            ]);
        }
            return response()->json([
                'status'=>1,
                'message'=>"Dữ liệu được cập nhật thành công",
                'code'=>200
            ]);
    }
    public function delete(Request $request){
        $user=User::find($request->id);
        $user->delete();
        if($user){
            return response()->json([
                'status'=>1,
                'message'=>"Xóa dữ liệu thành công",
                'code'=>200,
                'data'=>$user
            ]);
        }else{
            return response()->json([
                'status'=>0,
                'message'=>"Xóa dữ liệu thất bại",
                'code'=>500,
            ]);
        }
    }

}
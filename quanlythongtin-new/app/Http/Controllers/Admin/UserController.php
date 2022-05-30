<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Phongban;
use App\Permission;
use Validator;

class UserController extends Controller
{
    public function getUser()
    {
       return view('Admin.pages.user.user'); 
    }
    public function getDatatable(Request $Request)
    {
        $columns [] ='id';
        $columns [] ='name';
        $columns [] ='date_of_birth';
        $columns [] ='gender';
        $columns [] ='date_start';
        $columns [] ='phone_number';
        $columns [] ='status';

        $columns [] ='id';
     
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $totalData =  User::count();
        if(empty($search)){
        $User = User::offset($start)
        ->limit($limit)
        ->orderBy($order,$dir)
        ->get();
        } else {
            $User = User::Where(function($query)use($search){
	            $query->where('name', 'LIKE',"%{$search}%")
	            ->orWhere('phone_number', 'LIKE',"%{$search}%");
	        })
	        ->offset($start)
	        ->limit($limit)
	        ->orderBy($order,$dir)
	        ->get();
	        $totalFiltered =$User->count();
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalData), 
            "data"            => $User   
        );
        echo json_encode($json_data); 
    }

    public function getInsertUser(){
        return response()->json([
            'status'=>1,
            'message'=>"Thành công",
        ]);
    }

    public function postInsertUser(Request $Request) {
        $message=[
            'required'=>":attribute không được để trống",
            'max:20'=>":attribute dữ liệu tối đa 20 ký tự",
            'max:40'=>":attribute dữ liệu tối đa 40 ký tự",
            'email.unique'=>":attribute đã tồn tại trong dữ liệu",
            'email'=>"Bạn phải nhập đúng định dạng email",
            'phone.min'=>"Bạn phải nhập đủ 10 số",
            'phone.max'=>"Bạn phải nhập đủ 10 số",
        ];
        $validate=Validator::make($Request->all(),[
            'name'=>['required','max:40'],
            'email'=>['required','max:40','unique:users','email'],
            'password'=>['required'],
            'phone_number'=>['required','min:10','max:10'],
            'date_of_birth'=>['required'],
            'date_start'=>['required']
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status_validate' => 1,
                'data_error' => $validate->errors()->first()
            ]);
        }

        if(!$Request->hasFile("img_before")||!$Request->hasFile("img_after")){
        $User = new User();
	    $User->name = $Request->name;
	    $User->email = $Request->email;
        $User->password = bcrypt($Request->password);
        $User->phone_number = $Request->phone_number;
        $User->gender = $Request->gender;
        $User->date_of_birth = $Request->date_of_birth;
        $User->date_start = $Request->date_start;
        $User->status = $Request->status;
        $User->description = $Request->description;
        $User->id_permissions = $Request->id_permissions;
        $User->id_phongban = $Request->id_phongban;
        $User->save();

        return response()->json([
            'name' => 'Thành công',
            'status' => 200,
            'data_user' => $User
        ]);
        }
        $User = new User();
	    $User->name = $Request->name;
	    $User->email = $Request->email;
        $User->password = bcrypt($Request->password);
        $User->phone_number = $Request->phone_number;
        $User->gender = $Request->gender;
        $User->date_of_birth = $Request->date_of_birth;
        $User->date_start = $Request->date_start;
        $User->status = $Request->status;
        $User->description = $Request->description;
        $User->id_permissions = $Request->id_permissions;
        $User->id_phongban = $Request->id_phongban;

        $input_file = $Request->file("img_before");
        $file_before = time().'_'.$input_file->getClientOriginalName();
        $input_file->move('uploads', $file_before);

        $input_file = $Request->file("img_after");
        $file_after = time().rand(10,100).'_'.$input_file->getClientOriginalName();
        $input_file->move('uploads', $file_after);


        $User->img_before = $file_before;
        $User->img_after = $file_after;

        $User->save();

        return response()->json([
            'name' => 'Thành công',
            'status' => 200,
            'data_user' => $User
        ]);
        
    }

    public function getUpdateUser(Request $Request) {
        $User = User::where('users.id','=',$Request->id)->first();
        return response()->json([
            'name' => 'Thành công',
            'status' => 200,
            'data' => $User
        ]);
    }

    public function postUpdateUser(Request $Request)
	{
            $message=[
                'required'=>":attribute không được để trống",
                'max:20'=>":attribute dữ liệu tối đa 20 ký tự",
                'max:40'=>":attribute dữ liệu tối đa 40 ký tự",
                'email.unique'=>":attribute đã tồn tại trong dữ liệu",
                'email'=>"Bạn phải nhập đúng định dạng email",
                'phone.min'=>"Bạn phải nhập đủ 10 số",
                'phone.max'=>"Bạn phải nhập đủ 10 số",
            ];
            $validate=Validator::make($Request->all(),[
                'name'=>['required','max:40'],
                'email'=>['required','max:40','email'],
                'phone_number'=>['required','min:10','max:10'],
                'date_of_birth'=>['required'],
                'date_start'=>['required']
            ],$message);
            if($validate->fails()){
                return response()->json([
                    'status_validate' => 1,
                    'data_error' => $validate->errors()->first()
                ]);
            }
	        if(!$Request->hasFile("img_before")||!$Request->hasFile("img_after")){
                $User = User::find($Request->id);
                $User->name = $Request->name;
                $User->email = $Request->email;
                $User->phone_number = $Request->phone_number;
                $User->gender = $Request->gender;
                $User->date_of_birth = $Request->date_of_birth;
                $User->date_start = $Request->date_start;
                $User->status = $Request->status;
                $User->description = $Request->description;
                $User->id_permissions = $Request->id_permissions;
                $User->id_phongban = $Request->id_phongban;
                
                $User->save();
        
                return response()->json([
                    'name' => 'Thành công',
                    'status' => 200,
                    'data_user' => $User
                ]);
                }
                $User = User::find($Request->id);
                $User->name = $Request->name;
                $User->email = $Request->email;
                $User->phone_number = $Request->phone_number;
                $User->gender = $Request->gender;
                $User->date_of_birth = $Request->date_of_birth;
                $User->date_start = $Request->date_start;
                $User->status = $Request->status;
                $User->description = $Request->description;
                $User->id_permissions = $Request->id_permissions;
                $User->id_phongban = $Request->id_phongban;

                $input_file = $Request->file("img_before");
                $file_before = time().'_'.$input_file->getClientOriginalName();
                $input_file->move('uploads', $file_before);
        
                $input_file = $Request->file("img_after");
                $file_after = time().rand(10,100).'_'.$input_file->getClientOriginalName();
                $input_file->move('uploads', $file_after);
        
        
                $User->img_before = $file_before;
                $User->img_after = $file_after;
        
                $User->save();
                return response()->json([
                    'name' => 'Thành công',
                    'status' => 200,
                    'data_user' => $User
                ]);
	 
	}

    public function getPermission(){
        $Permission=Permission::get();
        return response()->json([
            'name'=>"Lấy dữ liệu Permission",
            'status'=>200,
            'data'=>$Permission,
        ]);
    }

    public function destroyUser( Request $Request ) {
        $result = User::where('id','=',$Request->id)->delete();
        return response()->json([
            'status'=>1,
            'message'=>"Xóa thành công",
            'code'=>200,
            'data'=>$result
        ]);
    }
}

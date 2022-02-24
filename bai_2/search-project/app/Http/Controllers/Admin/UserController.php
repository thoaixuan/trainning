<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Service;
use Illuminate\Support\Facades\Hash;
use Validator;


class UserController extends Controller
{
    function index(){
        $user=User::with('project')->with('service')->orderBy('id','DESC')->get();
        return view('admin.pages.user.user',compact('user'));
    }

    public function anyData(Request $request)
    {
        $columns[]='id';
        $columns[]='project.projects_name';
        $columns[]='status';
        $columns[]='name';
        $columns[]='service.name';
        $columns[]='phone';
        $columns[]='email';

        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=User::count();
        $totalFiltered=$totalData;

        if(empty($search)){
       
            $user=User::with('project')->with('service')->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();
        }else{
            $user=User::with('project')->with('service')->Where(function($query) use ($search){
                $query->where('name','like',$search)
                        ->orWhere('phone','like',$search);
            })
            ->offset($start)
            ->limit($limit)
            ->orderByDesc($order,$dir)
            ->get();
            $totalFiltered = $user->count();
        }

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$user,
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
            'name.regex'=>"Bạn phải nhập đúng định dạng của chữ",
            'phone.min'=>"Bạn phải nhập đủ 10 số",
            'phone.max'=>"Bạn phải nhập đủ 10 số",
            'phone.unique'=>"Số điện thoại đã tồn tại"
        ];
        $validate=Validator::make($request->all(),[
            'name'=>['required','min:3','max:40'],
            'email'=>['required','min:8','max:40','unique:users','email'],
            'password'=>['required','min:8','max:40'],
            'phone'=>['required','min:10','max:10','unique:users']
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->password=Hash::make($request->password);
        $user->save();
        if($user){
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
            'name.regex'=>"Bạn phải nhập đúng định dạng của chữ",
            'phone.min'=>"Bạn phải nhập đủ 10 số",
            'phone.max'=>"Bạn phải nhập đủ 10 số",
            'phone.unique'=>"Số điện thoại đã tồn tại",
            'phone.integer'=>"Định dạng số điện thoại phải là số"
        ];
        $validate=Validator::make($request->all(),[
            'name'=>['required','min:3','max:40'],
            'email'=>['required','min:8','max:40','email'],
            'phone'=>['required','unique:users','integer']
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $user=User::find($request->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->password=Hash::make($request->password);
        $user->save();
        if($user){
            return response()->json([
                'status'=>1,
                'message'=>"Data Update Successfully",
                'code'=>200,
                'data'=>$user
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
    public function getProject(Request $request){
        $project= Project::orderBy('id','DESC')->get();
        return response()->json([
            'message'=>"Lấy dữ liệu khách hàng thành công",
            'code'=>200,
            'data'=>$project
        ]);
    }

    public function getService(Request $request){
        $services= Service::orderBy('id','DESC')->get();
        return response()->json([
            'message'=>"Lấy dữ liệu dịch vụ thành công",
            'code'=>200,
            'data'=>$services
        ]);
    }
    


}

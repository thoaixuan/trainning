<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Phongban;
use App\Group;
use App\Position;
use Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUser()
   {
       return view('Admin.pages.user.user'); 
   }
   public function getDatatable(Request $Request)
    {
        $columns [] ='userID';
        $columns [] ='name';
        $columns [] ='date_of_birth';
        $columns [] ='gender';
        $columns [] ='date_start';
        $columns [] ='phone_number';
        $columns [] ='status';

        $columns [] ='userID';
     
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $totalData =  User::count();
        if(empty($search)){
        $User = Group::join('users', 'users.id', '=', 'group.user_id')
        ->join('phongban','phongban.id','=','group.phongban_id')
        // ->join('position','position.id','=','group.position_id')
        ->whereIn('phongban.id', [1,2])
        ->select(
            'users.id as userID',
            'users.name',
            'users.date_of_birth',
            'users.gender',
            'users.date_start',
            'users.phone_number',
            'users.status',
            'users.email',
            'users.description',
            'users.img_before',
            'users.img_after',
            'group.*',
            'group.group_id as idGroup')
        // ->offset($start)
        // ->limit($limit)
        // ->orderBy($order,$dir)
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

    public function postInsertUser(Request $Request) {
        $message = [
            'required'=>":attribute không được để trống",
        ];
        $validate = Validator::make($Request->all(),[
            'name'=>['required','max:150']
            
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
        $User->save();

        DB::table('group')->insert([
            'group_name' => 'Group IT',
            'phongban_id' => $Request->phongban_id,
            'position_id' => $Request->position_id,
            'user_id' => $User->id++
        ]);
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

        $input_file = $Request->file("img_before");
        $file_before = time().'_'.$input_file->getClientOriginalName();
        $input_file->move('uploads', $file_before);

        $input_file = $Request->file("img_after");
        $file_after = time().rand(10,100).'_'.$input_file->getClientOriginalName();
        $input_file->move('uploads', $file_after);


        $User->img_before = $file_before;
        $User->img_after = $file_after;

        $User->save();

        DB::table('group')->insert([
            'group_name' => 'Group IT',
            'phongban_id' => $Request->phongban_id,
            'position_id' => $Request->position_id,
            'user_id' => $User->id++
        ]);
        return response()->json([
            'name' => 'Thành công',
            'status' => 200,
            'data_user' => $User
        ]);
        
    }

    public function getUpdateUser(Request $Request) {
        $User = Group::join('users', 'users.id', '=', 'group.user_id')
        ->join('phongban','phongban.id','=','group.phongban_id')
        ->where('users.id','=',$Request->id)->first();
        return response()->json([
            'name' => 'Thành công',
            'status' => 200,
            'data' => $User
        ]);
    }

    public function postUpdateUser(Request $Request)
	{
            $message = [
                'required'=>":attribute không được để trống",
            ];
            $validate = Validator::make($Request->all(),[
                'name'=>['required']
                
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
                $User->password = bcrypt($Request->password);
                $User->phone_number = $Request->phone_number;
                $User->gender = $Request->gender;
                $User->date_of_birth = $Request->date_of_birth;
                $User->date_start = $Request->date_start;
                $User->status = $Request->status;
                $User->description = $Request->description;
                $User->save();
        
                DB::table('group')->where('group_id', $Request->group_id)->update([
                    'phongban_id' => $Request->phongban_id,
                    'position_id' => $Request->position_id
                ]);
                return response()->json([
                    'name' => 'Thành công',
                    'status' => 200,
                    'data_user' => $User
                ]);
                }
                $User = User::find($Request->id);
                $User->name = $Request->name;
                $User->email = $Request->email;
                $User->password = bcrypt($Request->password);
                $User->phone_number = $Request->phone_number;
                $User->gender = $Request->gender;
                $User->date_of_birth = $Request->date_of_birth;
                $User->date_start = $Request->date_start;
                $User->status = $Request->status;
                $User->description = $Request->description;
        
                $input_file = $Request->file("img_before");
                $file_before = time().'_'.$input_file->getClientOriginalName();
                $input_file->move('uploads', $file_before);
        
                $input_file = $Request->file("img_after");
                $file_after = time().rand(10,100).'_'.$input_file->getClientOriginalName();
                $input_file->move('uploads', $file_after);
        
        
                $User->img_before = $file_before;
                $User->img_after = $file_after;
        
                $User->save();
        
                DB::table('group')->where('group_id', $Request->group_id)->update([
                    'phongban_id' => $Request->phongban_id,
                    'position_id' => $Request->position_id
                ]);
                return response()->json([
                    'name' => 'Thành công',
                    'status' => 200,
                    'data_user' => $User
                ]);
	 
	}

    public function destroyUser( Request $Request ) {
        $result = User::where('id','=',$Request->id)->delete();
        return $result;
    }

    public function getPhongban(){
        $Phongban = Phongban::all();
        return response()->json([
            'message'=>"Success",
            'status'=>200,
            'data'=>$Phongban
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Phongban;
use App\Group;
use App\Position;
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

    public function postInsertUser(Request $Request) {
        $message = [
            'required'=>":attribute không được để trống",
        ];
        $validate = Validator::make($Request->all(),[
            'phongban_name'=>['required','max:150']
            
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status_validate' => 1,
                'data_error' => $validate->errors()->first()
            ]);
        }
        $Phongban = new Phongban();
	    $Phongban->phongban_name = $Request->phongban_name;
	    $Phongban->phongban_description = $Request->phongban_description;
	    if($Phongban->save()){
	        return response()->json([
                'name' => 'Thành công',
                'status' => 200,
                'data' => $Phongban
            ]);
	    }else{
	        return response()->json([
                'name' => 'Thất bại',
                'status' => 500,
                'data' => $Phongban
            ]);
	    }
    }

    public function getUpdateUser(Request $Request) {
        $User = User::where('id','=',$Request->id)->first();
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
                'phongban_name'=>['required']
                
            ],$message);
            if($validate->fails()){
                return response()->json([
                    'status_validate' => 1,
                    'data_error' => $validate->errors()->first()
                ]);
            }
	        $Phongban =  Phongban::find($Request->id);
	        $Phongban->phongban_name = $Phongban->phongban_name;
		    $Phongban->phongban_description = $Request->phongban_description;
	        if($Phongban->save()){
                return response()->json([
                    'name' => 'Thành công',
                    'status' => 200,
                    'data' => $Phongban
                ]);
            }else{
                return response()->json([
                    'name' => 'Thất bại',
                    'status' => 500,
                    'data' => $Phongban
                ]);
            }
	 
	}

    public function destroyUser( Request $Request ) {
        $result = User::where('id','=',$Request->id)->delete();
        return $result;
    }

    public function getPhongban(){

        $Phongban = Group::join('users', 'users.id', '=', 'group.user_id')
        ->join('phongban','phongban.id','=','group.phongban_id')
        ->join('position','position.id','=','group.position_id')
        ->whereIn('phongban.id', [1])
        ->select('users.name','phongban.phongban_name','position.position_name','position.id')
        ->get();
        // $Phongban = Phongban::all();
        return response()->json([
            'message'=>"Success",
            'status'=>200,
            'data'=>$Phongban
        ]);
    }
}

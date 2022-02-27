<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function getUser()
    {
       return view('Admin.pages.user.user'); 
    }
    public function getDatatable(Request $Request)
    {
      
        $columns [] ='id';
        $columns [] ='full_name';
        $columns [] ='email';
        $columns [] ='address';
        $columns [] ='phone_number';
        $columns [] ='note';
        $columns [] ='keyword';
        $columns [] ='id';
     
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $totalData =  User::count();
        if(empty($search)){
        $Users = User::offset($start)
        ->limit($limit)
        ->orderBy($order,$dir)
        ->get();
        } else {
            $Users = User::Where(function($query)use($search){
	            $query->where('full_name', 'LIKE',"%{$search}%")
	            ->orWhere('email', 'LIKE',"%{$search}%")
	            ->orWhere('address', 'LIKE',"%{$search}%")
                ->orWhere('phone_number', 'LIKE',"%{$search}%")
                ->orWhere('note', 'LIKE',"%{$search}%")
                ->orWhere('keyword', 'LIKE',"%{$search}%");
	        })
	        ->offset($start)
	        ->limit($limit)
	        ->orderBy($order,$dir)
	        ->get();
	        $totalFiltered = $Users->count();
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalData), 
            "data"            => $Users   
        );
        echo json_encode($json_data); 
    }

    public function postInsertUsers(Request $Request) {
        $Users = new User();
	    $Users->full_name = $Request->full_name;
	    $Users->email = $Request->email;
	    $Users->address = $Request->address;
        $Users->phone_number = $Request->phone_number;
        $Users->keyword = $Request->keyword;
        $Users->note = $Request->note;
        $Users->password = bcrypt($Request->password);
        $Users->permissions = 0;
	    if($Users->save()){
	        return response()->json([
                'name' => 'Thành công',
                'status' => 200,
                'data' => $Users
            ]);
	    }else{
	        return response()->json([
                'name' => 'Thất bại',
                'status' => 500,
                'data' => $Users
            ]);
	    }
    }

    public function getUpdateUsers(Request $Request) {
        $Users = User::where('id','=',$Request->id)->first();
        return response()->json([
            'name' => 'Thành công',
            'status' => 200,
            'data' => $Users
        ]);
    }

    public function postUpdateUsers(Request $Request)
	{
	        $Users =  User::find($Request->id);
	        $Users->full_name = $Request->full_name;
		    $Users->email = $Request->email;
		    $Users->password = bcrypt($Request->password);
            $Users->address = $Request->address;
            $Users->phone_number = $Request->phone_number;
            $Users->keyword = $Request->keyword;
            $Users->note = $Request->note;
	        if($Users->save()){
                return response()->json([
                    'name' => 'Thành công',
                    'status' => 200,
                    'data' => $Users
                ]);
            }else{
                return response()->json([
                    'name' => 'Thất bại',
                    'status' => 500,
                    'data' => $Users
                ]);
            }
	 
	}

    public function destroyUser( Request $Request ) {
        $result = User::where('id','=',$Request->id)->delete();
        return $result;
    }
}

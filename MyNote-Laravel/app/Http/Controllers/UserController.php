<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users(Request $Request)
    {
        $columns [] ='id';
        $columns [] ='name';
        $columns [] ='email';
        $columns [] ='per_id';
        $columns [] ='created_at';
        $columns [] ='updated_at';

     
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $totalData =  User::count();
        if(empty($search)){
        $users = User::offset($start)
        ->limit($limit)
        ->orderBy($order,$dir)
        ->get();
        } else {
            $users = User::Where(function($query)use($search){
	            $query->where('name', 'LIKE',"%{$search}%")
	            ->orWhere('email', 'LIKE',"%{$search}%");
	        })
	        ->offset($start)
	        ->limit($limit)
	        ->orderBy($order,$dir)
	        ->get();
	        $totalFiltered =$users->count();
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalData), 
            "data"            => $users   
        );
        echo json_encode($json_data); 
    }


    public function index()
    {
        return view('pages.users.users');
    }

    public function getUser(Request $Request){
        $user = User::find($Request->id); 
        return response()->json(['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->per_id = $request->per_id;
        $user->password = bcrypt($request->input('password'));

        if($user->save()){
	        return response()->json(['status' => 1,
                                'data' => $user,
                                'message' => 'Thêm thành công',]);
	    }else{
            return response()->json(['status' => 0,
            'data' => null,
            'message' => 'Thêm thất bại']);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $Request)
    {
        $user =  User::find($Request->id);
        $user->name = $Request->name;
        $user->email = $Request->email;
        $user->per_id = $Request->per_id;
        if($Request->password != "")
        $user->password = bcrypt($Request->password);

        if($user->save()){
            return response()->json([
                'message' => 'Sửa thành công',
                'status' => 1,
                'data' => $user
            ]);
        }else{
            return response()->json([
                'message' => 'Sửa thất bại',
                'status' => 0,
                'data' => $user
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $Request)
    {
        $result = User::where('id','=',$Request->id)->delete();
        return response()->json([
            'status'=>1,
            'message'=>"Xóa thành công",
        ]);
    }
}

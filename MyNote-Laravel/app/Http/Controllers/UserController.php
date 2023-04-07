<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    public function getId(){
        return response()->json(['id' => auth()->id(),
                                'per_id' => auth()->user()->per_id]);
    }

    public function index()
    {
        return view('pages.users.users');
    }

    public function getUser($id){
        $user = User::find($id); // Retrieve user with ID 1
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
                                'data' => $user]);
	    }else{
            return response()->json(['status' => 0,
            'data' => 'Thêm thất bại']);
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
                'name' => 'Sửa Thành công',
                'status' => 1,
                'data' => $user
            ]);
        }else{
            return response()->json([
                'name' => 'Thất bại',
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
    public function destroy($id)
    {
        $result = User::where('id','=',$id)->delete();
        return response()->json([
            'status'=>1,
            'message'=>"Xóa thành công",
        ]);
    }
}

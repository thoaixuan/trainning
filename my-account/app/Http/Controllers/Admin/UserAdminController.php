<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserAdminController extends Controller
{
    public function index()
    {
        return view('pages.users.users');
    }

    public function createUsers()
    {
        return view('pages.users.addNewUsers');
    }

    public function getTableUsers(Request $request)
    {
        $columns = ['id', 'name', 'phone', 'email', 'permission', 'status'];

        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumn = $columns[$request->input('order.0.column')];
        $orderDirection = $request->input('order.0.dir');

        $totalData = User::count();
        $users = User::offset($start)
            ->limit($limit)
            ->orderBy($orderColumn, $orderDirection)
            ->get();
            $json_data = [
                "draw" => intval($request->input('draw')),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalData),
                "data" => $users
            ];

            return response()->json($json_data);
    }
    private function validateRequest(Request $request, $rules, $message)
    {
        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'data' => null,
                'message' => $validator->errors()->first()
            ]);
        }

        return null;
    }

    public function createUsersPost(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:5',
            'phone' => 'required|max:11',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'permission' => 'required|in:1,2,3',
            'status' => 'required|in:1,0',
        ];

        $message = [
            'name.required' => 'Họ và tên không được để trống',
            'name.min' => 'Họ và tên không được nhỏ hơn 5 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max' => 'Họ và tên không được lớn hơn 11 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu không được nhỏ hơn 5 ký tự',
            'permission.required' => 'Phân quyền không được để trống',
            'status.required' => 'Trạng thái không được để trống',
        ];

        $validationResult = $this->validateRequest($request, $rules, $message);

        if ($validationResult !== null) {
            return $validationResult;
        }

        $Users = new User($request->all());
        $Users->password = Hash::make($request->password);
        if($Users->save()){
            return response()->json([
            'status' => 1,
            'data' => $Users,
            'message' => 'Thêm dữ liệu thành công']);
        }else{
            return response()->json([
            'status' => 0,
            'data' => null,
            'message' => 'Thêm dữ liệu thất bại']);
        }
    }

    public function update(Request $request, $id)
    {
        $Users = User::where('id','=',$request->id)->first();
        $data = array(
            "name" => $Users->name,
            "phone" => $Users->phone,
            'email' => $Users->email,
            'permission' => $Users->permission,
            'status' => $Users->status,
            "address" => $Users->address,
            "id" => $Users->id,
        );
        return view('pages.users.updateUsers', ['data' => $data]);
    }

    public function updateUsersPost(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:5',
            'phone' => 'required|max:11',
            'email' => 'required|email',
            'permission' => 'required|in:1,2,3',
            'status' => 'required|in:1,0',
        ];

        $message = [
            'name.required' => 'Họ và tên không được để trống',
            'name.min' => 'Họ và tên không được nhỏ hơn 5 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max' => 'Họ và tên không được lớn hơn 11 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'permission.required' => 'Phân quyền không được để trống',
            'status.required' => 'Trạng thái không được để trống',
        ];

        $validationResult = $this->validateRequest($request, $rules, $message);

        if ($validationResult !== null) {
            return $validationResult;
        }

        $Users =  User::find($request->id);
        $Users->name = $request->name;
        $Users->phone = $request->phone;
        $Users->email = $request->email;
        $Users->permission = $request->permission;
        $Users->status = $request->status;
        $Users->address = $request->address;
        if($Users->save()){
            return response()->json([
                'message' => 'Sửa Thành công',
                'status' => 1,
                'data' => $Users
            ]);
        }else{
            return response()->json([
                'message' => 'Thất bại',
                'status' => 0,
                'data' => $Users
            ]);
        }
    }

    public function delete(Request $request)
    {
        $result = User::where('id','=',$request->id)->delete();
        return response()->json([
            'status'=>1,
            'message'=>"Xóa thành công",
            'data'=>$result
        ]);
    }
}

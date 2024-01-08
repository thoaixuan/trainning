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

    public function getTableUsers(Request $request)
    {
        $columns = ['id', 'name', 'permission', 'status'];

        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumn = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir');
        $searchValue=$request->input('search');
        $searchPer=$request->input('permission');
        $searchDepart=$request->input('department');

        $query = User::query();
        if (!empty($searchValue)) {
            $query->where(function($find) use ($searchValue) {
                $find->where('name', 'LIKE', "%{$searchValue}%");
            });
        }

        if (!empty($searchPer)) {
            $query->where('permission', $searchPer);
        }
        if (!empty($searchDepart)) {
            $query->where('department', $searchDepart);
        }

        $totalData = User::count();
        $users = $query->offset($start)
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
            'permission' => 'required|in:1,2,3,4',
            'status' => 'required|in:1,0',
            'department' => 'required|in:1,2,3,4',
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
            'permission.required' => 'Chức vụ không được để trống',
            'status.required' => 'Trạng thái không được để trống',
            'department.required' => 'Phòng ban không được để trống',
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
    public function getUser(Request $request)
    {
        $Users = User::where('id','=',$request->id)->first();
        return response()->json([
            'message' => 'Thành công',
            'status' => 1,
            'data' => $Users
        ]);
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
        $Users->birthdate = $request->birthdate;
        $Users->department = $request->department;
        $Users->status = $request->status;
        $Users->sex = $request->sex;
        $Users->address = $request->address;
        $Users->url = $request->url;
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

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $imageUrl = asset('uploads/' . $imageName);
            return response()->json([
                'message' => 'Upload ảnh thành công',
                'status' => 1,
                'url'=>$imageUrl,
            ]);
        } else{
            return response()->json([
                'message' => 'Thất bại',
                'status' => 0,
            ]);
        }
    }

}

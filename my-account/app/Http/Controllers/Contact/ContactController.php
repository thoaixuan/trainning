<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact.contact');
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

    public function updateUsersPost(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
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

        $Users = new User($request->all());
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
}

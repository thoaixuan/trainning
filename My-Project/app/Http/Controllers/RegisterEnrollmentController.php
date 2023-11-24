<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterEnrollmentController extends Controller
{
    public function index(){
        return view('register.pages.index');
    }
    public function postInfo(Request $request){

        $rules = [
            'fullName' => 'required|min:5',
            'phoneNumber' => 'required|min:10|max:10',
            'email' => 'required|email',
        ];

        $message = [
            'fullName.required' => 'Họ và tên không được để trống',
            'fullName.min' => 'Họ và tên không được nhỏ hơn 5 ký tự',
            'phoneNumber.required' => 'Số điện thoại không được để trống',
            'phoneNumber.min' => 'Họ và tên không được nhỏ hơn 10 ký tự',
            'phoneNumber.max' => 'Họ và tên không được ít hơn 10 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
            return $validator->errors()->first();

        } else{
                $emails = $request->email;
                $dataInfo = array(
                    "fullname" => $request->fullName,
                    'phone' => $request->phoneNumber,
                    'major' => $request->selectMajor,
                    "address" => $request->selectAddress,
                );
                // Gửi mail
                \Mail::to($emails)->send (new \App\Mail\SendMail(['data' => $dataInfo]));
                return redirect()->route('pages.success');
        }

    }

    public function success(){
        return view('register.pages.success');
    }
}

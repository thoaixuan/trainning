<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use App\User;
use Auth;
use Validator;

class ProfileController extends Controller
{
    public function index(){
        SEOMeta::setTitle("Thông tin cá nhân");
        OpenGraph::addProperty('locale','vi_VN');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('title', "Thông tin cá nhân");
        TwitterCard::addValue("title", "Thông tin cá nhân");
        JsonLd::setTitle("Thông tin cá nhân");
        JsonLdMulti::setType('Article');
        return view('guest.pages.profile.profile');
    }
    public function update(Request $request){
        $message = [
            'required'=>":attribute không được để trống",
            'max:20'=>":attribute dữ liệu tối đa 20 ký tự",
            'email'=>"Bạn phải nhập đúng định dạng email",
            'full_name.regex'=>"Bạn phải nhập đúng định dạng của chữ",
            'phone_number.min'=>"Bạn phải nhập đủ 10 số",
            'phone_number.max'=>"Bạn phải nhập đủ 10 số",
        ];
        $validate = Validator::make($request->all(),[
            'full_name'=>['required','min:3','max:40'],
            'email'=>['required','min:8','max:40','email'],
            'phone_number'=>['required','min:10','max:10']
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>500
            ]);
        }
        $user = User::where('id','=',Auth::user()->id)->first();
        $user->full_name = $request->full_name;
        $user->phone_number=$request->phone_number;
        $user->email=$request->email;
        $user->gender=$request->gender;
        $user->address=$request->address;
        $user->save();
        if($user){
            return response()->json([
                'status'=>1,
                'message'=>"Cập nhật thông tin thành công",
                'code'=>200
            ]);
        }
        return response()->json([
            'status'=>0,
            'message'=>"Cập nhật thông tin thất bại",
            'code'=>500
        ]);
    }
    public function changPassword(Request $request){
        // dd($request->all());
        $message = [
            'required'=>":attribute không được để trống",
        ];
        $validate = Validator::make($request->all(),[
            'password'=>['required','min:3','max:40'],
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>500
            ]);
        } 
        $user=User::where('id','=',Auth::user()->id)->first();
        //Chang password
        $data = ['email'=>$user->email,'password'=>$request->current_password];
        if(Auth::attempt($data)){
            //    check chang password
            $user->password=bcrypt($request->password);
            $user->save();
            return response()->json([
                'status'=>1,
                'message'=>"Thay đổi mật khẩu thành công",
                'code'=>200
            ]);
        }else{
            return response()->json([
                'status'=>0,
                'message'=>"Thay đổi mật khẩu thất bại ",
                'code'=>500
            ]);
        }
    
    }
}

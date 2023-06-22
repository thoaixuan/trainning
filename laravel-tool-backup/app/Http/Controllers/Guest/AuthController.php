<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Mail;
use App\User;
use Illuminate\Support\Str;
use Socialite; // use socialite
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
class AuthController extends Controller
{
    public function indexLogin(){
        if(Auth::check()){
            return view('guest.pages.home.home');
        }
        else{
            \SEOMeta::setTitle("Đăng nhập");
            OpenGraph::addProperty('locale','vi_VN');
            OpenGraph::addProperty('type', 'article');
            OpenGraph::addProperty('title', "Đăng nhập");
            TwitterCard::addValue("title", "Đăng nhập");
            JsonLd::setTitle(settings()->website_name);
            JsonLdMulti::setType('Article');
            return view('guest.pages.auth.login');
        }
    }
    public function indexForgot(){
        return view('guest.pages.auth.forgot');
    }
    public function postForgot(Request $request){
        $message=[
            'g-recaptcha-response.required'=>"Hãy xác nhận nếu bạn không phải là robot",
            'g-recaptcha-response.captcha'=>"Captcha bị lỗi! Hãy thử lại",
            'email.required'=>"Bạn phải nhập email",
        ];
        $validate=Validator::make($request->all(),[
            'email'=>'required',
            'g-recaptcha-response' => 'required|captcha',
        ],$message);
        if($validate->fails()){
            return redirect()->back()->with('error',$validate->errors()->first());
        }
        // Config mail
        foreach(json_decode(settings()->config_mail) as $list_mail){
            $mail_driver = $list_mail->mail_driver;
            $mail_host = $list_mail->mail_host;
            $mail_port = $list_mail->mail_port;
            $mail_encryption = $list_mail->mail_encryption;
            $mail_username = $list_mail->mail_username;
            $mail_password = $list_mail->mail_password;
            $mail_from_address = $list_mail->mail_from_address;
            $mail_from_name = $list_mail->mail_from_name;

            $mail_receive = $list_mail->mail_receive;
        }
         // Config mail
         config([
            'mail.default' => $mail_driver,
            'mail.mailers.smtp.host' => $mail_host,
            'mail.mailers.smtp.port' => $mail_port,
            'mail.mailers.smtp.encryption' => $mail_encryption,
            'mail.mailers.smtp.username' => $mail_username,
            'mail.mailers.smtp.password' => $mail_password,
            'mail.from.address' => $mail_from_address,
            'mail.from.name' => $mail_from_name
        ]);
        $title_mail = "Lấy lại mật khẩu";
        $user = User::where('email','=',$request->email)->get();
        foreach($user as $key => $value){
            $user_id = $value->id;
        }
        if($user){
            $count_user = $user->count();
            if($count_user == 0){
                return redirect()->back()->with('error','Email chưa được đăng ký để khôi phục mật khẩu');
            }else {
                $token_random = Str::random();
                $user = User::find($user_id);
                $user->forgot_token = $token_random;
                $user->save();
                $to_email = $request->email;
                $link_reset_pass = url('/update-new-pass?email='.$to_email.'&token='.$token_random);
                $data = array(
                    "name" => $title_mail,
                    "body" => $link_reset_pass,
                    "email"=> $request->email,
                    "email_to" => $mail_receive,
                    "email_from" => $mail_from_address
                );
                Mail::send('guest.mails.forgot-pass',
                ['data' => $data], function ($message) use ($title_mail, $data)
                {
                    $message->to($data['email_to'])->subject($title_mail);
                });
                return redirect()->back()->with('message','Gửi mail thành công, vui lòng vào check mail để reset password.');

            }
        } 
    }
    public function update_new_pass() {
        return view('guest.pages.auth.update-new-pass');
    }
    public function reset_new_pass(Request $request){
        $token_random = Str::random();
        $user = User::where('email','=',$request->email)->where('forgot_token','=',$request->forgot_token)->get();
        $count_user = $user->count();
        if($count_user = 1){
            foreach($user as $key => $val){
                $user_id = $val->id;
            }
            $reset = User::find($user_id);
            $reset->password = password_hash($request->password, PASSWORD_DEFAULT);
            $reset->forgot_token = $token_random;
            $reset->save();
            return redirect()->back()->with('success_new_pass','Mật khẩu đã cập nhật mới');
        }else {
            return redirect()->back()->with('error_new_pass','Vui lòng nhập lại email vì link đã quá hạn');
        }
    }
    public function login(Request $request){
        $message=[
            'g-recaptcha-response.required'=>"Hãy xác nhận nếu bạn không phải là robot",
            'g-recaptcha-response.captcha'=>"Captcha bị lỗi! Hãy thử lại",
            'password.required'=>"Bạn phải nhập mật khẩu",
        ];
        $validate=Validator::make($request->all(),[
            'password'=>'required',
            'g-recaptcha-response' => 'required|captcha',
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_number';
        $data = ['email'=>$request->email,'password'=>$request->password];
        if($fieldType=='phone_number'){
            $data = ['phone_number'=>$request->email,'password'=>$request->password];
        }
        if(Auth::attempt($data)){
            if(Auth::user()->action==0){
                return response()->json([
                    'status'=>1,
                    'message'=>"Đăng nhập thành công",
                    'code'=>200,
    
                ],200);
            }
            return response()->json([
                'status'=>0,
                'message'=>"Tài khoản của bạn đã bị khóa",
                'code'=>500,
             
            ]);
           
        }
        return response()->json([
            'status'=>0,
            'message'=>"Email và mật khẩu không khớp",
            'code'=>500,
  
        ]);
    }
    public function logout(Request $request){
        if(Auth::logout()){
            return redirect()->route('guest.auth.login');
        }else {
            return redirect()->route('guest.auth.login');
        }
    }
    public function indexRegister(Request $request){
            return view('guest.pages.auth.register');
    }
    public function register(Request $request){
        $message = [
            'required'=>":attribute không được để trống",
            'max:20'=>":attribute dữ liệu tối đa 20 ký tự",
            'email.unique'=>":attribute đã tồn tại trong dữ liệu",
            'email'=>"Bạn phải nhập đúng định dạng email",
            'full_name.regex'=>"Bạn phải nhập đúng định dạng của chữ",
            'phone_number.min'=>"Bạn phải nhập đủ 10 số",
            'phone_number.max'=>"Bạn phải nhập đủ 10 số",
            'phone_number.unique'=>"Số điện thoại đã tồn tại"
        ];
        $validate = Validator::make($request->all(),[
            'full_name'=>['required','min:3','max:40'],
            'email'=>['required','min:8','max:40','unique:tbl_users','email'],
            'password'=>['required','min:8','max:40'],
            'phone_number'=>['required','min:10','max:10','unique:tbl_users']
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $user = new User();
        $user->full_name= $request->full_name;
        if($request->email){
            $user->email=$request->email;
        }
        $user->password=bcrypt($request->password);
        $user->address=$request->address;
        $user->phone_number=$request->phone_number;
        $user->date=$request->date;
        $user->gender=$request->gender;
        $user->save();
        if($user){
                return response()->json([
                    'status'=>1,
                    'message'=>"Tạo tài khoản thành công",
                    'code'=>200,
    
                ],200);
        }
        return response()->json([
            'status'=>0,
            'message'=>"Tạo tài khoản thất bại",
            'code'=>500,
         
        ]);
       
    }
    public function ConfigSocial(){
        // Config setting google login
        foreach(json_decode(settings()->config_google) as $list_login_gg){
            $get_client_id = $list_login_gg->client_id;
            $get_client_secret = $list_login_gg->client_secret;
            $get_redirect = $list_login_gg->redirect;
        }
        config([
            'services.google.client_id' => $get_client_id,
            'services.google.client_secret' => $get_client_secret,
            'services.google.redirect' => $get_redirect
        ]);
    }
    public function login_google(Request $request){
        $this->ConfigSocial();
        return Socialite::driver('google')->redirect();
    }
    public function callback_google(Request $request){
        $this->ConfigSocial();
        $user = Socialite::driver('google')->stateless()->user();
        $find_user = User::where('google_id',$user->id)->first();
        if($find_user) {
            Auth::login($find_user);
            return redirect('/');
        }else {
            $new_user = new User();
            $new_user->full_name = $user->name;
            $new_user->email = $user->email;
            $new_user->type = "Member";
            $new_user->google_id = $user->id;
            $new_user->save();
            Auth::login($new_user);
            return redirect('/');
        }
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Str;
use Mail;
class LoginController extends Controller
{
    public function login(){
        return view('admin.pages.login.login');
    }
    public function forgetPassword(){
        return view('admin.pages.forget_password.index');
    }
    public function handleSendPassword(){
        config([
            'mail.default' => getConfigMail()->mail_driver,
            'mail.mailers.smtp.host' => getConfigMail()->mail_host,
            'mail.mailers.smtp.port' => getConfigMail()->mail_port,
            'mail.mailers.smtp.encryption' => getConfigMail()->mail_encryption,
            'mail.mailers.smtp.username' => getConfigMail()->mail_username,
            'mail.mailers.smtp.password' => getConfigMail()->mail_password,
            'mail.from.address' => getConfigMail()->mail_from_address,
            'mail.from.name' => getConfigMail()->mail_from_name
        ]);
        $code_random = Str::random();
        $user = User::find(1);
        $user->code = $code_random;
        $user->save();

        $title_mail = "Thay đổi mã pin";
        $link_reset_pass = url('/admin/forget-password?code='.$code_random.'');

        $data = array(
            "name" => $title_mail,
            "body" => $link_reset_pass,
            "code"=>$code_random,
            "email"=> getConfigMail()->mail_receive
        );
        Mail::send('admin.pages.mail.index',
        ['data' => $data], function ($message) use ($title_mail, $data)
        {
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'],$title_mail);
        });
        return view('admin.pages.send_password.index');
    }
    public function logout(){
        Auth::logout();
        return redirect()->intended('/admin/login');
    }
    public function index(Request $request)
    {
        $message=[
            'password.integer'=>"Mã pin phải là số",
            'password.required'=>"Mã pin bắt buộc phải nhập",
            // 'password.max'=>"Mã pin tối đa 6 ký tự",
            'g-recaptcha-response.required'=>"Hãy xác nhận nếu bạn không phải là robot",
            'g-recaptcha-response.captcha'=>"Captcha bị lỗi! Hãy thử lại",
        ];
        $validate=Validator::make($request->all(),[
            'password'=>['integer','required'],
            'g-recaptcha-response' => 'required|captcha',
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'msg'=>$validate->errors()->first(),
                'code'=>404
            ]);
        }

        $data = [
            'email' => 'coderthanhson@gmail.com',
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            return response()->json([
                'status'=>1,
                'msg'=>"Thành công",
                'code'=>200,
            ]);
        }else{
            return response()->json([
                'status'=>0,
                'msg'=>"Mã pin bị sai",
                'code'=>404,
            ]);
        }
    }
    public function changePassword(Request $request){

        try {
            $code = Request()->code;
            $user = User::where('code','=',$code)->first();
            if($request->code == $code){
                $user->password=bcrypt($request->newPassword);
                $user->save();
                return redirect()->intended('/admin/login'); 
            } 
        } catch (\Exception $ex) {
            return error($ex->getMessage());
        }
              
    }
}

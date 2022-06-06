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
    public function index404(){
        return view('admin.pages.error.404');
    }
    public function forgetPassword(){
        return view('admin.pages.forget_password.index');
    }
    public function handleSendPassword(request $request){
        foreach(json_decode(getConfigMail()->config_mail) as $data){
            $data_mail_driver=$data->mail_driver;
            $data_mail_host=$data->mail_host;
            $data_mail_port=$data->mail_port;
            $data_mail_encryption=$data->mail_encryption;
            $data_mail_username=$data->mail_username;
            $data_mail_password=$data->mail_password;
            $data_mail_from_address=$data->mail_from_address;
            $data_mail_from_name=$data->mail_from_name;
            $data_mail_receive=$data->mail_receive;
            $data_mail_from_address=$data->mail_from_address;
        }
        config([
            'mail.default' => $data_mail_driver,
            'mail.mailers.smtp.host' => $data_mail_host,
            'mail.mailers.smtp.port' => $data_mail_port,
            'mail.mailers.smtp.encryption' =>$data_mail_encryption,
            'mail.mailers.smtp.username' => $data_mail_username,
            'mail.mailers.smtp.password' =>$data_mail_password ,
            'mail.from.address' =>$data_mail_from_address,
            'mail.from.name' => $data_mail_from_name
        ]);
        $code_random = Str::random();
        $user = User::find(1);
        $user->code = $code_random;
        $user->save();

        $title_mail = "Thay đổi mã pin";
        $link_reset_pass = url('/forget-password?code='.$code_random);

        $data = array(
            "name" => $title_mail,
            "body" => $link_reset_pass,
            "code"=>$code_random,
            "email"=> $data_mail_receive
        );
        Mail::send('admin.pages.mail.index',
        ['data' => $data], function ($message) use ($title_mail, $data)
        {
            $message->to($data['email'])->subject($title_mail);
        });
        return view('admin.pages.send_password.index');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login.index');
    }
    public function index(Request $request)
    {
        foreach(json_decode(setting()->config_google) as $list_google) {
            if($list_google->active == 1) {
                $message=[
                    'password.required'=>"Mã pin bắt buộc phải nhập",
                    // 'password.max'=>"Mã pin tối đa 6 ký tự",
                    'g-recaptcha-response.required'=>"Hãy xác nhận nếu bạn không phải là robot",
                    'g-recaptcha-response.captcha'=>"Captcha bị lỗi! Hãy thử lại",
                ];
                $validate=Validator::make($request->all(),[
                    'password'=>['required'],
                    'g-recaptcha-response' => 'required|captcha',
                ],$message);
            }else {
                $message=[
                    'password.integer'=>"Mã pin phải là số",
                    'password.required'=>"Mã pin bắt buộc phải nhập",
                ];
                $validate=Validator::make($request->all(),[
                    'password'=>['required'],
                ],$message);
            }
        }
        
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
                return redirect()->route('admin.login.index'); 
            } 
        } catch (\Exception $ex) {
            return error($ex->getMessage());
        }
              
    }
}

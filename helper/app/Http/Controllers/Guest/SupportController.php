<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Supports;
use Illuminate\Support\Facades\Mail;
class SupportController extends Controller
{
    public function index(){

        return view('guest.pages.support.support',['title' => 'Gửi hỗ trợ']);
    }

    public function insert(Request $request){
        $message = [
            'g-recaptcha-response.required'=>"Hãy xác nhận nếu bạn không phải là robot",
            'g-recaptcha-response.captcha'=>"Captcha bị lỗi! Hãy thử lại",
            'required'=>":attribute không được để trống",
            'max:40'=>":attribute dữ liệu tối đa 40 ký tự",
            'phone.min'=>"Bạn phải nhập đủ 10 số",
            'phone.max'=>"Bạn phải nhập đủ 10 số",
        ];
        $validate = Validator::make($request->all(),[
            'name'=>['required','min:3','max:40'],
            'email'=>['required','min:8','max:40'],
            'phone'=>['required','min:10','max:10'],
            'g-recaptcha-response' => 'required|captcha',
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>500
            ]);
        }
         // Config mail
         foreach(json_decode(getConfigMail()->config_mail) as $list_mail){
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

        $title_mail = "Thông tin hỗ trợ";
        if($request->rooms_id == 1){
            $room_name = "Phòng kinh doanh";
        }
        elseif($request->rooms_id == 2){
            $room_name = "Phòng kỹ thuật";
        }elseif($request->rooms_id == 3){
            $room_name = "Phòng kế toán";
        }
        $data = array(
            "subject" => $title_mail,
            "support_name" => $request->name,
            'support_phone' => $request->phone,
            'support_email' => $request->email,
            'support_content' => $request->content,
            'room_name' => $room_name,
            "email_to" => $mail_receive,
            "email_from" => $mail_from_address
        );
        Mail::send('guest.pages.mails.support',
                ['data' => $data], function ($message) use ($title_mail, $data)
                {
                    $message->to($data['email_to'])->subject($title_mail);
                });
        $supports=new Supports();
        $supports->support_name=$request->name;
        $supports->support_phone=$request->phone;
        $supports->support_content=$request->content;
        $supports->support_email=$request->email;
        $supports->rooms_id=$request->rooms_id;
        $supports->save();
        if($supports){
            return response()->json([
                'status'=>1,
                'message'=>"Đã gửi hỗ trợ thành công",
                'code'=>200
            ]);
        }
        return response()->json([
            'status'=>0,
            'message'=>"Gửi thất bại",
            'code'=>500
        ]);
    }
}

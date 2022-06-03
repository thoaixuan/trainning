<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Contacts;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function index(){

        return view('guest.pages.contact.contact',['title' => "Gửi liên hệ"]);
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

        $title_mail = "Thông tin liên hệ";
        $data = array(
            "subject" => $title_mail,
            "contact_name" => $request->name,
            'contact_phone' => $request->phone,
            'contact_email' => $request->email,
            'contact_content' => $request->content,
            "email_to" => $mail_receive,
            "email_from" => $mail_from_address
        );
        Mail::send('guest.pages.mails.contact',
                ['data' => $data], function ($message) use ($title_mail, $data)
                {
                    $message->to($data['email_to'])->subject($title_mail);
                });

        $contacts=new Contacts();
        $contacts->contact_name=$request->name;
        $contacts->contact_phone=$request->phone;
        $contacts->contact_content=$request->content;
        $contacts->contact_email=$request->email;
        $contacts->save();
        if($contacts){
            return response()->json([
                'status'=>1,
                'message'=>"Đã gửi liên hệ thành công",
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

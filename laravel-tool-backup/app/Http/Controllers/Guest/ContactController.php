<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;  
use Illuminate\Http\Request;
use App\Models\Contact;
use Validator;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle("Liên hệ");
        OpenGraph::addProperty('locale','vi_VN');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('title', "Liên hệ");
        TwitterCard::addValue("title", "Liên hệ");
        JsonLd::setTitle("Liên hệ");
        JsonLdMulti::setType('Article');
       return view('guest.pages.contact.contact'); 
    }
    public function insert(Request $request){
        $message = [
            // 'g-recaptcha-response.required'=>"Hãy xác nhận nếu bạn không phải là robot",
            // 'g-recaptcha-response.captcha'=>"Captcha bị lỗi! Hãy thử lại",
            'required'=>":attribute không được để trống",
            'max:40'=>":attribute dữ liệu tối đa 40 ký tự",
            'phone.min'=>"Bạn phải nhập đủ 10 số",
            'phone.max'=>"Bạn phải nhập đủ 10 số",
        ];
        $validate = Validator::make($request->all(),[
            'name'=>['required','min:3','max:40'],
            // 'email'=>['required','min:8','max:40'],
            'phone'=>['required','min:10','max:10'],
            // 'g-recaptcha-response' => 'required|captcha',
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>500
            ]);
        }
        foreach(json_decode(settings()->config_mail) as $data){
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
        $title_mail = "Thông tin liên hệ";
        $data = array(
            "subject" => $title_mail,
            "name" => $request->name,
            'phone' => $request->phone,
            'content' => $request->content,
            'email' => $request->email,
            "email_to" =>  $data_mail_receive,
            "email_from" => $data_mail_from_address,
            'mail.from.name'=>$data_mail_from_name
        );
        Mail::send('guest.components.contact.mail',
        ['data' => $data], function ($message) use ($title_mail, $data)
        {
            $message->to($data['email_to'])->subject($title_mail);
            $message->from($data['email_from'],$data['mail.from.name']);
        });
        $contacts=new Contact();
        $contacts->name=$request->name;
        $contacts->phone=$request->phone;
        $contacts->content=$request->content;
        $contacts->email=$request->email;
        $contacts->link=$request->link;
        $contacts->save();
        if($contacts){
            return response()->json([
                'status'=>1,
                'message'=>"Đã xác nhận gửi thành công",
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

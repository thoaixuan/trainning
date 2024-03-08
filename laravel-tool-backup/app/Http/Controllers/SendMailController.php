<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;

class SendMailController extends Controller
{
    public function send_email(Request $request){

        try {
            //code...
            $data = $request -> all();
            $emails = $data['email']??'';
            // Gửi mail
            \Mail::to($emails)->send (new \app\Mail\SendMail(['email' => $emails]));
        } catch (\Throwable $th) {
            return "err";
        }
    }
}

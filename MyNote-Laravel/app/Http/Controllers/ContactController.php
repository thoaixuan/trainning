<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Captcha;

class ContactController extends Controller
{
    function index(){
        return view('pages.contact.contact');
    }

    function sendContact(){
        if(env('CAPTCHA_STATUS')){

            $message=[

                'g-recaptcha-response.required'=>"Please confirm you are not a robot",

                'g-recaptcha-response.captcha'=>"Captcha error! try again",

            ];

           

            $validate_captcha=Validator::make($request->all(),[

                'g-recaptcha-response' => new Captcha()

            ],$message);

            if($validate_captcha->fails()){

                return response()->json([

                    'status_captcha'=>0,

                    'message_captcha'=>$validate_captcha->errors()->first(),

                ]);

            }

        }
    }
}

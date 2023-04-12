<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use ReCaptcha\ReCaptcha;

class Captcha implements Rule
{
    public function passes($attribute, $value)
    {
        // CAPTCHA_SECRET

        $recaptcha = new ReCaptcha(env('CAPTCHA_SECRET'));

        $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);

        return $response->isSuccess();
    }

 

    public function message()
    {
        return 'Please confirm you are not a robot';    //trả về thông báo khi lỗi không xác nhận captcha
    }
}

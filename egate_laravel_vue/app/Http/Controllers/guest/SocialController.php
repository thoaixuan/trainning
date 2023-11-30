<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
use stdClass;
use GuzzleHttp\Client;
class SocialController extends Controller
{
    public function __construct(){
        // $setting = setting();
        // Config::set("services.google.client_id",$setting->GOOGLE_CLIENT_ID);
        // Config::set("services.google.client_secret",$setting->GOOGLE_CLIENT_SECRET);
        Config::set("services.google.client_id",env('GOOGLE_CLIENT_ID','764673388093-498s1hetaibv8m58a415us0gkqpk321h.apps.googleusercontent.com'));
        Config::set("services.google.client_secret",env('GOOGLE_CLIENT_SECRET','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'));
        Config::set("services.google.redirect",route('client.social.callback','google'));
    }
    protected $providers = [
        'facebook','google'
    ];
    public function redirectToProvider(Request $request,$driver)
    {
        if(!$this->isProviderAllowed($driver)) {
            return $this->sendFailedResponse("{$driver} is not currently supported");
        }
        try {
            return Socialite::driver($driver)->redirect();
        } catch (\Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }
    }
    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }
        return empty($user->email)
            ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
            : $this->loginOrCreateAccount($user, $driver);
    }
    protected function sendFailedResponse($msg = null)
    {
        return redirect()->back()->with('status_login', $msg ?: 'Unable to login, try with another provider to login.');
    }
    protected function loginOrCreateAccount($providerUser, $driver)
    {
        if($providerUser->getEmail()){
            $payload = [
                "googleID"=>$providerUser->id,
                "email"=>$providerUser->email,
                "fullname"=>$providerUser->name,
                "avatar"=> $providerUser->avatar
            ];

            return redirect()->route("guest.home")->with('payload',$payload);
            // return redirect()->route("guest.home");
        }else{
            $this->sendFailedResponse("No email id returned from {$driver} provider.");
        }
    }
    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }
}

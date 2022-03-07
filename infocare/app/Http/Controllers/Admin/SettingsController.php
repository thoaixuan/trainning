<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
    public function getSetting()
    {
       return view('Admin.pages.setting.setting'); 
    }
    public function updateMail(Request $Request)
	{
            
	        $Settings =  Settings::find($Request->id);
	        $Settings->mail_driver = $Request->mail_driver;
		    $Settings->mail_host = $Request->mail_host;
		    $Settings->mail_port = $Request->mail_port;
            $Settings->mail_from_address = $Request->mail_from_address;
            $Settings->mail_from_name = $Request->mail_from_name;
            $Settings->mail_encryption = $Request->mail_encryption;
            $Settings->mail_username = $Request->mail_username;
            $Settings->mail_password = $Request->mail_password;
            $Settings->mail_receive = $Request->mail_receive;
	        $Settings->save();

            return back();
	}
}

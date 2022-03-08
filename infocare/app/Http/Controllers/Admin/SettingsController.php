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
    public function updateGuest(Request $Request)
    {
        $Settings =  Settings::find($Request->id);
        if ($Request->hasFile('guest_logo_header')) {
            $input_file = $Request->file("guest_logo_header");
            $file = time().'_'.$input_file->getClientOriginalName();
            $input_file->move('uploads', $file);

            $Settings->guest_logo_header = $file;
        }else {
            $Settings->guest_logo_header = $Request->header_file_old;
        }

        if ($Request->hasFile('guest_logo_footer')) {
            $input_file_footer = $Request->file("guest_logo_footer");
            $file_footer = time().'_'.$input_file_footer->getClientOriginalName();
            $input_file_footer->move('uploads', $file_footer);

            $Settings->guest_logo_footer = $file_footer;
        }else {
            $Settings->guest_logo_footer = $Request->footer_file_old;
        }

        $Settings->guest_description_footer = $Request->guest_description_footer;
	    $Settings->save();

            return back();
    }
}

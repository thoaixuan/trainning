<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use File;
class SettingController extends Controller
{
    
    private $uploadFolder;  
    public function __construct()  
    {  
      $this->uploadFolder = 'uploads';  
    } 

    public function index(){
        return view('admin.pages.setting.index');
    }
    public function updateMail(Request $Request)
	{
        try {
            $Settings =  Settings::find(1);
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
            return success($Settings);
        } catch (\Exception $ex) {
            return error($ex->getMessage());
        }
	       
	}
    public function udpateWebsite(Request $Request)
    {
        try {
            $Settings =  Settings::find(1);
            if ($Request->hasFile('guest_logo_header')) {
                File::delete($this->uploadFolder.$Request->guest_logo_header);
                $input_file = $Request->file("guest_logo_header");
                $file = time().'_'.$input_file->getClientOriginalName();
                $input_file->move($this->uploadFolder, $file);
                $Settings->guest_logo_header = $file;
            }
            $Settings->save();
            return success($Settings);
        } catch (\Exception $ex) {
            return error($ex->getMessage());
        }
       
    }
}

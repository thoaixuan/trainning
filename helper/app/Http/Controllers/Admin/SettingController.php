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
    public function updateHome(request $request)
    {
        try {
            $Settings =  Settings::find(1);
            $arrBanner = array();
            array_push($arrBanner, [
                'banner_title' => $request->home_banner_title,
                'banner_cta' => $request->home_banner_cta
            ]);
            $jsonBanner = json_encode($arrBanner, JSON_UNESCAPED_UNICODE);
            $Settings->home_banner = $jsonBanner;

            $arrCategory = array();
            array_push($arrCategory, [
                'category1' => $request->category1,
                'category2' => $request->category2,
                'category3' => $request->category3,
                'category4' => $request->category4,
                'category5' => $request->category5,
                'category6' => $request->category6,
                'category7' => $request->category7,
            ]);
            $jsonCategory = json_encode($arrCategory, JSON_UNESCAPED_UNICODE);
            $Settings->home_category = $jsonCategory;

            $arrQuestion = array();
            array_push($arrQuestion, [
                'question_title1' => $request->question_title1,
                'question_des1' => $request->question_des1,
                'question_title2' => $request->question_title2,
                'question_des2' => $request->question_des2,
            ]);
            $jsonQuestion = json_encode($arrQuestion, JSON_UNESCAPED_UNICODE);
            $Settings->home_question = $jsonQuestion;

            $arrInfo = array();
            array_push($arrInfo, [
                'info_title1' => $request->info_title1,
                'info_des1' => $request->info_des1,
                'info_title2' => $request->info_title2,
                'info_des2' => $request->info_des2,
            ]);
            $jsonInfo = json_encode($arrInfo, JSON_UNESCAPED_UNICODE);
            $Settings->home_info = $jsonInfo;

            $Settings->save();
            return success($Settings);
            } catch (\Exception $ex) {
                return error($ex->getMessage());
            }
    }
    public function updateMail(Request $Request)
	{
        try {
            $Settings =  Settings::find(1);
            $myArr = array();
            array_push($myArr, [
                'mail_driver' => $Request->mail_driver,
                'mail_host' => $Request->mail_host,
                'mail_port' => $Request->mail_port,
                'mail_from_address' => $Request->mail_from_address,
                'mail_from_name' => $Request->mail_from_name,
                'mail_encryption' => $Request->mail_encryption,
                'mail_username' => $Request->mail_username,
                'mail_password' => $Request->mail_password,
                'mail_receive' => $Request->mail_receive,
                'room_kinhdoanh' => $Request->room_kinhdoanh,
                'room_kythuat' => $Request->room_kythuat,
                'room_ketoan' => $Request->room_ketoan,
            ]);
            $myJSON = json_encode($myArr, JSON_UNESCAPED_UNICODE);
            $Settings->config_mail = $myJSON;
            $Settings->save();
            return success($Settings);
        } catch (\Exception $ex) {
            return error($ex->getMessage());
        }
	       
	}
    public function updateWebsite(Request $Request)
    {
        try {
            $Settings =  Settings::find(1);
            foreach(json_decode(getConfigMail()->website_logo) as $list_logo){
                $website_logo = $list_logo->logo_guest;
                $favicon = $list_logo->favicon;
                $admin_logo_blue = $list_logo->admin_logo_blue;
                $admin_logo_white = $list_logo->admin_logo_white;
            }
            if ($Request->hasFile('guest_logo_header')) {
                File::delete($this->uploadFolder.$Request->guest_logo_header);
                $input_file = $Request->file("guest_logo_header");
                $file = time().'_'.$input_file->getClientOriginalName();
                $input_file->move($this->uploadFolder, $file);
                $logo_guest = $file;
            }else {
                $logo_guest = $website_logo;
            }
            if ($Request->hasFile('website_favicon')) {
                File::delete($this->uploadFolder.$Request->website_favicon);
                $input_file2 = $Request->file("website_favicon");
                $file2 = time().'_'.$input_file2->getClientOriginalName();
                $input_file2->move($this->uploadFolder, $file2);
                $website_favicon = $file2;
            }else {
                $website_favicon = $favicon;
            }
            if ($Request->hasFile('admin_logo_blue')) {
                File::delete($this->uploadFolder.$Request->admin_logo_blue);
                $input_file3 = $Request->file("admin_logo_blue");
                $file3 = time().'_'.$input_file3->getClientOriginalName();
                $input_file3->move($this->uploadFolder, $file3);
                $logo_blue = $file3;
            }else {
                $logo_blue = $admin_logo_blue;
            }
            if ($Request->hasFile('admin_logo_white')) {
                File::delete($this->uploadFolder.$Request->admin_logo_white);
                $input_file4 = $Request->file("admin_logo_white");
                $file4 = time().'_'.$input_file4->getClientOriginalName();
                $input_file4->move($this->uploadFolder, $file4);
                $logo_white = $file4;
            }else {
                $logo_white = $admin_logo_white;
            }
            $arrWebsiteLogo = array();
            array_push($arrWebsiteLogo, [
                'logo_guest' => $logo_guest,
                'favicon' => $website_favicon,
                'admin_logo_blue' => $logo_blue,
                'admin_logo_white' => $logo_white,
            ]);
            $jsonWebsiteLogo = json_encode($arrWebsiteLogo, JSON_UNESCAPED_UNICODE);
            $Settings->website_logo = $jsonWebsiteLogo;
            $Settings->website_name = $Request->website_name;
            $Settings->root_color = $Request->root_color;
            $Settings->route_admin = $Request->route_admin;
            $Settings->route_login = $Request->route_login;
            $Settings->save();
            return success($Settings);
        } catch (\Exception $ex) {
            return error($ex->getMessage());
        }
       
    }
    public function updateGoogle(Request $Request)
	{
            try {
	        $Settings =  Settings::find(1);
            $myArr = array();
            array_push($myArr, [
                'nocaptcha_secret' => $Request->nocaptcha_secret,
                'nocaptcha_sitekey' => $Request->nocaptcha_sitekey,
            ]);
            $myJSON = json_encode($myArr, JSON_UNESCAPED_UNICODE);
            $Settings->config_google = $myJSON;
	        $Settings->save();
            return success($Settings);
        } catch (\Exception $ex) {
            return error($ex->getMessage());
        }
	}
}

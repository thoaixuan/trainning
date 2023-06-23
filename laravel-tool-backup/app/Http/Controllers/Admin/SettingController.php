<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use Storage;
use File;
use Artisan;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
class SettingController extends Controller
{
    public function index(){
        return view('admin.pages.setting.setting',['title' => 'Cài đặt']);
    }
    public function indexIcon(){
        return view('admin.pages.icon.feather',['title' => 'Danh sách icon']);
    }
    public function updateWebsite(Request $request)
	{
	        $Settings =  Settings::find($request->id);
            //Website
            foreach(json_decode(settings()->website_logo) as $list_logo){
                $website_logo = $list_logo->logo_guest;
                $favicon = $list_logo->favicon;
                $admin_logo_blue = $list_logo->admin_logo_blue;
                $admin_logo_white = $list_logo->admin_logo_white;
            }
            if($request->hasFile("website_logo")){
                if(!empty($website_logo)){
                    Storage::disk('setting_website')->delete($website_logo);
                }
                $image = $request->file("website_logo");
                $name_img = time().'_'.convert_vi_to_en($image->getClientOriginalName());
                Storage::disk('setting_website')->put($name_img,File::get($image));
                $logo_guest = $name_img;
            }else {
                $logo_guest = $website_logo;
            }
            if($request->hasFile("website_favicon")){
                if(!empty($favicon)){
                    Storage::disk('setting_website')->delete($favicon);
                }
                $image1 = $request->file("website_favicon");
                $name_img1 = time().'_'.convert_vi_to_en($image1->getClientOriginalName());
                Storage::disk('setting_website')->put($name_img1,File::get($image1));
                $website_favicon = $name_img1;
            }else {
                $website_favicon = $favicon;
            }
            if($request->hasFile("admin_logo_blue")){
                if(!empty($admin_logo_blue)){
                    Storage::disk('setting_website')->delete($admin_logo_blue);
                }
                $image2 = $request->file("admin_logo_blue");
                $name_img2 = time().'_'.convert_vi_to_en($image2->getClientOriginalName());
                Storage::disk('setting_website')->put($name_img2,File::get($image2));
                $logo_blue = $name_img2;
            }else {
                $logo_blue = $admin_logo_blue;
            }
            if($request->hasFile("admin_logo_white")){
                if(!empty($admin_logo_white)){
                    Storage::disk('setting_website')->delete($admin_logo_white);
                }
                $image3 = $request->file("admin_logo_white");
                $name_img3 = time().'_'.convert_vi_to_en($image3->getClientOriginalName());
                Storage::disk('setting_website')->put($name_img3,File::get($image3));
                $logo_white = $name_img3;
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
            $Settings->route_login = $request->route_login;
            $Settings->route_admin = $request->route_admin;

	        $Settings->save();
            
            return response()->json([
                'status'=>1,
                'message'=>"Cập nhật thành công",
                'code'=>200
            ]);
	}
    public function updateMail(Request $Request)
	{
	        $Settings =  Settings::find($Request->id);
            // Mail
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
                'mail_receive' => $Request->mail_receive
            ]);
            $myJSON = json_encode($myArr, JSON_UNESCAPED_UNICODE);
            $Settings->config_mail = $myJSON;
	        $Settings->save();
            return response()->json([
                'status'=>1,
                'message'=>"Cập nhật thành công",
                'code'=>200
            ]);
	}

    public function updateGoogle(Request $Request)
	{
	        $Settings =  Settings::find($Request->id);
            $myArr = array();
            array_push($myArr, [
                'nocaptcha_secret' => $Request->nocaptcha_secret,
                'nocaptcha_sitekey' => $Request->nocaptcha_sitekey,
                'client_id' => $Request->client_id,
                'client_secret' => $Request->client_secret,
                'redirect' => $Request->redirect,
            ]);
            $myJSON = json_encode($myArr, JSON_UNESCAPED_UNICODE);
            $Settings->config_google = $myJSON;
	        $Settings->save();
            return response()->json([
                'status'=>1,
                'message'=>"Cập nhật thành công",
                'code'=>200
            ]);
	}

    public function backup(){

        try {
            // Create a new Process instance for the Artisan command
            $process = new Process(['php', 'artisan', 'backup:run', '--only-db']);

            // Run the process
            $process->run();

            // Check if the process was successful
            if ($process->isSuccessful()) {
                $output = $process->getOutput();
                // Code to be executed after the command is finished
                // You can place your desired code here
                // For example, send a notification or perform additional operations
                // using the $output or any other data

                // Return a response or perform any other actions
                return 'Backup command executed.';
            } else {
                throw new ProcessFailedException($process);
            }
        } catch (ProcessFailedException $exception) {
            // Handle the exception if the process failed
            return $exception->getMessage();
        }

        //Run lệnh backup database
        \Artisan::call('backup:run', [
            '--only-db' => true,
        ], function ($output) {
            // \Log::info($output);
            // Retrieve the file names in the storage directory
            $files = Storage::disk('backup')->files();

            // Sort the files by their last modified timestamp
            usort($files, function ($a, $b) {
                return Storage::disk('backup')->lastModified($b) - Storage::disk('backup')->lastModified($a);
            });
            // Get the name of the last saved file
            $lastSavedFile = $files[0];
            
            // Output the name of the last saved file
            $path_file = Storage::disk('backup')->path($lastSavedFile);
            // Upload to google drive
            $fileName = "backup-".date('d-m-Y').".zip";
            $fileData = File::get($path_file);
            Storage::cloud()->put($fileName,$fileData);
            return "Đã upload google drive";
        }
        );

        return "Đã upload google drive 2";
        // Return download file with new name
        // return Storage::disk('backup')->download($lastSavedFile, $fileName);

    }
}

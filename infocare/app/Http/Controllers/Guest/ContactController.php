<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use Validator;

class ContactController extends Controller
{
    public function getContact()
    {
       return view('guest.pages.contact.contact'); 
    }
    public function postContact(Request $Request)
    {
        $message = [
            'required'=>":attribute không được để trống",
        ];
        $validate = Validator::make($Request->all(),[
            'contact_name'=>['required','max:150'],
            'contact_email'=>['required'],
            'contact_content'=>['required']
            
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status_validate' => 1,
                'data_error' => $validate->errors()->first()
            ]);
        }

        if(file_exists('data_contact.json')) {
            $current_data = file_get_contents('data_contact.json');
            $array_data = json_decode($current_data, true, JSON_UNESCAPED_UNICODE);
            $extra = array(
                'name' => $Request->contact_name,
                'email' => $Request->contact_email,
                'content' => $Request->contact_content
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data, JSON_UNESCAPED_UNICODE);

            file_put_contents('data_contact.json',$final_data);
            return response()->json([
                'name' => 'Thành công',
                'status' => 200,
                'data' => $final_data
            ]);
        }else {
            return response()->json([
                'name' => 'Thất bại',
                'status' => 500,
                'data' => $final_data
            ]);
        }
        

        // $Contact = new Contact();
	    // $Contact->contact_name = $Request->contact_name;
	    // $Contact->contact_email = $Request->contact_email;
	    // $Contact->contact_content = $Request->contact_content;
	    // if($Contact->save()){
	    //     return response()->json([
        //         'name' => 'Thành công',
        //         'status' => 200,
        //         'data' => $Contact
        //     ]);
	    // }else{
	    //     return response()->json([
        //         'name' => 'Thất bại',
        //         'status' => 500,
        //         'data' => $Contact
        //     ]);
	    // }
    }
}

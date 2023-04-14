<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Models\notes;

class ContactController extends Controller
{
    function index(){
        return view('pages.contact.contact');
    }

    function list(){
        return view('pages.contact.list');
    }

    
    function verify_recaptcha($request)
    {
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->input('g-recaptcha-response')
            ]
        ]);
        $result = json_decode((string)$response->getBody());

        return $result->success;
    }   

    function sendContact(Request $request){
        if (!$this->verify_recaptcha($request)) {
            return response()->json(['success' => false]);
        }

        $file_path = public_path('/contact.json');
        $file_data = file_get_contents($file_path);
        $json_data = json_decode($file_data, true);

        $new_object = array('name' => $request->input('name'),
                            'email' => $request->input('email'),
                            'phone' => $request->input('phone'),
                            'message' => $request->input('message'));

        $json_data[] = $new_object;

        $new_file_data = json_encode($json_data);
        file_put_contents($file_path, $new_file_data);
        
        return response()->json(['success' => true]);
    }

    function getContacts(Request $Request){
        $file_path = public_path('/contact.json');
        $file_data = file_get_contents($file_path);

        $contacts = json_decode($file_data);
        $totalData = count($contacts);

        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalData), 
            "data"            => $contacts   
        );

        echo json_encode($json_data);
    }

    function getContact(Request $Request){
        $file_path = public_path('/contact.json');
        $file_data = file_get_contents($file_path);

        $contacts = json_decode($file_data);
        
        $index = intval($Request -> id);
        $contact = $contacts[$index];

        return response()->json($contact);
    }

    function updateContact(Request $Request){
        $file_path = public_path('/contact.json');
        $file_data = file_get_contents($file_path);

        $contacts = json_decode($file_data);
        
        $index = intval($Request -> id);
        $contacts[$index]->name = $Request->name;
        $contacts[$index]->email = $Request->email;
        $contacts[$index]->phone = $Request->phone;
        $contacts[$index]->message = $Request->message;

        $updated_data = json_encode($contacts);
        file_put_contents($file_path, $updated_data);

        return response()->json(['message' => 'Sửa thành công']);
    }

    function deleteContact(Request $request){
        $file_path = public_path('/contact.json');
        $file_data = file_get_contents($file_path);

        $contacts = json_decode($file_data);

        array_splice($contacts, intval($request->id), 1);
        $json_data = json_encode($contacts);
        file_put_contents($file_path, $json_data);

        return response()->json(['message' => 'Xóa thành công']);
    }

}



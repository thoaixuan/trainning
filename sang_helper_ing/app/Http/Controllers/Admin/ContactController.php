<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function index(){
        return view('admin.pages.contact.index');
    }
    public function fetchData(Request $request){
        $columns [] ='id';
        $columns [] ='contact_name';
       
        $columns [] ='contact_phone';
        $columns [] ='contact_content';
        $columns [] ='id';
     
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search');
        $totalData =  Contacts::count();
        if(empty($search)){
        $Contact = Contacts::offset($start)
        ->limit($limit)
        ->orderBy($order,$dir)
        ->get();
        } else {
            $Contact = Contacts::Where(function($query)use($search){
	            $query->where('contact_name', 'LIKE',"%{$search}%")
	            ->orWhere('contact_phone', 'LIKE',"%{$search}%")
	            ->orWhere('contact_content', 'LIKE',"%{$search}%");
	        })
	        ->offset($start)
	        ->limit($limit)
	        ->orderBy($order,$dir)
	        ->get();
	        $totalFiltered = $Contact->count();
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalData), 
            "data"            => $Contact   
        );
        return $json_data; 
    }
    public function delete(Request $request){
        try {
            $contacts = Contacts::where("id",'=',$request->id)->first();
            $contacts->delete();
            return success($contacts);
        } catch (\Exception $ex) {
            return error($ex->getMessage());
        }
    }
}


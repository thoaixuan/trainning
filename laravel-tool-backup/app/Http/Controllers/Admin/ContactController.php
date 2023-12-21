<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index(){
        return view('admin.pages.contact.contact',['title'=>'Quản lý liên hệ']);
    }
    public function getDatatable(Request $request){
        $columns[]='id';

        $columns[]='name';
        $columns[]='email';
        $columns[]='phone';

        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Contact::count();
        $totalFiltered=$totalData;

        if(empty($search)){
            $Contact=Contact::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();
        }else{
            $Contact=Contact::Where(function($query)use($search){
                $query->where('name','like',"%{$search}%")
                ->orWhere('email','like',"%{$search}%")
                ->orWhere('phone','like',"%{$search}%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderByDesc($order,$dir)
            ->get();
        }

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$Contact,
        );
        echo json_encode($json_data);
    }
    public function changeStatus(request $request)
    {
        $Contact = Contact::where('id','=',$request->id)->first();
        $Contact->status = 1;
        $Contact->save();
        if($Contact->save()){
	        return response()->json([
                'message' => 'Cập nhật thành công',
                'status' => 200,
                'data' => $Contact
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $Contact
            ]);
	    }
    }
    public function delete( Request $Request )
    {
        $Contact = Contact::where('id','=',$Request->id)->first();
        $Contact->delete();
        return response()->json([
            'message' => 'Đã xóa thành công!',
            'status' => 200,
            'data' => $Contact
        ]);
    }
}

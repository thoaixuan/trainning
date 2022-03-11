<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Phongban;
use Validator;

class PhongbanController extends Controller
{       
    public function getPhongban()
   {
       return view('Admin.pages.phongban.phongban'); 
   }
   public function getDatatable(Request $Request)
    {
      
        $columns [] ='id';
        $columns [] ='phongban_name';
       
        $columns [] ='phongban_description';

        $columns [] ='id';
     
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $totalData =  Phongban::count();
        if(empty($search)){
        $Phongban = Phongban::offset($start)
        ->limit($limit)
        ->orderBy($order,$dir)
        ->get();
        } else {
            $Phongban = Phongban::Where(function($query)use($search){
	            $query->where('phongban_name', 'LIKE',"%{$search}%")
	            ->orWhere('phongban_description', 'LIKE',"%{$search}%");
	        })
	        ->offset($start)
	        ->limit($limit)
	        ->orderBy($order,$dir)
	        ->get();
	        $totalFiltered =$Phongban->count();
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalData), 
            "data"            => $Phongban   
        );
        echo json_encode($json_data); 
    }

    public function postInsertPhongban(Request $Request) {
        $message = [
            'required'=>":attribute không được để trống",
        ];
        $validate = Validator::make($Request->all(),[
            'phongban_name'=>['required','max:150']
            
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status_validate' => 1,
                'data_error' => $validate->errors()->first()
            ]);
        }
        $Phongban = new Phongban();
	    $Phongban->phongban_name = $Request->phongban_name;
	    $Phongban->phongban_description = $Request->phongban_description;
	    if($Phongban->save()){
	        return response()->json([
                'name' => 'Thành công',
                'status' => 200,
                'data' => $Phongban
            ]);
	    }else{
	        return response()->json([
                'name' => 'Thất bại',
                'status' => 500,
                'data' => $Phongban
            ]);
	    }
    }

    public function getUpdatePhongban(Request $Request) {
        $Phongban = Phongban::where('id','=',$Request->id)->first();
        return response()->json([
            'name' => 'Thành công',
            'status' => 200,
            'data' => $Phongban
        ]);
    }

    public function postUpdatePhongban(Request $Request)
	{
            $message = [
                'required'=>":attribute không được để trống",
            ];
            $validate = Validator::make($Request->all(),[
                'phongban_name'=>['required']
                
            ],$message);
            if($validate->fails()){
                return response()->json([
                    'status_validate' => 1,
                    'data_error' => $validate->errors()->first()
                ]);
            }
	        $Phongban =  Phongban::find($Request->id);
	        $Phongban->phongban_name = $Phongban->phongban_name;
		    $Phongban->phongban_description = $Request->phongban_description;
	        if($Phongban->save()){
                return response()->json([
                    'name' => 'Thành công',
                    'status' => 200,
                    'data' => $Phongban
                ]);
            }else{
                return response()->json([
                    'name' => 'Thất bại',
                    'status' => 500,
                    'data' => $Phongban
                ]);
            }
	 
	}

    public function destroyPhongban( Request $Request ) {
        $result = Phongban::where('id','=',$Request->id)->delete();
        return $result;
    }
}

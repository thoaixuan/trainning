<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supports;
class SupportController extends Controller
{
    public function index(){
        return view('admin.pages.support.index');
    }
    public function fetchData(Request $request){
        $columns [] ='id';
        $columns [] ='support_name';
       
        $columns [] ='support_phone';
        $columns [] ='support_content';
        $columns [] ='id';
     
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search');
        $totalData =  Supports::count();
        if(empty($search)){
        $Supports = Supports::join('rooms','supports.rooms_id','=','rooms.id')
        ->select('supports.*','rooms.title as roomName')
        ->offset($start)
        ->limit($limit)
        ->orderBy($order,$dir)
        ->get();
        } else {
            $Supports = Supports::Where(function($query)use($search){
	            $query->where('support_name', 'LIKE',"%{$search}%")
	            ->orWhere('support_phone', 'LIKE',"%{$search}%")
	            ->orWhere('support_content', 'LIKE',"%{$search}%");
	        })
	        ->offset($start)
	        ->limit($limit)
	        ->orderBy($order,$dir)
	        ->get();
	        $totalFiltered = $Supports->count();
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalData), 
            "data"            => $Supports   
        );
        return $json_data; 
    }
    public function delete(Request $request){
        try {
            $Supports = Supports::where("id",'=',$request->id)->first();
            $Supports->delete();
            return success($Supports);
        } catch (\Exception $ex) {
            return error($ex->getMessage());
        }
    }
}

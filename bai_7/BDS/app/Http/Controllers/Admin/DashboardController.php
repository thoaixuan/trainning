<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
class DashboardController extends Controller
{
    public function index(){
        $items=Item::limit(10)->get();
    
        return view('Admin.pages.dashboard.dashboard',['items'=>$items]);
    }
    public function anyData(Request $request){
        $columns[]='Title';
        $columns[]='Content';
        $columns[]='Date';
        $columns[]='EndDate';
        $columns[]='Price';
        $columns[]='Area';
        $columns[]='GoogleMap'; 

        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Item::count();
        $totalFiltered=$totalData;

        if(empty($search)){
            $items=Item::offset($start)
            ->limit($limit)->orderByDesc($order,$dir)->get();
        }else{
            $items=Item::Where(function($query)use($search){
                $query->where('name','like',"%{$search}%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderByDesc($order,$dir)
            ->get();
        }

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$items,
        );
        echo json_encode($json_data);
    }
}

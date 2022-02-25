<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    function index(){
        $pages=Page::orderBy('id','DESC')->get();
        return view('admin.pages.pages.pages',compact('pages'));
    }
    public function anyData(Request $request)
    {
        $columns[]='id';
        $columns[]='name';
        $columns[]='key';
        $columns[]='link';



        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Page::count();
        $totalFiltered=$totalData;

        if(empty($search)){
            $pages=Page::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();
        }else{
            // $services=Service::Where(function($query)use($search){
            //     $query->where('service_name','like',"%{$search}%")
            //             ->orWhere('service_description','like',"%{$search}%")
            //             ->orWhere('id','like',"%{$search}%");
            // })
            // ->offset($start)
            // ->limit($limit)
            // ->orderBy($order,$dir)
            // ->get();
            // $totalFiltered =$services->count();
        }

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$services,
        );
        echo json_encode($json_data);
    }
}

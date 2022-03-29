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
        $tinh=$request->input('tinh');
        $huyen=$request->input('huyen');
        $xa=$request->input('xa');
        $price=$request->input('price');
        $area=$request->input('area');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Item::count();
        $totalFiltered=$totalData;

        if(empty($search) && empty($tinh) && empty($huyen) && empty($xa) && empty($price) && empty($area)){
            $items=Item::offset($start)
            ->limit($limit)->orderByDesc($order,$dir)->get();
        }else{
            if($search){
                $items=Item::Where(function($query)use($search){
                    $query->where('Title','like',"%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderByDesc($order,$dir)
                ->get();
            }
            $items=Item::Where(function($query)use($tinh,$huyen,$xa,$price,$area){
                $query->where('Location.Province.province_name','like',"%{$tinh}%");
                $query->Orwhere('Location.District.district_name','like',"%{$huyen}%");
                $query->Orwhere('Location.Ward.ward_name','like',"%{$xa}%"); 
                $query->Orwhere('Price','like',"%{$price}%"); 
                $query->Orwhere('Area','like',"%{$area}%"); 
            })
            ->whereNotNull("Title")
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
    public function getData(Request $request){
        $item=Item::where('_id','=',$request->id)->get();
        return $item;
    }
    public function getProvince(){
        $province =Item::limit(20)->select("Location.Province.province_name")->whereNotNull("Location.Province.province_name")->distinct()->get();
        return $province;
    } 
    public function getDistrict(){
        $district =Item::limit(20)->select("Location.District.district_name")->whereNotNull("Location.District.district_name")->distinct()->get();
        return $district;
    } 
    public function getWard(){
        $ward =Item::limit(20)->select("Location.Ward.ward_name")->whereNotNull("Location.Ward.ward_name")->distinct()->get();
        return $ward;
    } 
    public function getPrice(){
        $price =Item::limit(20)->select("Price")->whereNotNull("Price")->distinct()->get();
        return $price;
    } 
    public function getArea(){
        $area =Item::limit(20)->select("Area")->whereNotNull("Area")->distinct()->get();
        return $area;
    }   
}

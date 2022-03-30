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
        $price=$request->input('gia');
        $area=$request->input('dientich');

        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Item::count();
        $totalFiltered=$totalData;

        if(empty($search) && empty($tinh) && empty($huyen) && empty($xa) && empty($price) && empty($area)){
            $items=Item::offset($start)
            ->limit($limit)->orderByDesc($order,$dir)->get();
        }else{
            if($tinh && $huyen &&$xa &&$price&&$area){
                $items=Item::Where(function($query)use($search,$tinh,$huyen,$xa,$price,$area){
                    $query->where('Location.Province.province_name','like',"%$tinh%");
                    $query->where('Location.District.district_name','=',$huyen);
                    $query->where('Location.Ward.ward_name','=',$xa); 
                    $query->where('Area','=',$area); 
                    $query->where('Price','=',$price); 
                })
                ->whereNotNull("Title")
                ->offset($start)
                ->limit($limit)
                ->orderByDesc($order,$dir)
                ->get();
            }else{
                if($tinh && $huyen && $xa && $price){
                    $items=Item::Where(function($query)use($search,$tinh,$huyen,$xa,$price){
                        $query->where('Location.Province.province_name','like',"%$tinh%");
                        $query->where('Location.District.district_name','=',$huyen);
                        $query->where('Location.Ward.ward_name','=',$xa); 
                        $query->where('Price','=',$price); 
                    })
                    ->whereNotNull("Title")
                    ->offset($start)
                    ->limit($limit)
                    ->orderByDesc($order,$dir)
                    ->get();
                }
                else{
                    if($tinh && $huyen && $xa){
                        $items=Item::Where(function($query)use($search,$tinh,$huyen,$xa){
                            $query->where('Location.Province.province_name','like',"%$tinh%");
                            $query->where('Location.District.district_name','=',$huyen);
                            $query->where('Location.Ward.ward_name','=',$xa); 
                        })
                        ->whereNotNull("Title")
                        ->offset($start)
                        ->limit($limit)
                        ->orderByDesc($order,$dir)
                        ->get();
                    }else{
                        if($price && $area){
                            $items=Item::Where(function($query)use($search,$price,$area){
                                $query->where('Area','=',$area); 
                                $query->where('Price','=',$price); 
                            })
                            ->whereNotNull("Title")
                            ->offset($start)
                            ->limit($limit)
                            ->orderByDesc($order,$dir)
                            ->get();
                        }if($price){
                            $items=Item::Where(function($query)use($search,$price){
                                $query->where('Price','=',$price); 
                            })
                            ->whereNotNull("Title")
                            ->offset($start)
                            ->limit($limit)
                            ->orderByDesc($order,$dir)
                            ->get();
                        }
                        if($area){
                            $items=Item::Where(function($query)use($search,$area){
                                $query->where('Area','=',$area); 
                            })
                            ->whereNotNull("Title")
                            ->offset($start)
                            ->limit($limit)
                            ->orderByDesc($order,$dir)
                            ->get();
                        }
                        else{
                            $items=Item::Where(function($query)use($search){
                                $query->where('Title','like',"%$search%");
                            })
                            ->whereNotNull("Title")
                            ->offset($start)
                            ->limit($limit)
                            ->orderByDesc($order,$dir)
                            ->get();
                        }
                    }
                }
            }
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
    //Loading dữ liệu tỉnh
    public function getProvince(){
        $province =Item::select("Location.Province.province_name")
        ->whereNotNull("Location.Province.province_name")
        ->distinct()
        ->get();
        return $province;
    } 
    //Loading dữ liệu huyện
    public function getDistrict(Request $request){
        $district =Item::select("Location.District.district_name")
        ->whereNotNull("Location.District.district_name")
        ->distinct()
        ->where("Location.Province.province_name",'=',$request->name)
        ->get();
        return $district;
    } 
    //Loading dữ liệu xã
    public function getWard(Request $request){
        $ward =Item::select("Location.Ward.ward_name")
        ->whereNotNull("Location.Ward.ward_name")
        ->distinct()
        ->where("Location.District.district_name",'=',$request->name)
        ->get();
        return $ward;
    } 
      //Loading dữ liệu diện tích
      public function getArea(){
        $area =Item::select("Area")
        ->whereNotNull("Area")
        ->distinct()
        ->get();
        return $area;
    }   
    //Loading dữ liệu giá tiền
    public function getPrice(){
        $price =Item::select("Price")
        ->whereNotNull("Price")
        ->distinct()
        ->get();
        return $price;
    } 
  
}

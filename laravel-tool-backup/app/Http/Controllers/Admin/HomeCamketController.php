<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HomeCamket;
use Storage;
use File;
class HomeCamketController extends Controller
{
    public function getDatatable(Request $request){
        $columns[]='id';

        $limit=$request->input('length');
        $start=$request->input('start');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=HomeCamket::count();
        $totalFiltered=$totalData;

            $HomeCamket=HomeCamket::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$HomeCamket,
        );
        echo json_encode($json_data);
    }

    public function updateData(Request $request){
        $HomeCamket=HomeCamket::where('id','=',$request->id)->first();
        return response()->json([
            'message'=>"Lấy dữ liệu thành công",
            'status'=>200,
            'data'=>$HomeCamket,
        ]);
    }
    public function postInsert(request $request)
    {
        $HomeCamket = new HomeCamket();
        if($request->hasFile("image")){
            $image = $request->file("image");
            $name = time().'_'.convert_vi_to_en($image->getClientOriginalName());
            Storage::disk('setting_website')->put($name,File::get($image));
            $HomeCamket->image = $name;
        }else {
            $HomeCamket->image = '';
        }
        $HomeCamket->title = $request->title;
        $HomeCamket->des = $request->des;
        $HomeCamket->save();

        if($HomeCamket->save()){
	        return response()->json([
                'message' => 'Thêm thành công',
                'status' => 200,
                'data' => $HomeCamket
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $HomeCamket
            ]);
	    }

    }

    public function update(request $request)
    {
        
        $HomeCamket = HomeCamket::where('id','=',$request->id)->first();
        if($request->hasFile("image")){
            if(!empty($HomeCamket->image)){
                Storage::disk('setting_website')->delete($HomeCamket->image);
            }
            $image_camket_img = $request->file("image");
            $name_img_camket_img = time().'_'.convert_vi_to_en($image_camket_img->getClientOriginalName());
            Storage::disk('setting_website')->put($name_img_camket_img,File::get($image_camket_img));
            $camket_img = $name_img_camket_img;
        }else {
            $camket_img = $HomeCamket->image;
        }
        $HomeCamket->image = $camket_img;
        $HomeCamket->title = $request->title;
        $HomeCamket->des = $request->des;
        $HomeCamket->save();

        if($HomeCamket->save()){
	        return response()->json([
                'message' => 'Sửa thành công',
                'status' => 200,
                'data' => $HomeCamket
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $HomeCamket
            ]);
	    }
    }

    public function delete( Request $Request )
    {
        $result = HomeCamket::where('id','=',$Request->id)->first();
        if($result->image !== null){
            Storage::disk('setting_website')->delete($result->image);
        }
        $result->delete();
        return response()->json([
            'message' => 'Đã xóa thành công!',
            'status' => 200,
            'data' => $result
        ]);
    }
}

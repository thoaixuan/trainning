<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeCategory;

class HomeCategoryController extends Controller
{
    public function indexIcon() {
        return view('admin.pages.icon.index');
    }
    public function getDatatable(Request $request){
        $columns[]='id';

        $limit=$request->input('length');
        $start=$request->input('start');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=HomeCategory::count();
        $totalFiltered=$totalData;

            $HomeCategory=HomeCategory::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$HomeCategory,
        );
        echo json_encode($json_data);
    }

    public function updateData(Request $request){
        $HomeCategory=HomeCategory::where('id','=',$request->id)->first();
        return response()->json([
            'message'=>"Lấy dữ liệu thành công",
            'status'=>200,
            'data'=>$HomeCategory,
        ]);
    }
    public function postInsert(request $request)
    {
        $HomeCategory = new HomeCategory();
        $HomeCategory->title = $request->title;
        $HomeCategory->url = $request->url;
        $HomeCategory->icon = $request->icon;
        $HomeCategory->color = $request->color;
        $HomeCategory->save();

        if($HomeCategory->save()){
	        return response()->json([
                'message' => 'Thêm thành công',
                'status' => 200,
                'data' => $HomeCategory
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $HomeCategory
            ]);
	    }

    }

    public function update(request $request)
    {
        $HomeCategory = HomeCategory::where('id','=',$request->id)->first();
        $HomeCategory->title = $request->title;
        $HomeCategory->url = $request->url;
        $HomeCategory->icon = $request->icon;
        $HomeCategory->color = $request->color;
        $HomeCategory->save();

        if($HomeCategory->save()){
	        return response()->json([
                'message' => 'Sửa thành công',
                'status' => 200,
                'data' => $HomeCategory
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $HomeCategory
            ]);
	    }
    }

    public function delete( Request $Request )
    {
        $result = HomeCategory::where('id','=',$Request->id)->first();
        $result->delete();
        return response()->json([
            'message' => 'Đã xóa thành công!',
            'status' => 200,
            'data' => $result
        ]);
    }
}

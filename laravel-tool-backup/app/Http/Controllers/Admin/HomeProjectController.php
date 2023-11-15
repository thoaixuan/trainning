<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HomeProject;
class HomeProjectController extends Controller
{
    public function getDatatable(Request $request){
        $columns[]='id';

        $limit=$request->input('length');
        $start=$request->input('start');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=HomeProject::count();
        $totalFiltered=$totalData;

            $HomeProject=HomeProject::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$HomeProject,
        );
        echo json_encode($json_data);
    }

    public function updateData(Request $request){
        $HomeProject=HomeProject::where('id','=',$request->id)->first();
        return response()->json([
            'message'=>"Lấy dữ liệu thành công",
            'status'=>200,
            'data'=>$HomeProject,
        ]);
    }
    public function postInsert(request $request)
    {
        $homeProject = new HomeProject();
        $homeProject->icon = $request->icon;
        $homeProject->content = $request->content;
        $homeProject->color = $request->color;
        $homeProject->save();

        if($homeProject->save()){
	        return response()->json([
                'message' => 'Thêm thành công',
                'status' => 200,
                'data' => $homeProject
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $homeProject
            ]);
	    }

    }

    public function update(request $request)
    {
        $HomeProject = HomeProject::where('id','=',$request->id)->first();
        $HomeProject->icon = $request->icon;
        $HomeProject->content = $request->content;
        $HomeProject->color = $request->color;
        $HomeProject->save();

        if($HomeProject->save()){
	        return response()->json([
                'message' => 'Sửa thành công',
                'status' => 200,
                'data' => $HomeProject
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $HomeProject
            ]);
	    }
    }

    public function delete( Request $Request )
    {
        $result = HomeProject::where('id','=',$Request->id)->first();
        $result->delete();
        return response()->json([
            'message' => 'Đã xóa thành công!',
            'status' => 200,
            'data' => $result
        ]);
    }

}

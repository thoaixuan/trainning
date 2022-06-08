<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departments;
class DepartmentController extends Controller
{
    public function getDatatable(Request $request){
        $columns[]='id';

        $limit=$request->input('length');
        $start=$request->input('start');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Departments::count();
        $totalFiltered=$totalData;

            $Departments=Departments::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$Departments,
        );
        echo json_encode($json_data);
    }

    public function updateData(Request $request){
        $Departments=Departments::where('id','=',$request->id)->first();
        return response()->json([
            'message'=>"Lấy dữ liệu thành công",
            'status'=>200,
            'data'=>$Departments,
        ]);
    }
    public function postInsert(request $request)
    {
        $Departments = new Departments();
        $Departments->title = $request->title;
        $Departments->des = $request->des;
        $Departments->save();

        if($Departments->save()){
	        return response()->json([
                'message' => 'Thêm thành công',
                'status' => 200,
                'data' => $Departments
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $Departments
            ]);
	    }

    }

    public function update(request $request)
    {
        $Departments = Departments::where('id','=',$request->id)->first();
        $Departments->title = $request->title;
        $Departments->des = $request->des;
        $Departments->save();

        if($Departments->save()){
	        return response()->json([
                'message' => 'Sửa thành công',
                'status' => 200,
                'data' => $Departments
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $Departments
            ]);
	    }
    }

    public function delete( Request $Request )
    {
        $result = Departments::where('id','=',$Request->id)->first();
        $result->delete();
        return response()->json([
            'message' => 'Đã xóa thành công!',
            'status' => 200,
            'data' => $result
        ]);
    }
}

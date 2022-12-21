<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeQuestion;
class HomeQuestionController extends Controller
{
    public function getDatatable(Request $request){
        $columns[]='id';

        $limit=$request->input('length');
        $start=$request->input('start');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=HomeQuestion::count();
        $totalFiltered=$totalData;

            $HomeQuestion=HomeQuestion::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$HomeQuestion,
        );
        echo json_encode($json_data);
    }

    public function updateData(Request $request){
        $HomeQuestion=HomeQuestion::where('id','=',$request->id)->first();
        return response()->json([
            'message'=>"Lấy dữ liệu thành công",
            'status'=>200,
            'data'=>$HomeQuestion,
        ]);
    }
    public function postInsert(request $request)
    {
        $HomeQuestion = new HomeQuestion();
        $HomeQuestion->title = $request->title;
        $HomeQuestion->des = $request->des;
        $HomeQuestion->save();

        if($HomeQuestion->save()){
	        return response()->json([
                'message' => 'Thêm thành công',
                'status' => 200,
                'data' => $HomeQuestion
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $HomeQuestion
            ]);
	    }

    }

    public function update(request $request)
    {
        $HomeQuestion = HomeQuestion::where('id','=',$request->id)->first();
        $HomeQuestion->title = $request->title;
        $HomeQuestion->des = $request->des;
        $HomeQuestion->save();

        if($HomeQuestion->save()){
	        return response()->json([
                'message' => 'Sửa thành công',
                'status' => 200,
                'data' => $HomeQuestion
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $HomeQuestion
            ]);
	    }
    }

    public function delete( Request $Request )
    {
        $result = HomeQuestion::where('id','=',$Request->id)->first();
        $result->delete();
        return response()->json([
            'message' => 'Đã xóa thành công!',
            'status' => 200,
            'data' => $result
        ]);
    }
}

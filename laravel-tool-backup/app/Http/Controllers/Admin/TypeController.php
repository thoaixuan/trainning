<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Types;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TypeController extends Controller
{
    public function index(){
        return view('admin.pages.type.type',['title'=>'Danh mục sản phẩm']);
    }
    public function getDatatable(Request $request){
        $columns[]='id';

        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Types::count();
        $totalFiltered=$totalData;

        if(empty($search)){
            $Types=Types::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();
        }else{
            $Types=Types::Where(function($query)use($search){
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
            "data"=>$Types,
        );
        echo json_encode($json_data);
    }
    public function getInsert(Request $request){
        return response()->json([
            'status'=>1,
            'message'=>"Data Inserted Successfully",
            'code'=>200
        ]);
    }
    public function postInsertType(request $request)
    {
        $message=[
            'name.required'=>"Tiêu đề không được để trống",
            'name.max:150'=>"Tiêu đề không quá 150 ký tự"
        ];
        $validate=Validator::make($request->all(),[
            'name'=>['required','max:150']
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status_validate'=>0,
                'message_error'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $Types = new Types();
        $Types->name = $request->name;
        $Types->slug = SlugService::createSlug(Types::class, 'slug', $request->name);
        $Types->save();

        if($Types->save()){
	        return response()->json([
                'message' => 'Thêm thành công',
                'status' => 200,
                'data' => $Types
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $Types
            ]);
	    }

    }

    public function updateData(Request $request){
        $Types=Types::where('id','=',$request->id)->first();
        return response()->json([
            'message'=>"Lấy dữ liệu thành công",
            'status'=>200,
            'data'=>$Types,
        ]);
    }

    public function update(request $request)
    {
        $message=[
            'name.required'=>"Tên không được để trống",
            'name.max:150'=>"Tên không quá 150 ký tự",
        ];
        $validate=Validator::make($request->all(),[
            'name'=>['required','max:150'],
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status_validate'=>0,
                'message_error'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $Types = Types::where('id','=',$request->id)->first();
        $Types->name = $request->name;
        $Types->slug = SlugService::createSlug(Types::class, 'slug', $request->name);

        $Types->save();

        if($Types->save()){
	        return response()->json([
                'message' => 'Sửa thành công',
                'status' => 200,
                'data' => $Types
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $Types
            ]);
	    }
    }

    public function delete( Request $Request )
    {
        $result = Types::where('id','=',$Request->id)->first();
        $result->delete();
        return response()->json([
            'message' => 'Đã xóa thành công!',
            'status' => 200,
            'data' => $result
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;
use Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class PageController extends Controller
{
    public function index(){
        return view('admin.pages.pages.pages',['title'=>'Quản lý trang']);
    }
    public function fetchData(Request $request){
        
        $columns [] ='id';
        $columns [] ='name';
        $columns [] ='slug';
        $columns [] ='content';
        $columns [] ='id';

     
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search');
        $totalData =  Pages::count();

        if(empty($search)){
            $Pages = Pages::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        } else {
            $Pages = Pages::Where(function($query)use($search){
	            $query->where('name', 'LIKE',"%{$search}%")
	            ->orWhere('slug', 'LIKE',"%{$search}%")
	            ->orWhere('content', 'LIKE',"%{$search}%");
	        })
	        ->offset($start)
	        ->limit($limit)
	        ->orderBy($order,$dir)
	        ->get();
	        $totalFiltered =$Pages->count();
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalData), 
            "data"            => $Pages   
        );
        return $json_data; 
    }
    public function fetchUpdate(Request $request){
        $Pages = Pages::where('id','=',$request->id)->first();
        return response()->json([
            'name' => 'Thành công',
            'status' => 200,
            'data' => $Pages
        ]);

    }
    public function insert(Request $request){
        $message = [
                'required'=>":attribute không được để trống",
            ];
            $validate = Validator::make($request->all(),[
                'name'=>['required','max:150']
                
            ],$message);
            if($validate->fails()){
                return response()->json([
                    'status_validate' => 1,
                    'data_error' => $validate->errors()->first()
                ]);
            }
            $Pages = new Pages();
            $Pages->name = removeTagScript($request->name);
            $Pages->content = removeTagScript($request->content);
            $slug =SlugService::createSlug(Pages::class, 'slug', $request->name);
            $Pages->slug = $slug;
            if($Pages->save()){
                return response()->json([
                    'name' => 'Thành công',
                    'status' => 200,
                    'data' => $Pages
                ]);
            }else{
                return response()->json([
                    'name' => 'Thất bại',
                    'status' => 500,
                    'data' => $Pages
                ]);
            }
    }
    public function update(Request $request){
        $message = [
            'required'=>":attribute không được để trống",
        ];
        $validate = Validator::make($request->all(),[
            'name'=>['required']
            
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status_validate' => 1,
                'data_error' => $validate->errors()->first()
            ]);
        }
        $Pages =  Pages::find($request->id);
        $Pages->name = $request->name;
        $Pages->content = $request->content;
        if($Pages->slug == change_to_slug($request->name)){
            $Pages->slug == change_to_slug($request->name);
        }else {
            $Pages->slug = SlugService::createSlug(Pages::class, 'slug', $request->name);
        }
        if($Pages->save()){
            return response()->json([
                'name' => 'Thành công',
                'status' => 200,
                'data' => $Pages
            ]);
        }else{
            return response()->json([
                'name' => 'Thất bại',
                'status' => 500,
                'data' => $Pages
            ]);
        }

    }
    public function delete(Request $request){
        $result = Pages::where('id','=',$request->id)->delete();
        if($result){
            return response()->json([
                'status'=>1,
                'message'=>"Xóa dữ liệu thành công",
                'code'=>200,
                'data'=>$result
            ]);
        }else{
            return response()->json([
                'status'=>0,
                'message'=>"Đã có lỗi xảy ra",
                'code'=>500,
            ]);
        }
    }
}

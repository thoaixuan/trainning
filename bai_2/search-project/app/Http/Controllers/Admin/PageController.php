<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
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
            $pages=Page::Where(function($query)use($search){
                $query->where('name','like',"%{$search}%")
                        ->orWhere('key','like',"%{$search}%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered =$pages->count();
        }

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$pages,
        );
        echo json_encode($json_data);
    }
    public function add(Request $request){
        $message=[
            'required'=>":attribute không được để trống",
        ];
        $validate=Validator::make($request->all(),[
            'name'=>['required'],
            'type_open'=>['required'],
            'status'=>['required'],
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $page=new Page();
        $page->name=$request->name;
        $page->link=$request->link;
        $page->type_open=$request->type_open;
        $page->status=$request->status;
        $page->content=$request->content;
        $page->slug=Str::slug($request->name,'-');
        $page->save();
        if($page){
            return response()->json([
                'status'=>1,
                'message'=>"Thêm dữ liệu thành công",
                'code'=>200,
                'data'=>$page
            ]);
        }
        else{
            return response()->json([
                'status'=>0,
                'message'=>"Đã xảy ra lỗi",
                'code'=>500,
                'data'=>$page
            ]);
        }
    }

    public function getUpdate(Request $request){
        $page=Page::where('id','=',$request->id)->first();
        if($page){
            return response()->json([
                'message'=>"Data Inserted Successfully",
                'code'=>200,
                'data'=>$page
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }

    public function postUpdate(Request $request){
        $page=Page::where('id','=',$request->id)->first();
        $page->name=$request->name;
        $page->link=$request->link;
        $page->type_open=$request->type_open;
        $page->status=$request->status;
        $page->content=$request->content;
        $page->slug=Str::slug($request->name,'-');
        $page->save();
        if($page){
            return response()->json([
                'message'=>"Data Update Successfully",
                'code'=>200,
                'data'=>$page
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }

    public function delete(Request $request){
        $page=Page::find($request->id);
        $page->delete();
        if($page){
            return response()->json([
                'message'=>"Data Delete Successfully",
                'code'=>200,
                'data'=>$page
            ]);
        }else{
            return response()->json([
                'message'=>"Internal Server Error",
                'code'=>500,
            ]);
        }
    }

    public function swap(Request $request){
        $page=Page::where('id','=',$request->id)->first();
        $page->status = !$page->status;
        $page->save();
        if($page){
            return response()->json([
                'status'=>1,
                'message'=>"Thêm dữ liệu thành công",
                'code'=>200,
                'data'=>$page
            ]);
        }
        else{
            return response()->json([
                'status'=>0,
                'message'=>"Đã xảy ra lỗi",
                'code'=>500,
                'data'=>$page
            ]);
        }
    }

}

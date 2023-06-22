<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Storage;
use File;
use App\Products;
use App\Types;
use App\Suppliers;
class ProductController extends Controller
{
    public function index(){
        return view('admin.pages.product.product',['title'=>'Product']);
    }
    public function getDatatable(Request $request){
        $columns[]='id';

        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Products::count();
        $totalFiltered=$totalData;

        if(empty($search)){
            $Products=Products::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();
        }else{
            $Products=Products::Where(function($query)use($search){
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
            "data"=>$Products,
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
    public function getTypes(){
        $Types = Types::get();
        return response()->json([
            'status'=>1,
            'message'=>"Get Data Successfully",
            'code'=>200,
            'data'=>$Types
        ]);
    }
    public function getSuppliers(){
        $Suppliers = Suppliers::get();
        return response()->json([
            'status'=>1,
            'message'=>"Get Data Successfully",
            'code'=>200,
            'data'=>$Suppliers
        ]);
    }
    public function postInsertProduct(request $request)
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
        if($request->hasfile('image'))
        {

           foreach($request->file('image') as $image)
           {
               $name=time().'_'.convert_vi_to_en($image->getClientOriginalName());
               $data[] = $name;  
           }
        }else {
            $data = array();
        }
        $Products = new Products();
        $Products->image = json_encode($data, JSON_UNESCAPED_UNICODE);
        $Products->name = $request->name;
        // if($request->hasFile("image")){
        //     $image = $request->file("image");
        //     $name = time().'_'.convert_vi_to_en($image->getClientOriginalName());
        //     Storage::disk('product')->put($name,File::get($image));
        //     $Products->image = $name;
        // }
        // else {
        //     $Products->image = '';
        // }
        $Products->slug = SlugService::createSlug(Products::class, 'slug', $request->name);
        $Products->description = $request->description;
        $Products->status = $request->status;
        $Products->quantity = $request->quantity;
        if($request->price !== null){
            $Products->price = str_replace(',', '', $request->price);
        }
        $Products->type_id = $request->type_id;
        $Products->supplier_id = $request->supplier_id;
        
        $Products->save();
        
        $get_id = $Products->id;
        if($request->hasFile('image')) {
            foreach($request->file('image') as $image)
            {
                $name=time().'_'.convert_vi_to_en($image->getClientOriginalName());
                $image->move(public_path().'/uploads/products/'.$get_id, $name);    
            }
        }

        if($Products->save()){
	        return response()->json([
                'message' => 'Thêm thành công',
                'status' => 200,
                'data' => $Products
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $Products
            ]);
	    }

    }

    public function updateData(Request $request){
        $Products=Products::where('id','=',$request->id)->first();
        return response()->json([
            'message'=>"Lấy dữ liệu thành công",
            'status'=>200,
            'data'=>$Products,
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
        $Products = Products::where('id','=',$request->id)->first();
        // if($request->hasFile("image")){
        //     if(!empty($Products->image)){
        //         Storage::disk('product')->delete($Products->image);
        //     }
        //     $image_edit = $request->file("image");
        //     $name_img = time().'_'.convert_vi_to_en($image_edit->getClientOriginalName());
        //     Storage::disk('product')->put($name_img,File::get($image_edit));
        //     $Products->image = $name_img;
        // }
        // else {
        //     $Products->image = $Products->image;
        // }
        if($request->hasFile('image')) {
        // Lấy mảng từ request image
        foreach($request->file('image') as $image)
           {
               $name=time().'_'.convert_vi_to_en($image->getClientOriginalName());
               $image->move(public_path().'/uploads/products/'.$request->id, $name); 
               $data[] = $name;
            }
            // Lấy mảng các ảnh cũ trong db
            $old_images = json_decode($Products->image, JSON_UNESCAPED_UNICODE);
            // Duyệt mảng để lấy tên các ảnh mới upload rồi push vào 1 mảng mới 
            // foreach để chia nhỏ lấy từng tên hình rồi push
            foreach($data as $list_data_small){
                $data_small = $list_data_small;
                array_push($old_images, $data_small);
            }
            // Gán biến cho db image array hình cũ và từ foreach mảng mới push
            $Products->image = json_encode($old_images, JSON_UNESCAPED_UNICODE);
        }else {
            $Products->image = $Products->image;
        }
        
        $Products->name = $request->name;
        if($Products->slug == change_to_slug($request->name)){
            $Products->slug = change_to_slug($request->name);
        }else {
            $Products->slug = SlugService::createSlug(Products::class, 'slug', $request->name);
        }
        if($request->price !== null){
            $Products->price = str_replace(',', '', $request->price);
        }
        $Products->description = $request->description;
        $Products->status = $request->status;
        $Products->type_id = $request->type_id;
        $Products->supplier_id = $request->supplier_id;
        $Products->save();

        if($Products->save()){
	        return response()->json([
                'message' => 'Sửa thành công',
                'status' => 200,
                'data' => $Products
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $Products
            ]);
	    }
    }

    public function getDeleteImage( Request $Request )
    {
        $result = Products::where('id','=',$Request->id)->first();
        $arr_img = json_decode($result->image);
        File::delete(public_path().'/uploads/products/'.$Request->id.'/'.$arr_img[$Request->key_img]);        
        // Xóa phần tử trong mảng với key = key_img
        unset($arr_img[$Request->key_img]);
        // chuyển từ mảng kết hợp thành mảng liên tục
        $array = array_values($arr_img);
        $result->image = json_encode($array, JSON_UNESCAPED_UNICODE);
        $result->save();
        return response()->json([
            'message' => 'Đã xóa ảnh thành công!',
            'status' => 200,
            'data' => $result
        ]);
    }

    public function delete( Request $Request )
    {
        $result = Products::where('id','=',$Request->id)->first();
        if(!empty($result->image)){
            // Storage::disk('product')->delete($result->image);
            File::deleteDirectory(public_path().'/uploads/products/'.$Request->id);
        }
        $result->delete();
        return response()->json([
            'message' => 'Đã xóa thành công!',
            'status' => 200,
            'data' => $result
        ]);
    }
}

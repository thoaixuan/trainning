<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;
class ProductController extends Controller
{
    public function getProduct()
    {
       return view('Admin.pages.product.product'); 
    }
   public function getDatatable(Request $Request)
    {
      
        $columns [] ='id';
        $columns [] ='name';
        $columns [] ='price';
        $columns [] ='qty';
        $columns [] ='description';
        $columns [] ='id';
     
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $totalData =  Product::count();
        if(empty($search)){
        $Product = Product::offset($start)
        ->limit($limit)
        ->orderBy($order,$dir)
        ->get();
        } else {
            $Product = Product::Where(function($query)use($search){
	            $query->where('name', 'LIKE',"%{$search}%")
	            ->orWhere('description', 'LIKE',"%{$search}%");
	        })
	        ->offset($start)
	        ->limit($limit)
	        ->orderBy($order,$dir)
	        ->get();
	        $totalFiltered =$Product->count();
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalData), 
            "data"            => $Product   
        );
        echo json_encode($json_data); 
    }

    public function postInsertProduct(Request $Request) {
        $message = [
            'required'=>":attribute không được để trống",
        ];
        $validate = Validator::make($Request->all(),[
            'name'=>['required','max:150'],
            'price'=>['required','max:150'],
            'qty'=>['required','max:150']
            
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status_validate' => 1,
                'data_error' => $validate->errors()->first()
            ]);
        }
        $Product = new Product();
	    $Product->name = $Request->name;
        $Product->price = $Request->price;
        $Product->qty = $Request->qty;
	    $Product->description = $Request->description;
	    if($Product->save()){
	        return response()->json([
                'message' => 'Thêm thành công',
                'status' => 1,
                'data' => $Product
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 0,
                'data' => $Product
            ]);
	    }
    }

    public function getUpdateProduct(Request $Request) {
        $Product = Product::where('id','=',$Request->id)->first();
        return response()->json([
            'name' => 'Thành công',
            'status' => 200,
            'data' => $Product
        ]);
    }

    public function postUpdateProduct(Request $Request)
	{
            $message = [
                'required'=>":attribute không được để trống",
            ];
            $validate = Validator::make($Request->all(),[
                'name'=>['required','max:150'],
                'price'=>['required','max:150'],
                'qty'=>['required','max:150']
                
            ],$message);
            if($validate->fails()){
                return response()->json([
                    'status_validate' => 1,
                    'data_error' => $validate->errors()->first()
                ]);
            }
	        $Product =  Product::find($Request->id);
	        $Product->name = $Request->name;
            $Product->price = $Request->price;
            $Product->qty = $Request->qty;
		    $Product->description = $Request->description;
	        if($Product->save()){
                return response()->json([
                    'message' => 'Sửa thành công',
                    'status' => 200,
                    'data' => $Product
                ]);
            }else{
                return response()->json([
                    'message' => 'Thất bại',
                    'status' => 500,
                    'data' => $Product
                ]);
            }
	 
	}

    public function destroyProduct( Request $Request ) {
        $result = Product::where('id','=',$Request->id)->delete();
        return $result;
    }
}

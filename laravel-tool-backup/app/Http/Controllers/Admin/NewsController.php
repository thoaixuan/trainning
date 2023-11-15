<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\CategoryNews;
use Illuminate\Support\Facades\Validator;
use Storage;
use File;
use voku\helper\HtmlDomParser;
use Image;
class NewsController extends Controller
{
    public function index(){
        return view('admin.pages.news.news',['title'=>'Quản lý tin tức']);
    }
    public function getDatatable(Request $request){
        $columns[]='id';

        $columns[]='title';
        $columns[]='description';

        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=News::count();
        $totalFiltered=$totalData;

        if(empty($search)){
            $News=News::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();
        }else{
            $News=News::Where(function($query)use($search){
                $query->where('title','like',"%{$search}%")
                ->orWhere('summary','like',"%{$search}%");
            })
            ->offset($start)
            ->limit($limit)
            ->orderByDesc($order,$dir)
            ->get();
        }

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$News,
        );
        echo json_encode($json_data);
    }
    public function getCategory(Request $request){
        $getCategory=CategoryNews::get();
        return response()->json([
            'message'=>"Lấy dữ liệu thành công",
            'status'=>200,
            'data'=>$getCategory,
        ]);
    }
    public function updateData(Request $request){
        $News=News::where('id','=',$request->id)->first();
        return response()->json([
            'message'=>"Lấy dữ liệu thành công",
            'status'=>200,
            'data'=>$News,
        ]);
    }
    public function postInsertNews(request $request)
    {
        $message=[
            'title.required'=>"Tiêu đề không được để trống",
            'title.max:60'=>"Tiêu đề không quá 60 ký tự"
        ];
        $validate=Validator::make($request->all(),[
            'title'=>['required','max:60']
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $News = new News();
        $News->title = $request->title;
        if($request->hasFile("image")){
            $image = $request->file("image");
            $name = time().'_'.convert_vi_to_en($image->getClientOriginalName());
            Storage::disk('news')->put($name,File::get($image));
            $News->image = $name;
        }
        else {
            $News->image = '';
        }
        $News->slug = $request->slug;
        $News->summary = $request->summary;
        $News->category_id = $request->category_id;
        
        $News->save();
        $request['id']= $News->id;
        $this->uploadImageContent($request);
        if($News->save()){
	        return response()->json([
                'message' => 'Thêm thành công',
                'status' => 200,
                'data' => $News
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $News
            ]);
	    }

    }
    public function checkSlug(request $request)
    {
        $data_slug = News::where('slug','LIKE',$request->slug)->count();
        if($data_slug == 0){
            return response()->json([
                'checkSlug' => false
            ]);
        }else {
            return response()->json([
                'checkSlug' => true
            ]);
        }
    }
    public function update(request $request)
    {
        $message=[
            'title.required'=>"Tiêu đề không được để trống",
            'title.max:60'=>"Tiêu đề không quá 60 ký tự",
        ];
        $validate=Validator::make($request->all(),[
            'title'=>['required','max:60'],
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $News = News::where('id','=',$request->id)->first();
        if($request->hasFile("image")){
            if(\File::exists(public_path('/uploads/news/'.$News->image))){
                \File::delete(public_path('/uploads/news/'.$News->image));
            }
            $image_edit = $request->file("image");
            $name_img = time().'_'.convert_vi_to_en($image_edit->getClientOriginalName());
            Storage::disk('news')->put($name_img,File::get($image_edit));
            $imageName = $name_img;
        }
        else {
            $imageName = $News->image;
        }
        $News->title = $request->title;
        $News->image = $imageName;
        if($News->slug == change_to_slug($request->title)){
            $News->slug = change_to_slug($request->title);
        }else {
            $News->slug = $request->slug;
        }
        $News->summary = $request->summary;
        $News->category_id = $request->category_id;
        $this->uploadImageContent($request);
        $News->save();

        if($News->save()){
	        return response()->json([
                'message' => 'Sửa thành công',
                'status' => 200,
                'data' => $News
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $News
            ]);
	    }
    }

    public function delete( Request $Request )
    {
        $result = News::where('id','=',$Request->id)->first();
        if($result->image !== null){
            Storage::disk('news')->delete($result->image);
        }
        if(\File::exists(public_path("/uploads/website/news/".$result->id))){
            \File::deleteDirectory(public_path("/uploads/website/news/".$result->id));
        }
        $result->delete();
        return response()->json([
            'message' => 'Đã xóa thành công!',
            'status' => 200,
            'data' => $result
        ]);
    }
    public function getInsert(Request $request){
        return response()->json([
            'status'=>1,
            'message'=>"Data Inserted Successfully",
            'code'=>200
        ]);
    }
    public function uploadImageContent($request)
    {
        $FOLDER  = "/uploads/website/news/{$request->id}";
        $post_content= $request->content;
        $dom = HtmlDomParser::str_get_html($post_content);
        $images = $dom->getElementsByTagName('img');
        $arrayImage = [];
        if($request->id==null||$request->id==""){
            \File::makeDirectory(public_path($FOLDER),0777,true);
        }else{
            if(!\File::exists(public_path($FOLDER))){
                \File::makeDirectory(public_path($FOLDER),0777,true);
            }
        }
        foreach($images as $img){
            $src = $img->getAttribute('src');
            if(preg_match('/data:image/', $src)){
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $extension = $groups['mime'];
                $filename = date('d-m-Y')."-".uniqid().'.'.$extension;
                $filepath = "{$FOLDER}/$filename";
                Image::make($src)->save(public_path($filepath));
                $new_src = url($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $arrayImage[] = $filename;
            }else{
                if($src!=""){
                    $src = explode("/",$src);
                    $srcIndex = count($src);
                    $arrayImage[]=$src[$srcIndex-1];
                }
            }
        }
        $this->removeFileImageContent($FOLDER,collect($arrayImage));
        $post = News::where('id','=',$request->id)->first();
        $post->content = $dom->save();
        $post->save();
    }
    public function removeFileImageContent($FOLDER,$arrayImage)
    {
        $path = public_path($FOLDER);
        $files = \File::allFiles($path);
        foreach($files as $item){
            if($arrayImage->contains($item->getFileName())==false){
                \File::delete(($item->getPathname()));
            }
        }
    }
}

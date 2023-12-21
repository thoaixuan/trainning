<?php

namespace App\Http\Controllers\Admin;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Validator;
use voku\helper\HtmlDomParser;
use Image;
use File;
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
        $totalData =  Page::count();

        if(empty($search)){
            $Page = Page::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        } else {
            $Page = Page::Where(function($query)use($search){
	            $query->where('name', 'LIKE',"%{$search}%")
	            ->orWhere('slug', 'LIKE',"%{$search}%")
	            ->orWhere('content', 'LIKE',"%{$search}%");
	        })
	        ->offset($start)
	        ->limit($limit)
	        ->orderBy($order,$dir)
	        ->get();
	        $totalFiltered =$Page->count();
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalData), 
            "data"            => $Page   
        );
        return $json_data; 
    }
    public function fetchUpdate(Request $request){
        $Page = Page::where('id','=',$request->id)->first();
        return response()->json([
            'name' => 'Thành công',
            'status' => 200,
            'data' => $Page
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
            $Page = new Page();
            $Page->name = removeTagScript($request->name);
            $Page->content = removeTagScript($request->content);
            $slug = $request->slug;
            $Page->slug = $slug;
            $Page->save();
            $request['id']= $Page->id;
            $this->uploadImageContent($request);
            if($Page->save()){
                return response()->json([
                    'name' => 'Thành công',
                    'status' => 200,
                    'data' => $Page
                ]);
            }else{
                return response()->json([
                    'name' => 'Thất bại',
                    'status' => 500,
                    'data' => $Page
                ]);
            }
    }
    public function checkSlug(request $request)
    {
        $data_slug = Page::where('slug','LIKE',$request->slug)->count();
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
        $Page =  Page::find($request->id);
        $Page->name = $request->name;
        $Page->slug = $request->slug;
        $this->uploadImageContent($request);
        $Page->save();
        if($Page->save()){
            return response()->json([
                'name' => 'Thành công',
                'status' => 200,
                'data' => $Page
            ]);
        }else{
            return response()->json([
                'name' => 'Thất bại',
                'status' => 500,
                'data' => $Page
            ]);
        }

    }
    public function delete(Request $request){
        $result = Page::where('id','=',$request->id)->delete();
        if(\File::exists(public_path("/uploads/website/pages/".$request->id))){
            \File::deleteDirectory(public_path("/uploads/website/pages/".$request->id));
        }
        return success($result);
    }
    public function uploadImageContent($request)
    {
        $FOLDER  = "/uploads/website/pages/{$request->id}";
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
        $post = Page::where('id','=',$request->id)->first();
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

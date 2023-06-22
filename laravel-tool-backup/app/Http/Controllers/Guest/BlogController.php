<?php

namespace App\Http\Controllers\Guest;

use Artesaos\SEOTools\Facades\SEOMeta;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Illuminate\Http\Request;
use App\Models\News;
use DB;
class BlogController extends Controller
{
    public function index(Request $request){
        OpenGraph::addProperty('site_name', "Tin tức");
        SEOMeta::setTitle("Tin tức");
        if($request->slug){
            $news= DB::table('tbl_news')->join('tbl_category_news','tbl_news.category_id','=','tbl_category_news.id')->where('tbl_category_news.slug','=',$request->slug)->reorder('tbl_news.id','desc')->select('tbl_news.*')->paginate(4);
        }
        else{
            $news= News::reorder('id','desc')->paginate(4);
        }
        return view('guest.pages.blog.blog',['news'=>$news]);
    }
    public function viewDetail(Request $request){
        $news = News::where('slug','=',$request->slug)->first();
        SEOTools::setCanonical(url("/news/detail/".$news->slug));
        SEOMeta::setTitle($news->title);
        SEOMeta::setDescription($news->summary);
        SEOMeta::addMeta('article:section', 'Tin tức', 'property');
        SEOMeta::addMeta('article:published_time', $news->created_at, 'property');
        SEOMeta::addMeta('article:modified_time', $news->updated_at, 'property');
        
        OpenGraph::addProperty('locale','vi_VN');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('title', $news->title);
        OpenGraph::addProperty('updated_time', $news->updated_at);
        OpenGraph::addProperty('site_name', $news->title);
        OpenGraph::addImage([asset('uploads/news/'.$news->image), 'size' => 300]);
        if($news->image){
            OpenGraph::addImage(['secure_url'=>asset('uploads/news/'.$news->image)]);
        }
        foreach(json_decode(settings()->website_logo) as $header_logo){
            OpenGraph::addImage(['secure_url'=>asset('uploads/website/'.$header_logo->logo_guest)]);
        }
        OpenGraph::addImage(['alt'=>$news->image]);
        OpenGraph::addImage(['type'=>"image/png"]);

        TwitterCard::addValue("card", $news->image);
        TwitterCard::addValue("title", $news->title);
        TwitterCard::addValue("description", $news->content);
        if($news->image){
            TwitterCard::addValue("image",asset('uploads/news/'.$news->image));
        }else{
            foreach(json_decode(settings()->website_logo) as $header_logo){
            TwitterCard::addValue("image",asset('uploads/website/'.$header_logo->logo_guest));
            }
        }

        JsonLd::setTitle($news->title);
        JsonLd::setDescription($news->description);
        JsonLd::addValue('@id', $news->id);

        JsonLdMulti::addImage([asset('uploads/news/'.$news->image), 'size' => 300]);
        JsonLdMulti::setType('Article');
        // TwitterCard::setType($news->title.' - Rau củ quả sạch TP Vũng Tàu - Nông trang Xanh');


        return view('guest.pages.blog.viewDetail',['news'=>$news]);
    }
}

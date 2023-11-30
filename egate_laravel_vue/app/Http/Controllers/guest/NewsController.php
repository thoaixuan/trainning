<?php

namespace App\Http\Controllers\guest;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Storage;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $baseURL=base_urlApi();
        // $api = Storage::disk('local')->get('api.json');
        // $load_api = json_decode($api, true);

        $client = new Client(); 
        $response = $client->request('GET', $baseURL.'/api/mobile/news/getByID/'.$request->id,['verify' => false] );
        $res= $response->getBody();
        $arr_body = json_decode($res);
        $news=$arr_body->result;

        SEOMeta::setTitle($news->title);
        SEOMeta::setDescription(strip_tags(trimDes($news->content)));
        SEOMeta::addMeta('article:section', 'Tin tức', 'property');
        SEOMeta::addMeta('article:published_time', $news->createdAt, 'property');
        SEOMeta::addMeta('article:modified_time', $news->updatedAt, 'property');
        SEOMeta::setCanonical(url("/news/".$news->_id));
        
        SEOTools::setCanonical(url("/news/".$news->_id));
        SEOTools::setDescription(strip_tags(trimDes($news->content)));
        SEOTools::opengraph()->setUrl(url("/news/".$news->_id));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage($news->image);

        OpenGraph::setDescription(strip_tags(trimDes($news->content)));
        OpenGraph::setTitle($news->title);
        OpenGraph::setUrl(url("/news/".$news->_id));
        OpenGraph::addProperty('locale','vi_VN');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('title', $news->title);
        OpenGraph::addProperty('updated_time', $news->updatedAt);
        OpenGraph::addProperty('site_name',$news->title);
        OpenGraph::addImage([$news->image, 'size' => 300]);
        OpenGraph::addImage(['alt'=>$news->image]);
        OpenGraph::addImage(['type'=>"image/png"]);

        TwitterCard::addValue("card", $news->image);
        TwitterCard::addValue("title", $news->title);
        TwitterCard::addValue("description", strip_tags(trimDes($news->content)));
        TwitterCard::addValue("image",$news->image);

        JsonLd::setTitle($news->title);
        JsonLd::setDescription(strip_tags(trimDes($news->content)));
        JsonLd::setType('Article');
        JsonLd::addImage($news->image);

        JsonLdMulti::setTitle($news->title);
        JsonLdMulti::setDescription(strip_tags(trimDes($news->content)));
        JsonLdMulti::addImage([ $news->image, 'size' => 300]);
        JsonLdMulti::setType('Article');

        return view('guest.layouts.main',['meta'=>false,'title'=>$news->title]);
    }

    public function indexNews()
    {
        $title = "Tin tức e-Gate";
        $des = "Tin tức cập nhất mới nhất về kỷ nguyên công nghệ e-Gate";
        SEOMeta::setDescription($des);
        SEOMeta::addMeta('article:section', 'Tin tức', 'property');

        SEOTools::setCanonical(route('guest.indexNews'));
        SEOTools::setDescription($des);
        return view('guest.layouts.main',['meta'=>true,'title'=>$title]);
    }
}

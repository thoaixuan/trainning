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

class HomeController extends Controller
{
   
    public function index()
    {
        $homes=setting();
        $title="e-Gate - Kết nối kỷ nguyên công nghệ";
        $des="Cung cấp các giải pháp về ứng dụng công nghệ tiên tiến nhất nhằm nâng cao trải nghiệm của người dùng trên hệ thống. Các sản phẩm chất lượng - Bảo vệ môi trường và các sản phẩm công nghệ tiện ích.";
        // SEOMeta::setTitle($title);
        SEOMeta::setDescription($des);
        SEOMeta::addMeta('article:section', 'Trang chủ', 'property');
        SEOMeta::setCanonical(url()->full());
        
        SEOTools::setCanonical(url()->full());
        // SEOTools::setTitle('Home');
        SEOTools::setDescription($des);
        SEOTools::opengraph()->setUrl(url()->full());
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage($homes->app_logo);

        OpenGraph::setDescription($des);
        OpenGraph::setTitle($title);
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('locale','vi_VN');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('title', $title);
        OpenGraph::addProperty('updated_time', $homes->updatedAt);
        OpenGraph::addProperty('site_name',$title);
        OpenGraph::addImage([$homes->app_logo, 'size' => 300]);
        OpenGraph::addImage(['alt'=>$homes->app_logo]);
        OpenGraph::addImage(['type'=>"image/png"]);

        TwitterCard::addValue("card", $homes->app_logo);
        TwitterCard::addValue("title", $title);
        TwitterCard::addValue("description", $des);
        TwitterCard::addValue("image",$homes->app_logo);

        JsonLd::setTitle($title);
        JsonLd::setDescription($des);
        JsonLd::setType('Article');
        JsonLd::addImage($homes->app_logo);

        JsonLdMulti::setTitle($title);
        JsonLdMulti::setDescription($des);
        JsonLdMulti::addImage([ $homes->app_logo, 'size' => 300]);
        JsonLdMulti::setType('Article');
        // Append JsonLdMulti
        // JsonLdMulti::newJsonLd()->addValue('key', 'value')
        // ->setType('type')
        // ->setImage('url')
        // ->setTitle('title')
        // ->setDescription('description')
        // ->setUrl('url')
        // ->setSite('name');
        return view('guest.layouts.main',["meta"=>true]);
    }

    public function indexAboutUs()
    {
        $title = "About e-Gate";
        $des = "Giới thiệu về chúng tôi, About e-Gate";
        SEOMeta::setDescription($des);

        SEOTools::setCanonical(route('guest.indexNews'));
        SEOTools::setDescription($des);
        return view('guest.layouts.main',['meta'=>true,'title'=>$title]);
    }

    public function indexContact()
    {
        $title = "Contact e-Gate";
        $des = "Liên hệ với chúng tôi, Contact e-Gate";
        SEOMeta::setDescription($des);

        SEOTools::setCanonical(route('guest.indexContact'));
        SEOTools::setDescription($des);
        return view('guest.layouts.main',['meta'=>true,'title'=>$title]);
    }
}

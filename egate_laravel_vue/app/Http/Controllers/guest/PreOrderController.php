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

class PreOrderController extends Controller
{
    public function index()
    {
        $homes=setting();
        $title = "e-Gate Box Pre Orders";
        $des = "e-Gate Box thông minh tiện ích cho Người mua hàng Online. Sử dụng ứng dụng e-Gate có thể mở thông tin trên các sàn thương mại điện tử phổ biến hiện nay như Tiki, Shopee, Lazada. Ngoài ra e-Gate còn được tích hợp để sử dụng với mọi nhu cầu giao hàng không chạm An toàn - Tiện lợi - Chính xác. Thông tin giao - nhận hàng được cập nhật đến người sở hữu e-Gate Box tức thời";
        SEOMeta::setDescription($des);
        SEOMeta::addMeta('article:section', 'Trang chủ', 'property');
        SEOMeta::setCanonical(route('guest.preOders'));
        
        SEOTools::setCanonical(route('guest.preOders'));
        SEOTools::setDescription($des);
        SEOTools::opengraph()->setUrl(route('guest.preOders'));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage(url('assets/background/product_egate.png'));

        OpenGraph::setDescription($des);
        OpenGraph::setUrl(route('guest.preOders'));
        OpenGraph::addProperty('locale','vi_VN');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('title', $title);
        OpenGraph::addProperty('updated_time', $homes->updatedAt);
        OpenGraph::addProperty('site_name',$title);
        OpenGraph::addImage([url('assets/background/product_egate.png'), 'size' => 300]);
        OpenGraph::addImage(['alt'=>url('assets/background/product_egate.png')]);
        OpenGraph::addImage(['type'=>"image/png"]);

        TwitterCard::addValue("card", url('assets/background/product_egate.png'));
        TwitterCard::addValue("title", $title);
        TwitterCard::addValue("description", $des);
        TwitterCard::addValue("image",url('assets/background/product_egate.png'));

        JsonLd::setTitle($title);
        JsonLd::setDescription($des);
        JsonLd::setType('Article');
        JsonLd::addImage(url('assets/background/product_egate.png'));

        JsonLdMulti::setTitle($title);
        JsonLdMulti::setDescription($des);
        JsonLdMulti::addImage([ url('assets/background/product_egate.png'), 'size' => 300]);
        JsonLdMulti::setType('Article');
        $append_meta=
        '';
        return view('guest.layouts.main',["meta"=>false,"append_meta"=>$append_meta,"title"=>$title]);
    }
}

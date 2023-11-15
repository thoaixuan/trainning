<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        SEOMeta::setTitle("Giỏ hàng");
        OpenGraph::addProperty('locale','vi_VN');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('title', "Giỏ hàng");
        TwitterCard::addValue("title", "Giỏ hàng");
        JsonLd::setTitle("Giỏ hàng");
        JsonLdMulti::setType('Article');
        return view('guest.pages.cart.cart');
    }
}

<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use App\Models\Page;
class PageController extends Controller
{
    public function index(Request $request){
        $page=Page::where('slug','=',$request->slug)->first();
        SEOMeta::setTitle($page->name);
        OpenGraph::addProperty('locale','vi_VN');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('title', $page->name);
        TwitterCard::addValue("title", $page->name);
        JsonLd::setTitle($page->name);
        JsonLdMulti::setType('Article');
        return view('guest.pages.pages.pages',['page'=>$page]);
    }
}

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
use DB;
use App\Products;
class ProductController extends Controller
{
    public function index(Request $request){
        SEOMeta::setTitle(getConfigMail()->website_name);
        OpenGraph::addProperty('site_name',"Sản phẩm");
        SEOMeta::setTitle("Sản phẩm");
        if($request->slug){
            $products= DB::table('tbl_products')->join('tbl_types','tbl_products.type_id','=','tbl_types.id')->where('tbl_types.slug','=',$request->slug)->reorder('tbl_products.id','desc')->select('tbl_products.*')->paginate(6);
            return view('guest.pages.product.product',['products'=>$products]);
            
        }
        else{
            $products= Products::reorder('id','desc')->paginate(6);
            return view('guest.pages.product.product',['products'=>$products]);
        }
    }
    public function viewDetail(Request $request){
        $products=Products::where('slug','=',$request->slug)->first();
        SEOTools::setCanonical(url("/products/detail/".$products->slug));
        SEOMeta::setTitle($products->name);
        SEOMeta::setDescription($products->description);
        SEOMeta::addMeta('article:section', 'Sản phẩm', 'property');
        SEOMeta::addMeta('article:published_time', $products->created_at, 'property');
        SEOMeta::addMeta('article:modified_time', $products->updated_at, 'property');
        OpenGraph::addProperty('locale','vi_VN');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('title', $products->name);
        OpenGraph::addProperty('updated_time', $products->updated_at);
        OpenGraph::addProperty('site_name',$products->name);
        OpenGraph::addImage([asset('uploads/products/'.$products->id.'/'.$products->image), 'size' => 300]);
        if($products->image){
            OpenGraph::addImage(['secure_url'=>asset('uploads/products/'.$products->id.'/'.$products->image)]);
        }
        foreach(json_decode(settings()->website_logo) as $header_logo){
            OpenGraph::addImage(['secure_url'=>asset('uploads/website/'.$header_logo->logo_guest)]);
        }
        OpenGraph::addImage(['alt'=>$products->image]);
        OpenGraph::addImage(['type'=>"image/png"]);

        TwitterCard::addValue("card", $products->image);
        TwitterCard::addValue("title", $products->title);
        TwitterCard::addValue("description", $products->content);
        TwitterCard::addValue("image",asset('uploads/products/'.$products->id.'/'.$products->image));
        JsonLd::setTitle($products->title);
        JsonLd::setDescription($products->description);
        JsonLd::addValue('@id', $products->id);
        JsonLdMulti::addImage([asset('uploads/products/'.$products->id.'/'.$products->image), 'size' => 300]);
        JsonLdMulti::setType('Article');
        return view('guest.pages.product.detail',['products'=>$products]);
    }
}

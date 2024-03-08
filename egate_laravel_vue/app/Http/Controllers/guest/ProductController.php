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
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $baseURL=base_urlApi();
        // $api = Storage::disk('local')->get('api.json');
        // $load_api = json_decode($api, true);

        $client = new Client();
        try {
            $response = $client->request('GET', $baseURL.'/api/product/getByID?_id='.$request->id,['verify' => false]);
            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
                $data = $response->getBody();
            } else {
                // Handle non-200 status code
                return redirect()->route('guest.home');
            }
        } catch (RequestException $e) {
            // Handle request exception
            $message = $e->getMessage();
            $code = $e->getCode();
            // Log or handle the error as appropriate
            return redirect()->route('guest.home');
        } catch (Exception $e) {
            // Handle other exceptions
            $message = $e->getMessage();
            $code = $e->getCode();
            // Log or handle the error as appropriate
            return redirect()->route('guest.home');
        }
        $arr_body = json_decode($data);
        // Kiem tra neu tra ve rỗng thì chuyển trang chủ
        if(empty($arr_body->result)){
            return redirect()->route('guest.home');
        }
        $products=$arr_body->result[0];
        SEOTools::setCanonical(url("/products/".$products->_id));
        SEOTools::setDescription(strip_tags(trimDes($products->product_detail)));
        SEOTools::opengraph()->setUrl(url("/products/".$products->_id));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage($products->image[0]);

        SEOMeta::setCanonical(url("/products/".$products->_id));
        SEOMeta::setDescription(strip_tags(trimDes($products->product_detail)));
        SEOMeta::addMeta('article:section', 'Sản phẩm', 'property');
        SEOMeta::addMeta('article:published_time', $products->createdAt, 'property');
        SEOMeta::addMeta('article:modified_time', $products->updatedAt, 'property');

        OpenGraph::addProperty('locale','vi_VN');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('title', $products->product_name);
        OpenGraph::addProperty('updated_time', $products->updatedAt);
        OpenGraph::addProperty('site_name',$products->product_name);
        OpenGraph::addImage([$products->image[0], 'size' => 300]);
        OpenGraph::addImage(['alt'=>$products->image[0]]);
        OpenGraph::addImage(['type'=>"image/png"]);

        TwitterCard::addValue("card", $products->image[0]);
        TwitterCard::addValue("title", $products->product_name);
        TwitterCard::addValue("description", strip_tags(trimDes($products->product_detail)));
        TwitterCard::addValue("image",$products->image[0]);

        JsonLd::setTitle($products->product_name);
        JsonLd::setDescription(strip_tags(trimDes($products->product_detail)));
        JsonLd::setType('Article');
        JsonLd::addImage($products->image[0]);
        JsonLd::addValue('@id', $products->_id);

        JsonLdMulti::setTitle($products->product_name);
        JsonLdMulti::setDescription(strip_tags(trimDes($products->product_detail)));
        JsonLdMulti::setType('Article');

        JsonLdMulti::addImage([ $products->image[0], 'size' => 300]);
        return view('guest.layouts.main',['meta'=>false,'title'=>$products->product_name]);
    }
    public function indexCategory()
    {
        $title="e-Gate | Danh mục sản phẩm";
        $des="Các sản phẩm e-Gate, e-Timber gỗ tự nhiên ngoài trời, e-Solar đèn năng lượng mặt trời, e-Woco";
        $img=url('assets/background/product_egate.png');

        SEOMeta::setDescription($des);
        SEOMeta::addMeta('article:section', 'Trang chủ', 'property');
        SEOMeta::setCanonical(url()->full());
        
        SEOTools::setCanonical(url()->full());
        SEOTools::setDescription($des);
        SEOTools::opengraph()->setUrl(url()->full());
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage($img);

        OpenGraph::setDescription($des);
        OpenGraph::setTitle($title);
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('locale','vi_VN');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('title', $title);
        OpenGraph::addProperty('site_name',$title);
        OpenGraph::addImage([$img, 'size' => 300]);
        OpenGraph::addImage(['alt'=>$img]);
        OpenGraph::addImage(['type'=>"image/png"]);

        TwitterCard::addValue("card", $img);
        TwitterCard::addValue("title", $title);
        TwitterCard::addValue("description", $des);
        TwitterCard::addValue("image",$img);

        JsonLd::setTitle($title);
        JsonLd::setDescription($des);
        JsonLd::setType('Article');
        JsonLd::addImage($img);

        JsonLdMulti::setTitle($title);
        JsonLdMulti::setDescription($des);
        JsonLdMulti::addImage([ $img, 'size' => 300]);
        JsonLdMulti::setType('Article');

        return view('guest.layouts.main',["meta"=>true,'title'=>$title]);
    }

    public function getCategory($slug)
    {
        if($slug == "e-gate"){
            $title="e-Gate | Danh mục sản phẩm e-Gate";
            $des="e-Gate Box thông minh tiện ích cho Người mua hàng Online được tích hợp để sử dụng với mọi nhu cầu giao hàng không chạm An toàn - Tiện lợi - Chính xác";
            $img=url('assets/background/product_egate.png');
        }else if($slug == "e-timber"){
            $title="e-Timber | Danh mục sản phẩm e-Timber";
            $des="e-Timber ứng dụng gỗ tự nhiên ngoài trời";
            $img="https://e-timber.com.vn/wp-content/uploads/2022/05/BANNER-WEBSITE-1-min-3.png";
        }else if($slug == "e-solar"){
            $title="e-Solar | Danh mục sản phẩm e-Solar";
            $des="e-Solar đèn năng lượng mặt trời";
            $img="https://files.e-gate.vn/images/A1-Li-120W_egate.jpg";
        }else if($slug == "e-woco"){
            $title="e-Woco | Danh mục sản phẩm e-Woco";
            $des="sản phẩm e-Woco";
            $img=url('assets/background/e-woco-product.jpg');
        }else {
            return redirect()->route('guest.home');
        }
        // SEOMeta::setTitle($title);
        SEOMeta::setDescription($des);
        SEOMeta::addMeta('article:section', 'Trang chủ', 'property');
        SEOMeta::setCanonical(url()->full());
        
        SEOTools::setCanonical(url()->full());
        // SEOTools::setTitle('Home');
        SEOTools::setDescription($des);
        SEOTools::opengraph()->setUrl(url()->full());
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage($img);

        OpenGraph::setDescription($des);
        OpenGraph::setTitle($title);
        OpenGraph::setUrl(url()->full());
        OpenGraph::addProperty('locale','vi_VN');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('title', $title);
        OpenGraph::addProperty('site_name',$title);
        OpenGraph::addImage([$img, 'size' => 300]);
        OpenGraph::addImage(['alt'=>$img]);
        OpenGraph::addImage(['type'=>"image/png"]);

        TwitterCard::addValue("card", $img);
        TwitterCard::addValue("title", $title);
        TwitterCard::addValue("description", $des);
        TwitterCard::addValue("image",$img);

        JsonLd::setTitle($title);
        JsonLd::setDescription($des);
        JsonLd::setType('Article');
        JsonLd::addImage($img);

        JsonLdMulti::setTitle($title);
        JsonLdMulti::setDescription($des);
        JsonLdMulti::addImage([ $img, 'size' => 300]);
        JsonLdMulti::setType('Article');

        return view('guest.layouts.main',["meta"=>true,'title'=>$title]);
    }
}

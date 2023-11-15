<?php

namespace App\Http\Controllers\Guest;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;

class HomeController extends Controller
{
    use SEOToolsTrait;
    public function index(){        
        return view('guest.pages.home.home');
    }
}

<?php
use App\Service;
use App\Page;
function getService(){
    return Service::get();
}
function getPage(){
    return Page::get();
}

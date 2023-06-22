<?php
use Illuminate\Http\Request;
function route_admin() {
    if(Schema::hasTable('settings')){
        $data_route_admin = \App\Models\Settings::find(1);
        $route_admin = $data_route_admin->route_admin;
    }else{
        $route_admin = null;
    }
    return $route_admin;
}
function route_login() {
    if(Schema::hasTable('settings')){
        $data_route_login = \App\Models\Settings::find(1);
        $route_login = $data_route_login->route_login;
    }else {
        $route_login = null;
    }
    return $route_login;
}
function removeTagScript($str)
{
    $pattern = '/(script.*?(?:\/|&#47;|&#x0002F;)script)/ius';
    $replace = preg_replace($pattern, '', $str);
    return ($replace !== null)? $replace : $str;
}
function editorEmpty($text){
    if($text == ""){
        return true;
    }
    return false;
}
function summaryText($text){
    $your_desired_width = 180;
    if (strlen($text) > $your_desired_width)
    {
    $text = wordwrap($text, 180);
    $i = strpos($text, "\n");
    if ($i) {
        $text = substr($text, 0, $i);
    }
    }
    return $text."...";
}
function settings()
{
    return \App\Models\Settings::find(1);
}
function fetchCategories(){
    return \App\Models\CategoryNews::whereNull('category_id')->with('childrenCategories')->get();

}
function fecthNews(){
    return \App\Models\News::skip(0)->take(3)->inRandomOrder()->get();
}
function fetchPage(){
    return \App\Models\Page::get();
}
function countNews()
{
    return \App\Models\News::count();
}
function countContact()
{
    return \App\Models\Contact::count();
}
function countCategories($id){
    return \App\Models\News::where('category_id','=',$id)->count();
}
function convert_vi_to_en($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
    $str = preg_replace("/(đ)/", "d", $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
    $str = preg_replace("/(Đ)/", "D", $str);
    //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
    return $str;
}
function change_to_slug($str) {
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
}
function fixDate($date){
    return \Carbon\Carbon::createFromTimestamp(strtotime($date))->format('d-m-Y');
}
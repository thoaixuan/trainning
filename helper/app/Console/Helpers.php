<?php
function setting()
{
    return \App\Models\Settings::find(1);
}
function route_admin() {
    $data_route_admin = \App\Models\Settings::find(1);
    $route_admin = $data_route_admin->route_admin;
    return $route_admin;
}
function route_login() {
    $data_route_login = \App\Models\Settings::find(1);
    $route_login = $data_route_login->route_login;
    return $route_login;
}
function getConfigMail()
{
    return \App\Models\Settings::find(1);
}
function fetchCategory()
{
    return \App\Models\HomeCategory::get();
}
function fetchQuestion()
{
    return \App\Models\HomeQuestion::get();
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
function removeTagScript($str)
{
    $pattern = '/(script.*?(?:\/|&#47;|&#x0002F;)script)/ius';
    $replace = preg_replace($pattern, '', $str);
    return ($replace !== null)? $replace : $str;
}
function success($data=null,$msg=null)
{
    $row = new \stdClass;
    $row->statusBoolean=true;
    $row->status="success";
    $row->msg="Thành công";
    $row->data = [];
    if(gettype ($data)=='string'){
        $row->msg = $data;
    }else{
        $row->data=$data;
    }
    if($msg){
        $row->msg = $msg;
    }
    return response()->json($row, 200);
}
function error($data=null,$msg=null)
{
    $row = new \stdClass;
    $row->statusBoolean=false;
    $row->status="error";
    $row->msg="Không thành công";
    $row->data = [];
    if(gettype($data)=='string'){
        $row->msg = $data;
    }else{
        $row->data=$data;
    }
    if($msg){
        $row->msg = $msg;
    }
    return response()->json($row, 200);
}
function fixDate($date){
    return \Carbon\Carbon::createFromTimestamp(strtotime($date))->format('d-m-Y');
}
<?php
use GuzzleHttp\Client;
function base_urlApi()
{

   return "https://sys-api.e-gate.vn";
}
function setting()
{
    $client = new Client();
    $response = $client->request('GET', base_urlApi().'/api/mobile/setting/byKey?fields=app_logo,GOOGLE_CLIENT_SECRET,GOOGLE_CLIENT_ID,_id,updatedAt',['verify' => false] );
    $res= $response->getBody();
    $rs =  json_decode($res);
    return $rs;

    // $rs=[

    //     'GOOGLE_CLIENT_ID' => "831855867209-jag74jjiefnpbn3ihnl7kobde333qqkt.apps.googleusercontent.com",
    //     'GOOGLE_CLIENT_SECRET'=>"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",
    //     'app_logo'=>"https://files.e-gate.vn/images/favicon.png",
    //     '_id'=>"616a13d5a8e6223f33cd7a36",
    //     'updatedAt'=>"2022-09-01T08:54:49.263Z"
    // ];
    // $object = json_decode(json_encode($rs), FALSE);
    // return $object;

}
function trimDes($text){
    $your_desired_width = 200;
    if (strlen($text) > $your_desired_width)
    {
    $text = wordwrap($text, 200);
    $i = strpos($text, "\n");
    if ($i) {
        $text = substr($text, 0, $i);
    }
    }
    return $text;
}
<?php
require 'common.inc.php';
set_time_limit(0);
const PROJECT_GUID = '7f5c2e94-0b08-e911-8db2-c81f66ed8109';

  	$data_id = '46111681';
    $url = 'http://apis.ciliuti.com/ciliuti/content';
    $header = ["Content-type:application/x-www-form-urlencoded","Authorization: APIKEY 218BD1743C004F7585C6D28E18AC5B2D"];
    $data['data_id'] = $data_id;
    $data['project_guid'] = PROJECT_GUID;
    $result = json_decode(doCurlPostRequest($url,$header,http_build_query($data)),true);
    if(!$result){
        return ['status'=>0,'msg'=>'接口请求失败!'];
    }
  
    if(isset($result['errcode']) && $result['errcode'] == 0){
        $content = $result['data'][0]['content'];
       echo $content;
    }



function doCurlPostRequest($url,$header,$data){

    $ch = curl_init();

    /*请求地址*/

    curl_setopt($ch, CURLOPT_URL, $url);

    /*以CURL方式设置http的请求头*/

    curl_setopt($ch, CURLOPT_HTTPHEADER,$header);

    /*文件流形式*/

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    /*发送一个常规的Post请求*/

    curl_setopt($ch, CURLOPT_POST, 1);

    /*Post提交的数据包*/

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    return curl_exec($ch);
}
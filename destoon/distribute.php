<?php
require 'common.inc.php';
set_time_limit(0);
const PROJECT_GUID = '7f5c2e94-0b08-e911-8db2-c81f66ed8109';
const LEVEL = '9';
const STATUS = '3';

$sqlk = "catid,title,tag,keyword,author,copyfrom,fromurl,addtime,subtitle,username,status,level";
$addtime = time();


$res = $db->query("SELECT * from `b2b_warehouse`");
$data = [];
while($u = $db->fetch_array($res)) {
    $data[] = $u;
}
if(empty($data)){
    echo "暂无可采数据";exit;
}
$cid_table = DT_PRE.'category';
$cidRes = $db->query("SELECT `catid` FROM {$cid_table} WHERE moduleid = 21");
$catid = [];
while($r = $db->fetch_array($cidRes)) {
    $catid[] = $r;
}

foreach ($data as $key => $val){
  	$content = to_get_content($val['data_id']); 
    if(empty($content) === false){
      	$sqlv = "'".$catid[array_rand($catid)]['catid']."','".$val['title']."','".$val['keyword']."','".$val['keyword']."','".$val['author_name']."','".$val['platform_name']."','".$val['url']."','".$addtime."','','','".STATUS."','".LEVEL."'";
    	DB::query("INSERT INTO `b2b_article_21` ($sqlk) VALUES ($sqlv)");
   		$itemid = DB::insert_id();
   
    	$linkurl = "show.php?itemid=".$itemid;
   		DB::query("INSERT INTO `b2b_article_data_21` (itemid,content) VALUES ('$itemid', '$content')");
    	DB::query("UPDATE `b2b_article_21` SET `linkurl` = '".$linkurl."' WHERE itemid='".$itemid."'");

   		$db->query("DELETE FROM `b2b_warehouse` WHERE `data_id`=".$val['data_id']);
      	echo $itemid."-发布成功</br>";
    }
}

//获取单条数据内容
function to_get_content($data_id){
    $url = 'http://apis.ciliuti.com/ciliuti/content';
    $header = ["Content-type:application/x-www-form-urlencoded","Authorization: APIKEY 218BD1743C004F7585C6D28E18AC5B2D"];
    $data['data_id'] = $data_id;
    $data['project_guid'] = PROJECT_GUID;
    $result = json_decode(doCurlPostRequest($url,$header,http_build_query($data)),true);
    if(!$result){
        return ['status'=>0,'msg'=>'接口请求失败!'];
    }
    // print_r($result);exit;
    if(isset($result['errcode']) && $result['errcode'] == 0){
        $content = $result['data'][0]['content'];
       return $content;
    }
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


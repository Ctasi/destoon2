<?php
require 'common.inc.php';
set_time_limit(0);

header("Content-type:text/html; charset=utf-8");

const PROJECT_GUID = '7f5c2e94-0b08-e911-8db2-c81f66ed8109';
/*参数1:请求的URL;参数2:以CURL方式设置http的请求头;参数3:要提交的数据包*/

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

function get_title_list($keyword,$page)
{
    $url = 'http://apis.ciliuti.com/ciliuti/title';
    $header = ["Content-type:application/x-www-form-urlencoded","Authorization: APIKEY E6F4DC8BAFB34C5684792510A7FB5590"];

    $data['page_index'] = $page;
    /*要提交的数据包*/
    $data['project_guid'] = PROJECT_GUID;
    $data['related_words'] =$keyword;

    $result_info = json_decode(doCurlPostRequest($url,$header,http_build_query($data)),true);
    if(!$result_info){
        echo '接口请求失败！';exit;
    }
    return $result_info;
}

function to_export_title($keyword_id,$keyword,$page,$num,$data=[])
{
    $result = get_title_list($keyword,$page);
    if(isset($result['errcode']) && $result['errcode'] == 0){
        foreach ($result['data']['data'] as $key=>$val){
            if(mb_strlen($val['title']) <= 40){
            	$publish_time = date('Y-m-d H:i:s',strtotime($val['publish_time']));
            	$collect_time = date('Y-m-d H:i:s',strtotime($val['add_time']));
            	$add_time = date('Y-m-d H:i:s',time());
            	$data['sql'][]= "('$val[data_id]','$val[title]','$keyword','$keyword_id','$val[url]','$publish_time','$collect_time','$add_time','$val[author_name]','$val[platform_name]')";
            }
        }
        $num = $num+count($result['data']['data']);
        $data['keywords']['num'] = $num;
        $data['keywords']['current_page'] = $result['data']['page_index'];
        $data['keywords']['page_num'] = $result['data']['page_size'];
        $data['keywords']['total'] = $result['data']['total'];
        if($page < $result['data']['page_count']){
            $page++;
            return to_export_title($keyword_id,$keyword,$page,$num,$data);
        }else{
            return $data;
        }
    }else{
        //print_r($result);exit;
        echo "接口请求错误！$result[errmsg]，关键词：".$keyword.'<br>';
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

$result = $db->query("SELECT * FROM `{$DT_PRE}ware_keyword` WHERE `status`=1 ORDER BY `order` ASC ,`id` ASC LIMIT 0,5");

while($r = $db->fetch_array($result)) {
    $data = to_export_title($r['id'],$r['keyword'],$r['current_page'],$r['num']);
    $order = $r['order']+1;
  	$db->query("UPDATE `{$DT_PRE}ware_keyword` SET `order` = $order WHERE `id`=$r[id]");
    if(isset($data['sql']) && empty($data['sql']) === false){
        $keywords = $data['keywords'];
        $keywords_sql = "UPDATE `{$DT_PRE}ware_keyword` SET `num`=$keywords[num],`current_page`= $keywords[current_page],`page_num`= $keywords[page_num],`total`= $keywords[total]WHERE `id`=$r[id]";
        $db->query($keywords_sql);
        $sql_str = implode(',',$data['sql']);
        $sql = "INSERT INTO `{$DT_PRE}warehouse` (`data_id`,`title`,`keyword`,`keyword_id`,`url`,`publish_time`,`collect_time`,`add_time`,`author_name`,`platform_name`) VALUES $sql_str  ON duplicate KEY UPDATE data_id = data_id ;";
        $db->query($sql);
        echo '本次采集数据已全部入库！关键词：'.$r['keyword'].'<br>';
        sleep(1);
    }
}







exit;


?>
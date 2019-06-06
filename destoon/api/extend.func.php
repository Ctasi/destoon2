<?php
defined('IN_DESTOON') or exit('Access Denied');
header("Content-Type: text/html;charset=utf-8");
//签到时间函数
function timetoday($time = 0, $type = 6) {
	if(!$time) $time = $GLOBALS['DT_TIME'];
	$types = array('Y-m-d', 'Y', 'm-d', 'Y-m-d', 'm-d H:i', 'Y-m-d H:i', 'Y-m-d H:i:s' ,'m' ,'d' ,'M','l');
	//m月份 d日期 M月份英文缩写 l星期缩写
	if(isset($types[$type])) $type = $types[$type];
	$date = '';
	if($time > 2147212800) {		
		if(class_exists('DateTime')) {
			$D = new DateTime('@'.($time - 3600 * intval(str_replace('Etc/GMT', '', $GLOBALS['CFG']['timezone']))));
			$date = $D->format($type);
		}
	}
	return $date ? $date : date($type, $time);
}
//签到天数函数
function getMonth($date){
     $firstday = date("Y-m-01",$date);
     $lastday = date("Y-m-d",strtotime("$firstday +1 month -1 day"));
	 $firstday = strtotime($firstday.' 0:0:0');
	 $lastday = strtotime($lastday.' 0:0:0');
	 $getMonth = array($firstday,$lastday);
     return $getMonth;
 }
//用户名、邮箱、手机账号中间字符串以*隐藏 
function hideStar($str) { 
    if (strpos($str, '@')) { 
        $email_array = explode("@", $str); 
        $prevfix = (strlen($email_array[0]) < 4) ? "" : substr($str, 0, 3); //邮箱前缀 
        $count = 0; 
        $str = preg_replace('/([\d\w+_-]{0,100})@/', '***@', $str, -1, $count, 'utf-8'); 
        $rs = $prevfix . $str; 
    } else { 
        $pattern = '/(1[3458]{1}[0-9])[0-9]{4}([0-9]{4})/'; 
        if (preg_match($pattern, $str)) { 
            $rs = preg_replace($pattern, '$1****$2', $str); //手机号
        } else { 
            $rs = substr($str, 0, 4) . "****" . substr($str, -1);  //用户名
        } 
    } 
    return $rs; 
}
//公司名称中间字符串以*隐藏
function xh_ycname($com_name){
    $strlen     = mb_strlen($com_name, 'utf-8');
    $firstStr     = mb_substr($com_name, 0, 1, 'utf-8');
    $lastStr     = mb_substr($com_name, -1, 1, 'utf-8');
    return $strlen == 1 ? $firstStr . str_repeat('*', mb_strlen($com_name, 'utf-8') - 1) : $firstStr . str_repeat("*", $strlen - 1) . $lastStr;
}

//buy-采购剩余时间
function dtime($totime){
	global $DT_TIME;
	$dtime = $totime - $DT_TIME;
    $dtime = dround($dtime/60/60/24, 0, true);
	return $dtime;
}
//VIP
//function get_vip($username) {
    //global $db;
    //$r = $db->get_one("SELECt vip FROM {$db->pre}company WHERe username='$username'");
    //return $r[vip];
//}
//获取单个信息的评论数
function get_numcomment($mid,$itemid) {
    global $db;
    $nums = $db->get_one("SELECt COUNT(*) AS num FROM {$db->pre}comment WHERe item_mid='$mid' and item_id='$itemid'");
    return $nums['num'] ;
}
//信息被收藏数
function xh_favorite($title){
    global $db;
    $nums = $db->get_one("SELECt COUNT(*) AS num FROM {$db->pre}favorite WHERe title='$title'");
    return $nums['num'] ;
}
//多少时间以前-1
function format_date($time){
    $t=time()-$time;
    $f=array(
        '86400'=>'天',
        '3600'=>'小时',
        '60'=>'分钟',
        '1'=>'秒'
    );
    foreach ($f as $k=>$v)    {
        if (0 !=$c=floor($t/(int)$k)) {
            return $c.$v.'前';
        }
    }
};
//任意页面显示信息该属分类名
function cat_name($catid) {
    global $db;
    $catid = intval($catid);
    $catname = '';
    $r = $db->get_one("SELECt catname FROM {$db->pre}category WHERe catid=$catid");
    $catname = $r['catname'];
    return $catname;
}
//任意页面显示公司该属分类名
function getcat($catid) {
   global $db;
   $catids=explode(',',$catid);
   $catid=$catids[1];
   $r=$db->get_one("select catname from {$db->pre}category where catid=".$catid);
   $catname=$r['catname'];
   return $catname;
}
//任意页面显示地区
function ar_name($areaid) {
    global $db;
    $areaid = intval($areaid);
    $areaname = '';
    $r = $db->get_one("SELECt areaname FROM {$db->pre}area WHERe areaid=$areaid");
    $areaname = $r['areaname'];
    return $areaname;
}
//任意页面显示会员组名
function group_name($groupid) {
    global $db;
    $groupid = intval($groupid);
    $groupname = '';
    $r = $db->get_one("SELECt groupname FROM {$db->pre}member_group WHERe groupid=$groupid");
    $groupname = $r['groupname'];
return $groupname;
}
//新分类排列
function current_catid($catid, $moduleid, $level = -1) {
    global $db;
    $condition = $catid ? "parentid in($catid)" : "moduleid=$moduleid AND parentid=0";
    if($level >= 0) $condition .= " AND level=$level";
    $cat = array();
    $result = $db->query("selec catid,catname,child,style,linkurl,item from {$db->pre}category wher $condition ORDER BY listorder,catid ASC", 'CACHE');
    while($r = $db->fetch_array($result)) {
        $cat[] = $r;
    }
    return $cat;
}

//任意页面显示分类描述
function cat_description($catid){
global $db;
$catid = intval($catid);
$seo_description = '';
    $r = $db->get_one("SELECt seo_description FROM {$db->pre}category WHERe catid=$catid");
    $seo_description = $r['seo_description'];
return $seo_description;
}

//获取月份
function getmonths($sign="1"){  
    //得到系统的年月  
    $tmp_date=date("n");  
    //切割出年份  
    $tmp_year=substr($tmp_date,0,4);  
    //切割出月份  
    $tmp_mon =substr($tmp_date,4,2);  
    $tmp_nextmonth=mktime(0,0,0,$tmp_mon+1,1,$tmp_year);  
    $tmp_forwardmonth=mktime(0,0,0,$tmp_mon-1,1,$tmp_year);  
    if($sign==0){  
        //得到当前月的下一个月   
        return $fm_next_month=date("n",$tmp_nextmonth);          
    }else{  
        //得到当前月的上一个月   
        return $fm_forward_month=date("n",$tmp_forwardmonth);           
    }  
}  
#Your Functions
?>
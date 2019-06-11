<?php
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
if($DT_PC) {
	if($MOD['index_html']) {	
		$html_file = DT_ROOT.'/'.$MOD['moduledir'].'/'.$DT['index'].'.'.$DT['file_ext'];
		if(!is_file($html_file)) tohtml('index', $module);
		if(is_file($html_file)) exit(include($html_file));
	}
	if(!check_group($_groupid, $MOD['group_index'])) include load('403.inc');
	$maincat = $childcat = get_maincat(0, $moduleid, 1);
	$destoon_task = "moduleid=$moduleid&html=index";
	if($EXT['mobile_enable']) $head_mobile = $MOD['mobile'].($page > 1 ? 'index.php?page='.$page : '');
} else {
	$condition = "status=3";
	if($cityid) {
		$areaid = $cityid;
		$ARE = get_area($areaid);
		$condition .= $ARE['child'] ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
	}
	$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $condition", 'CACHE');
	$items = $r['num'];
	$pages = mobile_pages($items, $page, $pagesize);
	$lists = array();
	if($items) {
		$order = $MOD['order'];
		$time = strpos($MOD['order'], 'add') !== false ? 'addtime' : 'edittime';
		$result = $db->query("SELECT ".$MOD['fields']." FROM {$table} WHERE $condition ORDER BY $order LIMIT $offset,$pagesize");
		while($r = $db->fetch_array($result)) {
			$r['title'] = str_replace('style="color:', 'style="font-size:16px;color:', set_style($r['title'], $r['style']));
			if(!$r['islink']) $r['linkurl'] = $MOD['mobile'].$r['linkurl'];
			$r['date'] = timetodate($r[$time], 3);
			$lists[] = $r;
		}
		$db->free_result($result);
	}
	$back_link = DT_MOB.'channel.php';
	$head_name = $MOD['name'];
}
$com_table = 'b2b_article_21';
$addtime = 'addtime';
if ($page = $_GET['page'] != null){
    $page = $_GET['page'];
}else {
    $page = 1;
}
$com_news = $db->query("SELECT * FROM {$com_table} ORDER BY {$addtime} desc  limit {$page} , 10");
$com_sum = $db->query("SELECT * FROM {$com_table} ORDER BY {$addtime} desc ");
while($r = $db->fetch_array($com_news)){
    $news[] = $r;
}
while($a = $db->fetch_array($com_sum)){
    $newsum[] = $a;
}
$sum = count($newsum);
$n = 10;
$num =  (ceil($sum / $n));
if ($page >= $num-10) {

    for ($i=1;$i <= $num;$i++){
        $arr[] = $i;
    }
    $arrs = array_slice($arr,$page-1 , $num);
    $arrs[] = '....';
    $arrs[] = $num-1;

    $arrs[] = $num;
    if ($page == $num - 1) {
    $page = $num-1;
    }
}else {
    for ($i=$page;$i <= $num;$i++){
        $arr[] = $i;
    }
    $arrs = array_slice($arr,0 , 8);
    $arrs[] = '....';
    $arrs[] = $num-1;
    $arrs[] = $num;
}
$cate_table = 'b2b_category';
$cate = $db->query("SELECT * FROM {$cate_table} where moduleid = 21");
while($c = $db->fetch_array($cate)){
    $cate_news[] = $c;
}

$seo_file = 'index';
include DT_ROOT.'/include/seo.inc.php';
include template($MOD['template_index'] ? $MOD['template_index'] : 'index', $module);
?>
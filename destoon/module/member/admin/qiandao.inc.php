<?php
defined('DT_ADMIN') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/qiandao.class.php';
$do = new qiandao();
$menus = array (
    array('签到管理', '?moduleid='.$moduleid.'&file='.$file),
);
if(in_array($action, array(''))) {
	$sfields = array('按条件', '时间', '收入', '会员名');
	$dfields = array('title', 'addtime', 'feeadd', 'username');
	$sorder  = array('结果排序方式', '添加时间降序', '添加时间升序');
	$dorder  = array('addtime DESC', 'addtime DESC', 'addtime ASC');
	(isset($username) && check_name($username)) or $username = '';
	$fromdate = isset($fromdate) ? $fromdate : '';
	$fromtime = is_date($fromdate) ? strtotime($fromdate.' 0:0:0') : 0;
	$todate = isset($todate) ? $todate : '';
	$totime = is_date($todate) ? strtotime($todate.' 23:59:59') : 0;

	isset($fields) && isset($dfields[$fields]) or $fields = 0;
	isset($order) && isset($dorder[$order]) or $order = 0;

	$fields_select = dselect($sfields, 'fields', '', $fields);
	$order_select  = dselect($sorder, 'order', '', $order);

	$condition = '1';
	if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
	if($fromtime) $condition .= " AND addtime>=$fromtime";
	if($totime) $condition .= " AND addtime<=$totime";
	if($username) $condition .= " AND username='$username'";
	if($itemid) $condition .= " AND itemid=$itemid";
	if($page > 1 && $sum) {
			$items = $sum;
		} else {
			$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $condition");
			$items = $r['num'];
		}
	$pages = pages($items, $page, $pagesize);
}
switch($action) {
	case 'delete':
		$itemid or msg('请选择');
		isset($recycle) ? $do->recycle($itemid) : $do->delete($itemid);
		dmsg('删除成功', $forward);
	break;
	default:
		$lists = $do->get_list('userid>0'.$condition, $dorder[$order]);
		$menuid = 1;
		include tpl('qiandao', $module);
	break;
}
?>
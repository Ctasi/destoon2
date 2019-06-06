<?php
/*
	[DESTOON B2B System] Copyright (c) 2008-2018 www.destoon.com
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_DESTOON') or exit('Access Denied');
$currency = $MOD['fee_currency'];
$fee_unit = $currency == 'money' ? $DT['money_unit'] : $DT['credit_unit'];
$fee_name = $currency == 'money' ? $DT['money_name'] : $DT['credit_name'];
if(check_group($_groupid, $MOD['group_contact'])) {
	if($fee) {
		$user_status = 4;
		$destoon_task = "moduleid=$moduleid&html=show&itemid=$itemid";
		$description = '';
	} else {
		$user_status = 3;
	}
} else {
	$user_status = $_userid ? 1 : 0;
	if($_username && $item['username'] == $_username) $user_status = 3;
}
if($module == 'know') {
	if($_username && $best && $_username == $best['username']) $user_status = 3;
}
$fee_back = $currency == 'money' ? dround($fee*intval($MOD['fee_back'])/100) : ceil($fee*intval($MOD['fee_back'])/100);
?>
<?php 
defined('IN_DESTOON') or exit('Access Denied');
$could_contact or dalert($L['msg_contact_deny'], 'goback');
$could_message = check_group($_groupid, $MOD['group_message']);
if($username == $_username || $domain) $could_message = true;
if($DT_PC) {
	//
} else {
	$head_name = $head_title;
}
$news_table = 'b2b_news';
$a = $db->query("SELECT * FROM {$news_table}");
foreach ($a as $value) {
    $newslist[] = $value;
}
include template('contact', $template);
?>
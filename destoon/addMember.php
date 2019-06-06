<?php
require 'common.inc.php';
include 'post.func.php';
set_time_limit(0);


$mysql_conf = array(
    'host'    => 'rm-2zei61792qwa1bka17o.mysql.rds.aliyuncs.com',
    'db'      => 'china_machine36',
    'db_user' => 'wtx',
    'db_pwd'  => 'Yzt477515',
);
$mysql_conn = mysql_connect($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
if (!$mysql_conn) {
    die("could not connect to the database:\n" . mysql_error());//诊断连接错误
}
mysql_query("set names 'utf8'");//编码转化
$select_db = mysql_select_db($mysql_conf['db']);
if (!$select_db) {
    die("could not connect to the db:\n" .  mysql_error());
}
$sql = "SELECT * FROM china_machine36.`yzt_config` as c inner join china_machine36.`yzt_admin` as a on c.admin_id = a.id limit 0,100";
//$sql = "SELECT * FROM china_machine36.`yzt_config` as c inner join china_machine36.`yzt_admin` as a on c.admin_id = a.id where c.id = '535'";
$res = mysql_query($sql);
if (!$res) {
    die("could get the res:\n" . mysql_error());
}

mysql_close($mysql_conn);
$A = []; 
while($r = $db->fetch_array($res)) {
    $A[] = $r;
}


$cid_table = DT_PRE.'category';
$cidRes = DB::query("SELECT `catid` FROM {$cid_table} WHERE moduleid = 4");
$catid = [];
while($u = DB::fetch_array($cidRes)) {
    $catid[] = $u;
}

//$member_sqlk = "username,passport,company,password,passsalt,payword,paysalt,message,online,avatar,gender,truename,mobile,qq,wxqr,admin,groupid,regid,areaid,sms,credit,money,deposit,edittime,regtime,logintime,send,vemail,vmobile,vtruename,vbank,vcompany,vtrade,support,inviter,note";
$member_sqlk = "username,passport,company,password,passsalt,paysalt,email,message,online,truename,mobile,qq,wxqr,groupid,regid,sms,edittime,regtime,logintime,support,inviter,note";
$misc_sqlk   = 'username,branch,reply,black';
$company_sqlk = "username,groupid,company,keyword,linkurl,thumb,catid,catids,type,mode,capital,regunit,size,regyear,business,telephone,address";
$pass        = "123456";
$online      = '1';
$groupid     = "6";
$regid       = "6";
$company_logo = "https://caigou.ctrl.com.cn/file/upload/201905/06/1538577036.jpg";
$type = ['个体经营','企业单位','事业单位或社会团体','其他'];
$mode = ['制造商','贸易商','服务商','其他机构'];
$regunit = "人民币";
$size = "100-499人";
foreach ($A as $key => $val){
    $passsalt    = random(8);
    $catid = $catid[array_rand($catid)]['catid'];
    $password    = create_password($pass, $passsalt);
    $linkurl = userurl($val['username']);
    $member_sqlv = "'".$val['username']."','".$val['username']."','".$val['company']."','".$password."','".$passsalt."','','".$val['email']."','".$val['amount']."','".$online."','".$val['linkman']."','".$val['linkphpne']."','".$val['qq']."','".$val['qrcode']."','".$groupid."','".$regid."','".$val['remaining']."','','".time()."','','".$val['support']."','".$val['agent']."','".$val['desc']."'";
    $misc_sqlv   = "'".$val['username']."','','',''";
    $company_sqlv = "'".$val['username']."','".$groupid."','".$val['company']."','".$val['company']."','".$linkurl."','".$company_logo."','".$catid."',',".$catid.",','".$type[array_rand($type)]."','".$mode[array_rand($mode)]."','".rand(1,9999)."','".$regunit."','".$size."','".rand(1980,2018)."','".$val['company']."','".$val['linkphone']."','".$val['address']."'";
    $res = DB::query("INSERT INTO b2b_member ($member_sqlk) VALUES ($member_sqlv)");
    $userid = DB::insert_id();
    if(!$userid) continue;
    DB::query("INSERT INTO `b2b_member_misc` (userid, $misc_sqlk) VALUES ($userid, $misc_sqlv)");
    DB::query("INSERT INTO `b2b_company` (userid, $company_sqlk) VALUES ($userid, $company_sqlv)");
    DB::query("INSERT INTO `b2b_company_data` (userid, content) VALUES ('$userid', '".$val['introduce']."')");
    echo $userid."-添加成功</br>";
}

function create_password($password, $salt) {
    return md5((is_md5($password) ? md5($password) : md5(md5($password))).$salt);
}


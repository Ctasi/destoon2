<?php 
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/include/module.func.php';
require DT_ROOT.'/module/'.$module.'/global.func.php';
$table = $DT_PRE.$module.'_'.$moduleid;
$table_data = $DT_PRE.$module.'_data_'.$moduleid;
$table_price = $DT_PRE.$module.'_price_'.$moduleid;
$table_product = $DT_PRE.$module.'_product_'.$moduleid;
?>
<?php defined('IN_DESTOON') or exit('Access Denied');?><?php
isset($typeid) or $typeid = 0;
$_file = $file;
if($file == 'mall') {
$_item = 'mall-'.$userid;
$_name = '商品分类';
} else if($file == 'news') {
$_item = 'news-'.$userid;
$_name = '新闻分类';
} else {
$_item = 'product-'.$userid;
$_name = '产品分类';
$_file = 'sell';
}
$_TYPE = get_type($_item);
$_TP = $_TYPE ? sort_type($_TYPE) : array();
?>
<div class="side_head"><div><span class="f_r"><a href="<?php echo userurl($username, 'file='.$_file, $domain);?>"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/image/more.gif" title="更多"/></a></span><strong><?php echo $_name;?></strong></div></div>
<div class="side_body">
<ul>
<?php if($_TYPE) { ?>
<li id="type_0"<?php if($typeid==0) { ?> class="f_b"<?php } ?>><a href="<?php echo userurl($username, 'file='.$_file, $domain);?>">全部分类</a></li>
<?php if(is_array($_TP['0'])) { foreach($_TP['0'] as $v0) { ?>
<li id="type_<?php echo $v0['typeid'];?>"<?php if($typeid==$v0['typeid']) { ?> class="f_b"<?php } ?>><a href="<?php echo userurl($username, 'file='.$_file.'&typeid='.$v0['typeid'], $domain);?>" title="<?php echo $v0['typename'];?>"><?php echo set_style($v0['typename'], $v0['style']);?></a></li>
<?php if(isset($_TP['1'][$v0['typeid']])) { ?>
<?php if(is_array($_TP['1'][$v0['typeid']])) { foreach($_TP['1'][$v0['typeid']] as $v1) { ?>
<li id="type_<?php echo $v1['typeid'];?>"<?php if($typeid==$v1['typeid']) { ?> class="f_b"<?php } ?>>|--<a href="<?php echo userurl($username, 'file='.$_file.'&typeid='.$v1['typeid'], $domain);?>" title="<?php echo $v1['typename'];?>"><?php echo set_style($v1['typename'], $v1['style']);?></a></li>
<?php } } ?>
<?php } ?>
<?php } } ?>
<?php } else { ?>
<li>暂无分类</li>
<?php } ?>
</ul>
</div>
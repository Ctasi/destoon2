<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($file != 'news') { ?>
<div class="side_head"><div><span class="f_r"><a href="<?php echo userurl($username, 'file=news', $domain);?>"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/image/more.gif" title="更多"/></a></span><strong><?php echo $side_name[$HS];?></strong></div></div>
<div class="side_body">
<?php $tags=tag("table=news&condition=status=3 and username='$username'&pagesize=".$side_num[$HS]."&order=addtime desc&template=null");?>
<ul>
<?php if($tags) { ?>
<?php if(is_array($tags)) { foreach($tags as $t) { ?>
<li><a href="<?php echo userurl($username, 'file=news&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?> (<?php echo timetodate($t['addtime'], 3);?>)"><?php echo $t['title'];?></a></li>
<?php } } ?>
<?php } else { ?>
<li>暂无新闻</li>
<?php } ?>
</ul>
</div>
<?php } ?>
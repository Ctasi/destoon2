<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="main_head"><div><span class="f_r"><a href="<?php echo userurl($username, 'file=mall', $domain);?>"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/image/more.gif" title="更多"/></a></span><strong><?php echo $main_name[$HM];?></strong></div></div>
<div class="main_body">
<?php $tags=tag("moduleid=16&condition=status>2 and username='$username'&pagesize=".$main_num[$HM]."&order=edittime desc&fields=itemid,title,linkurl,thumb,edittime,price&template=null");?>
<table cellpadding="10" cellspacing="1" width="100%">
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<?php if($i%4==0) { ?><tr align="center"><?php } ?>
<td valign="top" width="25%">
<div class="thumb">
<a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=mall&itemid='.$t['itemid'], $domain);?><?php } ?>"><img src="<?php echo $t['thumb'];?>" width="160" height="160" alt="<?php echo $t['alt'];?>"/></a>
<div><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=mall&itemid='.$t['itemid'], $domain);?><?php } ?>" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></div>
<span class="f_price"><?php echo $DT['money_sign'];?><?php echo $t['price'];?></span>
</div>
</td>
<?php if($i%4==3) { ?></tr><?php } ?>
<?php } } ?>
</table>
</div>
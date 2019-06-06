<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="main_head"><div><span class="f_r"><a href="<?php echo userurl($username, 'file=introduce', $domain);?>"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/image/more.gif" title="更多"/></a></span><strong><?php echo $main_name[$HM];?></strong></div></div>
<div class="main_body">
<div class="lh18 px14 pd10">
<?php if($video) { ?>
<?php echo load('player.js');?>
<div style="width:250px;height:210px;text-align:right;float:right;"><script type="text/javascript">document.write(player('<?php echo $video;?>',240,200,1));</script></div>
<?php } else { ?>
<img src="<?php echo $COM['thumb'];?>" align="right" style="margin:6px 0 6px 16px;padding:4px;border:#C0C0C0 1px solid;"/>
<?php } ?>
<?php echo $COM['intro'];?> [<a href="<?php echo userurl($username, 'file=introduce', $domain);?>" class="t">详细介绍</a>]
<div class="c_b"></div>
</div>
</div>
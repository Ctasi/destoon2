<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="side_head"><div><span class="f_r"><a href="<?php echo userurl($username, 'file='.$_file, $domain);?>"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/image/more.gif" title="更多"/></a></span><strong>公司新闻</strong></div></div>
<div class="side_body">
<ul>
<?php if(is_array($newslist)) { foreach($newslist as $v0) { ?>
<li id="type_<?php echo $v0['typeid'];?>"<?php if($typeid==$v0['typeid']) { ?> class="f_b"<?php } ?>><a href="<?php echo $v0['linkurl'];?>" title="<?php echo $v0['title'];?>"><?php echo $v0['title'];?></a></li>
<?php } } ?>
</ul>
</div>
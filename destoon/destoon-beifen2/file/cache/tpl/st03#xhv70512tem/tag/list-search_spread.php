<?php defined('IN_DESTOON') or exit('Access Denied');?><ul>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li title="搜索<?php echo $t[$key];?>次 约<?php echo $t['items'];?>条结果"><span class="f_r f_gray">&nbsp;<?php echo $MODULE[$t['moduleid']]['name'];?></span><a href="<?php echo rewrite('list.php?mid='.$t['moduleid'].'&kw='.urlencode($t['word']));?>"><?php echo $t['word'];?></a></li>
<?php } } ?>
</ul>
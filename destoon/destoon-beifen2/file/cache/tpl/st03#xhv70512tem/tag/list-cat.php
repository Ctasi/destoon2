<?php defined('IN_DESTOON') or exit('Access Denied');?><ul>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li><?php if($datetype) { ?><i><?php echo timetodate($t['addtime'], $datetype);?></i><?php } ?><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></li>
<?php if($cols && $i && $i%$cols==($cols-1)) { ?><li class="sp">&nbsp;</li><?php } ?>
<?php } } ?>
</ul>
<?php if($showpage && $pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
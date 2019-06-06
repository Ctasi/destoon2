<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $child = get_maincat($c['catid'], 5,1);?>
<?php if(is_array($child)) { foreach($child as $i => $c) { ?>
<?php if($i < 8) { ?>
<li>
<h3><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank" title="$c[catname]}" rel="nofollow"><strong><?php echo set_style($c['catname'], $c['style']);?></strong></a></h3>
<?php if($c['child']) { ?>
<?php $sub = get_maincat($c['catid'], 5, 1);?>
<p>
<?php if(is_array($sub)) { foreach($sub as $j => $s) { ?><?php if($j < 4) { ?> <a rel="nofollow" target="_blank" href="<?php echo $MODULE['5']['linkurl'];?><?php echo $s['linkurl'];?>" title="<?php echo $s['catname'];?>"><?php echo set_style($s['catname'], $s['style']);?></a> <?php } ?>
<?php } } ?>
</p>
<?php } ?>
</li>
<?php } ?>
<?php } } ?>
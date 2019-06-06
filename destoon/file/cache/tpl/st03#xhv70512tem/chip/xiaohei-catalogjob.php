<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $mid = $moduleid;?>
<?php $child = get_maincat(0, $mid, 1);?>
<?php if(is_array($child)) { foreach($child as $i => $c) { ?>
<?php if($i<12 && $c['child']) { ?>
<?php $sub = get_maincat($c['catid'], $mid, 1);?>
<li class=a<?php echo $i+1;?>>
<div class=tx><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>"><i class="level-icon icon<?php echo $i+1;?> f-left"></i><?php echo set_style($c['catname'], $c['style']);?></a> </div>
<?php include template('xiaohei-catalogjobmini', 'chip');?>
</li>
<?php } ?>
<?php } } ?>
<?php defined('IN_DESTOON') or exit('Access Denied');?><ul>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<?php $n=$i+1;?>
<li><?php if($key) { ?><span class="f_r"><?php echo $t[$key];?></span><?php } ?><?php if($n>3) { ?><i><?php echo $n;?></i><?php } else { ?><em><?php echo $n;?></em><?php } ?><a href="<?php echo $t['linkurl'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?><?php if($class) { ?> class="<?php echo $class;?>"<?php } ?> title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></li>
<?php } } ?>
</ul>
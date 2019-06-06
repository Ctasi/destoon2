<?php defined('IN_DESTOON') or exit('Access Denied');?><ul>
  <?php if(is_array($tags)) { foreach($tags as $t) { ?>
  <li><?php if($datetype) { ?><span class="f_r px11">&nbsp;<?php echo timetodate($t['addtime'], $datetype);?></span><?php } ?><a href="<?php echo $t['linkurl'];?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?> alt="<?php echo $t['alt'];?>" title="<?php echo $t['alt'];?>"><?php if($cname) { ?><span>[<?php echo $cname;?>] </span><?php } ?><?php echo $t['title'];?></a></li>
  <?php } } ?>
</ul>
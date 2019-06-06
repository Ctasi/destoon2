<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
 <li><?php if($datetype) { ?><span class="time">&nbsp;[<?php echo timetodate($t['addtime'], $datetype);?>]</span><?php } ?><a href="<?php echo $t['linkurl'];?>" class="w330" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a> </li>
  <?php } } ?>
<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $t) { ?>
  <li><span class="f_r gray"><?php echo area_pos($t['areaid'], '/', 1);?></span><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['company'];?></a></li>
  <?php } } ?>
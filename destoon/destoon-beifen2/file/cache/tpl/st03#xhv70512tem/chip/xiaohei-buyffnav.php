<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $child = get_maincat($catid, 6);?>
  <?php if(is_array($child)) { foreach($child as $i => $c) { ?>
  <?php if($i < 11) { ?>
  <li class="item <?php if($i==1) { ?>evenitem<?php } else if($i==3) { ?>evenitem<?php } else if($i==5) { ?>evenitem<?php } else if($i==7) { ?>evenitem<?php } else if($i==9) { ?>evenitem<?php } else if($i==11) { ?>evenitem<?php } ?>">
  <h3 class="itemHead"><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>"><?php echo $c['catname'];?></a></h3>
  </li>
<?php } ?>
  <?php } } ?>
<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
 <li class="l-img"><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"><img src="<?php echo $t['thumb'];?>" width="<?php echo $width;?>" height="<?php echo $height;?>" alt="<?php echo $t['alt'];?>"/></a></li>
 <li class="r-title"> <a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a> </li>
 <p><?php echo $t['introduce'];?><a href="<?php echo $t['linkurl'];?>" target="_blank" class="a_f60">[详细]</a></p>
<?php } } ?>
<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<div class="tag_sell_01  ">
<ul>
<li class="sell_01_img"><a href="<?php echo $t['linkurl'];?>" target="_blank" alt="<?php echo $t['alt'];?>" title="<?php echo $t['alt'];?>"><img src="<?php echo $t['thumb'];?>" width="<?php echo $width;?>" height="<?php echo $height;?>" alt="<?php echo $t['alt'];?>" onerror="this.src='<?php echo DT_SKIN;?>image/nopic200.gif'"/></a></li>
<li class="sell_01_title"><a href="<?php echo $t['linkurl'];?>" alt="<?php echo $t['alt'];?>" title="<?php echo $t['alt'];?>""><?php echo $t['title'];?></a></li>
<li>起订价：￥ <?php if($t['unit'] && $t['price']>0) { ?><span class="f_red"><?php echo $t['price'];?>/<?php echo $t['unit'];?></span><?php } else { ?><span class="f_gray">电议</span><?php } ?></li>
</ul></div>
<?php } } ?>
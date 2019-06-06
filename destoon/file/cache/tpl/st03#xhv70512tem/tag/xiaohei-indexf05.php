<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="tag_sell_01  ">
    <ul>
        <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
        <li class="sell_01_img" style="height:"><a href="<?php echo $t['linkurl'];?>" target="_blank" alt="<?php echo $t['alt'];?>" title="<?php echo $t['alt'];?>"><img src="<?php echo $t['thumb'];?>" width="<?php echo $width;?>" height="<?php echo $height;?>" alt="<?php echo $t['alt'];?>" onerror="this.src='<?php echo DT_SKIN;?>image/nopic200.gif'"/></a></li>
        <?php } } ?>
   </ul>
</div>
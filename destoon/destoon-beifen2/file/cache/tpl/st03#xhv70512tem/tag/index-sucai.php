<?php defined('IN_DESTOON') or exit('Access Denied');?>﻿ <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
  <?php if($i%3==0) { ?><div class="buy-list"><?php } ?>        
    <div class="<?php if($i%3==2) { ?>b_m0 <?php } ?>buy-item">        
    <p class="info-index"> <span class="fcolor">【采购】</span> <span class="title-index"><a href="<?php echo $t['linkurl'];?>" target="_blank" alt="<?php echo $t['alt'];?>" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></span> <b class="fcolor ml10"><?php echo group_name($t['groupid']);?>报价</b> </p>
     <div class="clearfix row"> <a href="<?php echo $t['linkurl'];?>" target="_blank" rel="nofollow" class="ksbtn" alt="<?php echo $t['alt'];?>" title="立即报价">立刻报价</a> <span class="lowestPriceWarp"> <span class="fl ">采购地区：</span> <span> <b><?php echo area_pos($t['areaid'], '', 1);?></b> </span> </span> <span class="lowestPriceWarp"> <span>采购数量：</span> <span> <b><?php if($t['amount']) { ?><?php echo $t['amount'];?><?php } else { ?>大量<?php } ?></b> </span> </span> <span class="lowestPriceWarp"> <span>截止日期：</span><b><?php echo timetodate($t['totime'], 3);?></b> </span> </div>         
      </div>           
<?php if($i%3==2) { ?></div><?php } ?>
<?php } } ?>
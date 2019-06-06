<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<?php $t['price'] = str_replace('.00', '', $t['price']);?>
<?php $t['marketprice'] = str_replace('.00', '', $t['marketprice']);?>
<div class="group-list-box">
<div><a href="<?php echo $t['linkurl'];?>" target="_blank" id="link_<?php echo $t['itemid'];?>"><img src="<?php echo $t['thumb'];?>" width="<?php echo $width;?>" height="<?php echo $height;?>" alt="<?php echo $t['alt'];?>"/></a></div>
<div class="group-list-price"><span class="f_r"><strong class="group-list-s3"><?php echo $t['orders'];?></strong>人购买</span>原价：<span class="group-list-s1"><?php echo $t['marketprice'];?></span>&nbsp;&nbsp;<span class="group-list-s2"><strong><?php echo $t['discount'];?></strong>折</span> </div>
<div class="group-list-join" onclick="Go(Dd('link_<?php echo $t['itemid'];?>').href);"><?php echo $DT['money_sign'];?><strong><?php echo $t['price'];?></strong></div>
<div class="group-list-title"><a href="<?php echo $t['linkurl'];?>" target="_blank">仅售<?php echo $t['price'];?>元！原价<?php echo $t['marketprice'];?>元的<?php echo $t['title'];?></a></div>
</div>
<?php } } ?>
<?php if($showpage && $pages) { ?></div><div class="pages"><?php echo $pages;?><?php } else { ?><span class="c_b"></span><?php } ?>
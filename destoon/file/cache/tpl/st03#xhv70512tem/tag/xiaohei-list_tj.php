<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $tags = array_slice($tags,1);?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
 <div class="small-goods">
 <!--span class="pictj<?php echo $i;?>"></span-->
 <a class="small-goods-img" href="<?php echo $t['linkurl'];?>">
 <img src="<?php if($t['thumb']) { ?><?php echo str_replace('thumb', 'middle', $t['thumb']);?><?php } else { ?><?php echo DT_SKIN;?>image/nopic200.gif<?php } ?>" width="220" height="220" alt="<?php echo $t['alt'];?>" onerror="this.src='<?php echo DT_SKIN;?>image/nopic200.gif'"/></a>
<div class="small-goods-info">
 <span class="price">
 <em>¥</em><?php if($t['unit'] && $t['price']>0) { ?><?php echo $t['price'];?><?php } else { ?>面议<?php } ?></span>
 <span class="number"><i id="hits"><?php echo $t['hits'];?></i>人浏览</span>
 </div>
  <h4> <spn class="small-goods-text"><a href="<?php echo $t['linkurl'];?>"><?php echo $t['title'];?></a></span></h4>
 <div class="small-goods-consult">
   <span>推荐</span>
<?php if($t['username'] && $DT['im_web']) { ?><?php echo im_web($t['username'].'&mid='.$moduleid.'&itemid='.$t['itemid']);?>&nbsp;<?php } ?>
<?php if($t['qq'] && $DT['im_qq']) { ?><?php echo im_qq($t['qq']);?>&nbsp;<?php } ?>
<?php if($t['ali'] && $DT['im_ali']) { ?><?php echo im_ali($t['ali']);?>&nbsp;<?php } ?> </div>
 </div>
<?php } } ?>
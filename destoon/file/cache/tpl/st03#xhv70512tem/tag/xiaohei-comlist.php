<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<div class="pcmp-itembox">
  <div class="infobox">
    <div class="maininfo clearfix">
      <div class="proinfo">
        <div class="proname"><a href="<?php echo $t['linkurl'];?>" target="_blank" class="gsm"><?php echo $t['company'];?></a> <?php if($t['validated']) { ?>&nbsp;<i title="已经通过企业信息认证" class="okvali"></i><?php } ?></div>
        <div class="comintro">
          <ul>
            <li class="pro">
              <label>主营产品:</label><?php echo dsubstr($t['business'],40,'...');?></li>
            <li class="bus">
              <label>经营模式:</label><?php echo $t['mode'];?>
              <label>会员类型:</label><i class="red"><?php echo group_name($t['groupid']);?></i></li>
            <li class="cont"><label>联系电话:</label>
          <?php echo $t['telephone'];?>&nbsp;<?php if($t['username'] && $DT['im_web']) { ?><?php echo im_web($t['username'].'&mid='.$moduleid.'&itemid='.$t['itemid']);?>&nbsp;<?php } ?>
          <?php if($t['qq'] && $DT['im_qq']) { ?><?php echo im_qq($t['qq']);?>&nbsp;<?php } ?>
          <?php if($t['wx'] && $DT['im_wx']) { ?><?php echo im_wx($t['wx']);?>&nbsp;<?php } ?></li>
            <li class="addr"><label>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址:</label><?php echo $t['address'];?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="picbox">
    <div class="maininfo clearfix">
      <div class="proshow">
        <ul>
          <?php $tags=tag("moduleid=5&length=20&condition=status=3 and username='".$t['username']."'&areaid=$cityid&pagesize=3&order=edittime desc&template=null");?> 
          <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
          <li>
            <dl>
              <dt><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php if($t['thumb']) { ?><?php echo str_replace('thumb', 'middle', $t['thumb']);?><?php } else { ?><?php echo DT_SKIN;?>image/nopic100.gif<?php } ?>" alt="<?php echo $t['alt'];?>" width="120" height="120" onerror="this.src='<?php echo DT_SKIN;?>image/nopic100.gif'"></a></dt>
              <dd><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo $t['title'];?></a></dd>
            </dl>
          </li>
          <?php } } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php } } ?>
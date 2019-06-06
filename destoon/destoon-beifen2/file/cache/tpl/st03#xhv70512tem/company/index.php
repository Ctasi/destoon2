<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array('index');?>
<?php include template('header');?> 
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>company-index.css">
<!--第一屏-->
<div class="wrapper clear">
  <div class="fl J-mainNav">
 
<?php $mid = 4;?>
<?php $c0 = get_maincat(0, $mid, 1);?>
<ul class="m_zl">
<?php if(is_array($c0)) { foreach($c0 as $k0 => $v0) { ?>
<?php if($k0 < 10 ) { ?>
<?php $c1 = get_maincat($v0['catid'], $mid);?>
<li class="fd-clr xhf<?php echo $k0+1;?>"><i class="i<?php echo $k0+1;?>"></i>
<a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $v0['linkurl'];?>" target="_blank"><strong><?php echo $v0['catname'];?></strong></a> 
 <?php if($v0['child']) { ?>
<div class="catidmi">
<div class="catidmi_f">
<?php if(is_array($c1)) { foreach($c1 as $k1 => $v1) { ?>
<dl>
<dt><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $v1['linkurl'];?>" target="_blank"><?php echo set_style($v1['catname'], $v1['style']);?></a></dt>
<?php if($v1['child']) { ?>
<?php $c2 = get_maincat($v1['catid'], $mid);?>
<dd>
<?php if(is_array($c2)) { foreach($c2 as $k2 => $v2) { ?>
<?php if($k2) { ?><em>|</em><?php } ?><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $v2['linkurl'];?>" target="_blank"><?php echo set_style($v2['catname'], $v2['style']);?></a>
<?php } } ?>
</dd>
<?php } ?>
</dl>
<?php } } ?>
</div>
</div>
<?php } ?>
</li>
<?php } ?>
<?php } } ?>
</div>
  <!--第一屏中间部分-->
  <div class="center">
    <div class="slide_box">
     <!--大幻灯748*285-->
     <?php echo ad(14);?>
    </div>
    <div class="prod-slider-wrap">
      <div class="prod-slider">
        <ul class="prod-slider-lst">
     <?php $tags=tag("table=ad&condition=status=3 and pid=156 and totime>$DT_TIME&areaid=$cityid&pagesize=4&order=listorder asc&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<li<?php if($k==3) { ?> class="notj"<?php } ?>><a href="<?php echo $t['url'];?>" title="<?php echo $t['image_alt'];?>" target="_blank"><img src="<?php echo $t['image_src'];?>" width="182" height="143" alt="<?php echo $t['image_alt'];?>" onerror="this.src='<?php echo DT_SKIN;?>image/nopic200.gif'"/></a></li>
<?php } } ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="rightbar mt15">
<!--登录状态-->
<div class="xhhyzt"><?php include template('line-right', 'chip');?></div>
<!--登录状态-->
    <div class="clear"> </div>
    <!--工具推广-->
    <div class="hisdq">
      <div class="ptit f12 fb">热门产业带</div>
      <ul>
        <li><a href="<?php echo $MODULE['4']['linkurl'];?>search.php?areaid=24" target="_blank">贵州</a></li>
        <li><a href="<?php echo $MODULE['4']['linkurl'];?>search.php?areaid=1" target="_blank">北京</a></li>
        <li><a href="<?php echo $MODULE['4']['linkurl'];?>search.php?areaid=3" target="_blank">天津</a></li>
        <li class="pnobor"><a href="<?php echo $MODULE['4']['linkurl'];?>search.php?areaid=5" target="_blank">河北</a></li>
        <li><a href="<?php echo $MODULE['4']['linkurl'];?>search.php?areaid=6" target="_blank">山西</a></li>
        <li><a href="<?php echo $MODULE['4']['linkurl'];?>search.php?areaid=8" target="_blank">辽宁</a></li>
        <li><a href="<?php echo $MODULE['4']['linkurl'];?>search.php?areaid=9" target="_blank">吉林</a></li>
        <li class="pnobor"><a href="<?php echo $MODULE['4']['linkurl'];?>search.php?areaid=2" target="_blank">上海</a></li>
      </ul>
    </div>
    <!-- 价格行情 --> 
    <!-- 推荐公司 -->
    <div class="price-sell">
      <div class="ptit f12 fb">最新加入供应商</div>
      <div class="trade">
        <div class="bd"> 
          <?php $tags=tag("moduleid=4&length=20&condition=groupid>5 and catids<>''&areaid=$cityid&pagesize=20&order=userid desc&template=null");?>
          <ul>
            <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
            <li><span class="fr gray"><?php echo area_pos($t['areaid'], '/', 2);?></span><a href="<?php echo $t['linkurl'];?>" target="_blank"  title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>"><?php echo $t['company'];?></a></li>
            <?php } } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--推荐公司--> 
</div>
<!--中间信息开始--> 
<!--工厂推荐-->
<div class="t1123-gold-supplier wrapper mt20 clear">
  <div class="t1123-ind-title1">
    <h2>金牌供应商</h2>
    <div> <span class="info-gs">包含三十三个省市自治区</span> <a href="<?php echo $MODULE['2']['linkurl'];?>grade.php" other="" title="我要加入金牌供应商" target="_blank">我要加入金牌供应商</a> </div>
  </div>
  <div class="t1123-gold-supplier-con">
    <ul class="t1123-ind-productpic-ul">
      <?php $tags=tag("moduleid=4&length=28&condition=groupid>5 and catids<>'' and level=1 and thumb<>''&areaid=$cityid&pagesize=6&order=vip desc,userid desc&template=null");?> 
      <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
      <li>
        <div class="t1123-ind-productpic-piccenter"> <span> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>"> <img src="<?php if($t['thumb']) { ?><?php echo str_replace('thumb', 'middle', $t['thumb']);?><?php } else { ?><?php echo DT_SKIN;?>image/nopic100.gif<?php } ?>" width="159" height="85" alt="<?php echo $t['alt'];?>" onerror="this.src='<?php echo DT_SKIN;?>image/nopic100.gif'"></a></span> </div>
        <div class="t1123-ind-productpic-company"> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>"><?php echo $t['company'];?></a></div>
        <p class="t1123-ind-productpic-info">主营: <?php echo dsubstr($t['business'], 22, '..');?></p>
        <div class="t1123-ind-productpic-more"> <a target="_blank" href="<?php echo $t['linkurl'];?>">进入该企业</a> </div>
      </li>
      <?php } } ?>
    </ul>
  </div>
</div>
<!--工厂推荐结束--> 
<!--楼层开始-->
<div class="wrapper clear">
  <?php $mid=4?>
  <?php $child = get_maincat(0,$mid,1);?>
  <?php if(is_array($child)) { foreach($child as $i => $c) { ?>
  <?php if($i < 9) { ?>
  <?php $catid=$c['catid'];?>
  <!--f开始-->
  <div class="t1124-ind-tab-supply floatL  mt20 clear">
    <div class="t1124-ind-tab-tit">
    <h2><em><?php echo $i+1;?>F</em><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><?php echo $c['catname'];?></a></h2>
    </div>
    <div class="t1124-ind-productpic-tab-con">
      <div class="t1124-ind-com-supply-tab1">
        <ul class="t1124-ind-tab-title floatL">
          <li class="t1124-ind-tab-title-first">
            <h3><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank">更多金牌供应商</a></h3>
            <p>最优质的商家！</p>
          </li>
          <?php $sub = get_maincat($c['catid'],$mid,1);?>
          <?php if(is_array($sub)) { foreach($sub as $j => $s) { ?>
          <?php if($j < 6) { ?>
          <li class="subli"><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $s['linkurl'];?>" target="_blank"><?php echo set_style($s['catname'], $s['style']);?></a></li>
          <?php } ?>
          <?php } } ?>
        </ul>
        <div class="t1124-ind-com-supply-tab1-con floatL">
          <div class="t1124-ind-productpic">
            <div class="t1124-ind-productpic-tit">
              <div class="t1124-ind-productpic-tit-l">
                <label>金牌供应商</label>
                包含三十三个省市自治区 </div>
              <div class="t1124-ind-productpic-tit-R floatR"> <a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank">更多<?php echo $c['catname'];?>市场信息</a></div>
            </div>
            <ul class="t1124-ind-productpic-ul">
              <?php $tags=tag("moduleid=$moduleid&catid=$catid&condition=groupid>5 and catids<>'' and level=1 and thumb<>''&areaid=$cityid&pagesize=10&order=vip desc,userid desc&template=null");?>
  <?php $tags=tag("moduleid=$moduleid&condition=groupid>5 and catids<>'' and level=1 and thumb<>''&areaid=$cityid&pagesize=10&order=vip desc,userid desc&template=null");?>
     <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
              <li>
                <div class="t1124-ind-productpic-piccenter"> <span> <a href="<?php echo $t['linkurl'];?>" target="_blank"  title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>"> <img src="<?php if($t['thumb']) { ?><?php echo str_replace('thumb', 'middle', $t['thumb']);?><?php } else { ?><?php echo DT_SKIN;?>image/nopic100.gif<?php } ?>" width="159" height="85" alt="<?php echo $t['alt'];?>" onerror="this.src='<?php echo DT_SKIN;?>image/nopic100.gif'"></a></span> </div>
<div class="t1124-ind-productpic-company"> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>"><?php echo $t['company'];?></a></div>
        <p class="t1124-ind-productpic-info">主营: <?php echo dsubstr($t['business'], 22, '..');?></p>
        <div class="t1124-ind-productpic-more"> <a target="_blank" href="<?php echo $t['linkurl'];?>">进入该企业</a> </div>
              </li>
              <?php } } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--f end--> 
  <?php } ?>
  <?php } } ?>
   </div>
<!--中间信息结束--> 
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/index.js"></script> 
<?php include template('footer');?>
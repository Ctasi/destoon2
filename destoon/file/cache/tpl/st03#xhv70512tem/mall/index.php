<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array('index');?>
<?php include template('header');?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>mall-index.css"/>
<!--第一屏-->
<div class="wrapper clear">
  <div class="fl J-mainNav">
      
      <?php $mid = 16;?>
      <?php $c0 = get_maincat(0, $mid, 1);?>
      <ul class="m_zl">
          <?php if(is_array($c0)) { foreach($c0 as $k0 => $v0) { ?>
          <?php if($k0 < 10 && $v0['child']) { ?>
          <?php $c1 = get_maincat($v0['catid'], $mid);?>
          <li class="fd-clr xhf<?php echo $k0+1;?>"><i class="i<?php echo $k0+1;?>"></i>
              <a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $v0['linkurl'];?>" target="_blank"><strong><?php echo $v0['catname'];?></strong></a>
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
          </li>
          <?php } ?>
          <?php } } ?>
  </div>
  <!--第一屏中间部分-->
  <div class="center">
    <div class="slide_box">
      <!--大幻灯748*285-->
     <?php echo ad(30);?>
    </div>
    <div class="prod-slider-wrap">
      <div class="prod-slider">
          <ul class="prod-slider-lst">
              <?php echo tag("moduleid=16&catid=$catid&condition=status=3 and thumb<>''&areaid=$cityid&pagesize=6&order=addtime desc&length=28&width=171&height=171&lazy=$lazy&template=xiaohei-indexf05");?>
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
    <div class="user-svr mt15"> <a target="_blank" rel="nofollow" href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_register'];?>" class="user-svr-basic"> <span class="free-tags">免费入驻<b></b></span> <i class="icon-home icon-basic"></i> <em>会员服务</em> </a> <a target="_blank" href="<?php echo $MODULE['2']['linkurl'];?>validate.php" rel="nofollow" class="user-svr-basic"> <i class="icon-home icon-cer"></i> <em>会员认证</em> </a> <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>spread/" rel="nofollow"> <i class="icon-home icon-rank"></i> <em>排名推广</em> </a> <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>ad/" rel="nofollow"> <i class="icon-home icon-advert"></i> <em>广告服务</em> </a> </div>
    <!-- 价格行情 --> 
    <!-- 推荐公司 -->
    <div class="price-sell mt10">
      <div class="ptit f12 fb">最新入驻店铺</div>
      <div class="trade">
        <div class="bd"> 
          <?php $tags=tag("moduleid=4&length=20&condition=groupid>5 and catids<>''&areaid=$cityid&pagesize=20&order=userid desc&template=null");?>
          <ul>
            <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
            <li><span class="fr gray"><?php echo area_pos($t['areaid'], '/', 2);?></span><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['company'];?></a></li>
            <?php } } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--推荐公司--> 
</div>
<!--中间信息开始-->
<div class="wrapper mod-floor mod-floor-2">
  <div class="content-sellindex">
    <div class="main-sellindex">
      <div class="header-sellindex ft-ms">
        <h2 class="title-sellindex">商品推荐</h2>
        <ul class="tabs">
          <span class="fl"> 热门市场：</span> 
          <?php $tags=tag("table=category&condition=moduleid=16 and parentid=0&pagesize=18&order=listorder,catid&template=null");?> 
          <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
          <li><a href="<?php echo $MODULE['16']['linkurl'];?><?php echo $t['linkurl'];?>"><?php echo $t['catname'];?></a></li>
          <?php } } ?>
        </ul>
      </div>
      <ul class="listm">
        <?php $tags=tag("moduleid=16&length=24&condition=status=3 and level=1&areaid=$cityid&pagesize=6&order=addtime desc&template=null");?> 
        <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
        <li class="offer <?php if($i==0) { ?> first<?php } ?>">
          <dl class="cell-thumbnail">
            <dt class="vertical-img"> <a href="<?php echo $t['linkurl'];?>" class="box-img" target="_blank"> <img alt="<?php echo $t['alt'];?>" src="<?php if($t['thumb']) { ?><?php echo str_replace('thumb', 'middle', $t['thumb']);?><?php } else { ?><?php echo DT_SKIN;?>image/nopic200.gif<?php } ?>" width="160" height="119"  border="0" onerror="this.src='<?php echo DT_SKIN;?>image/nopic200.gif'"/></a> </dt>
            <dd class="description"><a title="<?php echo $t['title'];?>" href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></dd>
            <dd class="price"><em><?php if($t['unit'] && $t['price']>0) { ?>抢购价： ￥<?php echo $t['price'];?>/<?php echo $t['unit'];?>
              <?php } else { ?> 面议<?php } ?> </em></dd>
            <dd class="company"><a href="<?php echo userurl($t['username']);?>" target="_blank" title="<?php echo $t['company'];?>"><?php echo $t['company'];?></a></dd>
          </dl>
        </li>
        <?php } } ?>
      </ul>
    </div>
  </div>
</div>
<!--楼层开始--> 
  <?php $mid=16?>
  <?php $child = get_maincat(0,$mid,1);?>
  <?php if(is_array($child)) { foreach($child as $i => $c) { ?>
  <?php if($i<5) { ?>
  <?php $kk=$i+1?>
<div class="wrapper mod-floor mod-floor-3">
<div class="shop">
  <div class="shop_top">
<h3><?php echo $kk;?>F <?php echo $c['catname'];?>市场</h3>
    <p><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>">选购优质商品</a></p>
    <div class="gengduo fr"><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>">更多<?php echo $c['catname'];?>商品</a></div>
      </div>
  <div class="shop_bm">
<div class="shopAdv fl"><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>"><img src="<?php echo DT_SKIN;?>image/mall/cp<?php echo $kk;?>.jpg"></a></div>
  <div class="product fr">
<ul id="product">
    <?php $tags=tag("moduleid=$moduleid&catid=".$c['catid']."&length=24&condition=status=3&areaid=$cityid&pagesize=4&order=addtime desc&template=null");?> 
          <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li class="">
        <div class="productImg"><table><tbody><tr><td>
        <a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"> <img alt="<?php echo $t['alt'];?>" src="<?php if($t['thumb']) { ?><?php echo str_replace('thumb', 'middle', $t['thumb']);?><?php } else { ?><?php echo DT_SKIN;?>image/nopic200.gif<?php } ?>" width="197" height="117"  border="0" onerror="this.src='<?php echo DT_SKIN;?>image/nopic200.gif'"/></a>
        </td></tr></tbody></table></div>
        <div class="productName">
        <a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo $t['title'];?></a>
        店铺：<?php echo $t['company'];?>
        </div>
        <dl>
        <dt><?php if($t['unit'] && $t['price']>0) { ?> <?php echo $DT['money_sign'];?>:<b><?php echo $t['price'];?></b>
              <?php } else { ?> <b>面议</b><?php } ?> </dt>
        <dd>人气<?php echo $t['hits'];?></dd>
        </dl>
        </li>
        <?php } } ?> 
        </ul>
        </div>
</div>
</div>
</div>
<?php } ?>
  <?php } } ?> 
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/index.js"></script> 
<?php include template('footer');?>
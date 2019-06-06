<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array('index');?>
<?php include template('header');?>
<!--第一屏-->
<div class="wrapper clear">
  <div class="fl J-mainNav">
     
<?php $mid = $moduleid;?>
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
     <?php echo ad(27);?>
    </div>
    <div class="prod-slider-wrap">
      <div class="prod-slider"> 
        <ul class="prod-slider-lst">
            <?php $tag=tag("moduleid=5&catid=$catid&condition=status=3 and level>0 and thumb<>''&areaid=$cityid&pagesize=6&order=addtime desc&length=28&width=171&height=171&lazy=$lazy&template=xiaohei-indexf05")?>
        </ul>
        
      </div>
    </div>
  </div>
  <div class="rightbar mt15">
   <!--登录状态-->
<div class="xhhyzt"><?php include template('line-right', 'chip');?></div>
    <div class="clear"> </div>
    <!--工具推广-->
    <div class="user-svr mt15"> <a target="_blank" rel="nofollow" href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_register'];?>" class="user-svr-basic"> <span class="free-tags">免费加入<b></b></span> <i class="icon-home icon-basic"></i> <em>会员服务</em> </a> <a target="_blank" href="<?php echo $MODULE['2']['linkurl'];?>validate.php" rel="nofollow" class="user-svr-basic"> <i class="icon-home icon-cer"></i> <em>会员认证</em> </a> <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>spread/" rel="nofollow"> <i class="icon-home icon-rank"></i> <em>排名推广</em> </a> <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>ad/" rel="nofollow"> <i class="icon-home icon-advert"></i> <em>广告服务</em> </a> </div>
    <!-- 价格行情 -->
     <!-- 推荐公司 -->
    <div class="price-sell mt10">
      <div class="ptit f12 fb">新入供应商</div>
      <div class="trade">
        <div class="bd"> 
          <?php $tags=tag("moduleid=4&length=20&condition=level=1 and catids<>''&areaid=$cityid&pagesize=20&order=userid desc&template=null");?>
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
              <h2 class="title-sellindex">特价推荐</h2>
              <ul class="tabs">
              <span class="fl">选择专场：</span>
              <?php $tags=tag("table=category&condition=moduleid=5 and parentid=0&pagesize=18&order=listorder,catid&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?><li><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $t['linkurl'];?>" ><?php echo $t['catname'];?></a></li><?php } } ?>
                            </ul>
            </div>
             <ul class="list">
       <?php $tags=tag("moduleid=5&length=24&condition=status=3 and level=1&areaid=$cityid&pagesize=6&order=addtime desc&template=null");?> 
            <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
    <li class="offer <?php if($i==0) { ?> first<?php } ?>">
       <dl class="cell-thumbnail">
       <dt class="vertical-img"> <a href="<?php echo $t['linkurl'];?>" class="box-img" target="_blank" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>"><img alt="<?php echo $t['alt'];?>" src="<?php if($t['thumb']) { ?><?php echo str_replace('thumb', 'middle', $t['thumb']);?><?php } else { ?><?php echo DT_SKIN;?>image/nopic200.gif<?php } ?>" width="160" height="119"  border="0" onerror="this.src='<?php echo DT_SKIN;?>image/nopic200.gif'"/></a> </dt>
        <dd class="description"><a title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>" href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></dd>
       <dd class="price"><em><?php if($t['unit'] && $t['price']>0) { ?> <?php echo $DT['money_sign'];?>:<?php echo $t['price'];?>/<?php echo $t['unit'];?>
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
 <!--楼层--> 
  <?php $mid=5?>
  <?php $child = get_maincat(0,$mid,1);?>
  <?php if(is_array($child)) { foreach($child as $i => $c) { ?>
  <?php if($i<10) { ?>
  <?php $kk=$i+1?>
<div class="wrapper mod-floor mod-floor-4">
        <div class="ff<?php echo $kk;?> content-sellindex clear">
          <div class="side-sellindex">
            <div class="title-sellindex">
              <h2><?php echo $kk;?>F <a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><?php echo $c['catname'];?>推荐</a></h2>
            </div>
            <div class="hot">
              <div class="hot-content">
                <ul class="price-list">
                 <?php $tags=tag("moduleid=5&catid=".$c['catid']."&condition=status=3 and level=1&length=26&areaid=$cityid&pagesize=10&order=addtime desc&template=null");?> 
                      <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                <li><em class="<?php if($i<3) { ?>top<?php } else { ?><?php } ?>"><?php echo $i+1;?></em><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>" target="_blank"><?php echo $t['title'];?></a></li>
                <?php } } ?>
        </ul>
              </div>
            </div>
          </div>
          <div class="main-sellindexf">
          <div class="header-sellindex ft-ms">
              <h2 class="title-sellindex">今日最新</h2>
               <ul class="tabs">
 <?php $sub = get_maincat($c['catid'],$mid,1);?>
<?php if(is_array($sub)) { foreach($sub as $j => $s) { ?>
<?php if($j<7) { ?>
<li><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $s['linkurl'];?>"><?php echo set_style($s['catname'], $s['style']);?></a></li>
<?php } ?>
<?php } } ?>
<span class="f_r"><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank">更多>></a></span>
 </ul>
            </div>
              <ul class="list">
               <?php $tags=tag("moduleid=5&catid=".$c['catid']."&condition=status=3&length=26&areaid=$cityid&pagesize=6&order=addtime desc&template=null");?> 
            <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
               <li class="offer">
                  <dl class="cell-thumbnail">
                    <dt class="vertical-img"> <a target="_blank" class="box-img" href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>" ><img src="<?php if($t['thumb']) { ?><?php echo str_replace('thumb', 'middle', $t['thumb']);?><?php } else { ?><?php echo DT_SKIN;?>image/nopic200.gif<?php } ?>" width="140" height="120" alt="<?php echo $t['alt'];?>"  onerror="this.src='<?php echo DT_SKIN;?>image/nopic100.gif'"></a> </dt>
                    <dd class="name"><a target="_blank" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>" href="<?php echo $t['linkurl'];?>"><?php echo $t['title'];?></a></dd>
                    <dd class="price">市场价：<?php if($t['unit'] && $t['price']>0) { ?><?php echo $DT['money_sign'];?>: <span class="f_red"><?php echo $t['price'];?></span>/<?php echo $t['unit'];?>
    <?php } else { ?> 面议<?php } ?> </dd>
                <dd class="description">有效期：<?php if($t['todate']) { ?><?php echo $t['todate'];?><?php } else { ?>长期有效<?php } ?><?php if($t['expired']) { ?> <span class="f_red">[已过期]</span><?php } ?></dd>
                    <dd class="about"><a alt="<?php echo $t['company'];?>" class="gray" href="<?php echo userurl($t['username']);?>" target="_blank"><?php echo $t['company'];?></a></dd>
                    <?php if(SELL_ORDER && $t['username'] && $t['price']>0 && $t['minamount']>0 && $t['amount']>0 && $t['unit']) { ?>
                    <dd class="buy"><a href="<?php echo $MODULE[$moduleid]['linkurl'];?><?php echo rewrite('buy.php?itemid='.$t['itemid']);?>" target="_blank" class="btns-gou">立即抢购</a> </dd>
                    <?php } else { ?>
                    <dd class="buy"><a href="<?php echo $MODULE[$moduleid]['linkurl'];?><?php echo rewrite('inquiry.php?itemid='.$t['itemid']);?>" target="_blank" class="btns">询问低价</a> </dd>
                    <?php } ?>
                    </dl>
                </li>
               <?php } } ?>
                                
              </ul>
          </div>
        </div>
      </div>
      <?php } ?>
  <?php } } ?>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/index.js"></script> 
<?php include template('footer');?>
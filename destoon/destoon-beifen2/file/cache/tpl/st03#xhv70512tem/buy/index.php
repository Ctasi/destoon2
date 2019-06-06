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
     <?php echo ad(148);?>
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
    <div class="user-svr mt15"> <a target="_blank" rel="nofollow" href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_register'];?>" class="user-svr-basic"> <span class="free-tags">免费加入<b></b></span> <i class="icon-home icon-basic"></i> <em>会员服务</em> </a> <a target="_blank" href="<?php echo $MODULE['2']['linkurl'];?>validate.php" rel="nofollow" class="user-svr-basic"> <i class="icon-home icon-cer"></i> <em>会员认证</em> </a> <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>spread/" rel="nofollow"> <i class="icon-home icon-rank"></i> <em>排名推广</em> </a> <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>ad/" rel="nofollow"> <i class="icon-home icon-advert"></i> <em>广告服务</em> </a> </div>
    <!-- 价格行情 --> 
    <!-- 推荐公司 -->
    <div class="price-sell mt10">
      <div class="ptit f12 fb">新入供应商</div>
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
        <h2 class="title-sellindex">产品推荐</h2>
        <ul class="tabs">
          <span class="fl"> 供应专场：</span> 
          <?php $tags=tag("table=category&condition=moduleid=5 and parentid=0&pagesize=18&order=listorder,catid&template=null");?> 
          <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
          <li><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $t['linkurl'];?>"><?php echo $t['catname'];?></a></li>
          <?php } } ?>
        </ul>
      </div>
      <ul class="list">
        <?php $tags=tag("moduleid=5&length=24&condition=status=3 and level=1&areaid=$cityid&pagesize=6&order=addtime desc&template=null");?> 
        <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
        <li class="offer <?php if($i==0) { ?> first<?php } ?>">
          <dl class="cell-thumbnail">
            <dt class="vertical-img"> <a href="<?php echo $t['linkurl'];?>" class="box-img" target="_blank" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>"> <img alt="<?php echo $t['alt'];?>" src="<?php if($t['thumb']) { ?><?php echo str_replace('thumb', 'middle', $t['thumb']);?><?php } else { ?><?php echo DT_SKIN;?>image/nopic200.gif<?php } ?>" width="160" height="119"  border="0" onerror="this.src='<?php echo DT_SKIN;?>image/nopic200.gif'"/></a> </dt>
            <dd class="description"><a title="<?php echo $t['title'];?>" href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></dd>
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
  <?php $mid=6?>
  <?php $child = get_maincat(0,$mid,1);?>
  <?php if(is_array($child)) { foreach($child as $i => $c) { ?>
  <?php $kk=$i+1?>
  <?php $catid=$c['catid']?>
<?php if($i<9) { ?>
<div class="wrapper mod-floor mod-floor-3">
  <div class="content-sellindex clearfix">
    <div class="side-sellindex">
      <div class="buyff<?php echo $kk;?> title-buyindex">
        <h2><?php echo $kk;?>F <a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>" title="<?php echo $c['catname'];?>" target="_blank"><?php echo $c['catname'];?></a></h2>
      </div>
      <ul class="category-buyindex">
        <?php include template('xiaohei-buyffnav', 'chip');?>
      </ul>
    </div>
    <div class="ff<?php echo $kk;?> main-buyindex">
      <div class="common">
        <div class="cell-header">
          <ul class="list">
            <li class="times">时间</li>
            <li class="buy_title">标题</li>
            <li class="purchaser">求购商</li>
            <li class="address">所在地</li>
            <li class="price">我要报价</li>
          </ul>
        </div>
        <div class="cell-content"> 
          <?php $tags=tag("moduleid=6&catid=$catid&length=24&condition=status=3&areaid=$cityid&pagesize=11&order=addtime desc&template=null");?> 
          <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
          <ul class="list">
            <li class="times"><?php echo timetodate($t['totime'], 3);?></li>
            <li class="buy_title"><a target="_blank" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>"  href="<?php echo $t['linkurl'];?>"><?php echo $t['title'];?></a></li>
            <li class="purchaser"><a href="<?php echo userurl($t['username']);?>" target="_blank" title="<?php echo $t['company'];?>"><?php echo $t['company'];?></a></li>
            <li class="address"> <a target="_blank" href="<?php echo $t['linkurl'];?>"><?php echo area_pos($t['areaid'], '');?> </a> </li>
            <li class="price"><a href="<?php echo $t['linkurl'];?>" class="btns" target="_blank">我要报价</a></li>
          </ul>
          <?php } } ?> </div>
      </div>
      <div class="sub-side">
        <div class="cell-header">
          <h2 class="ft-ms">最新产品</h2>
        </div>
        <div class="cell-content">
          <div class="comment_pro clearfix">
           <?php if($kk==1) { ?>
                    <?php echo tag("moduleid=5&catid=831&length=24&condition=status=3 and level=1 and thumb<>''&areaid=$cityid&pagesize=4&order=addtime desc&template=xiaohei-buy_fftj");?>
                    <?php } else if($kk==2) { ?>
                    <?php echo tag("moduleid=5&catid=167&length=24&condition=status=3 and level=1 and thumb<>''&areaid=$cityid&pagesize=4&order=addtime desc&template=xiaohei-buy_fftj");?>
                    <?php } else if($kk==3) { ?>
                    <?php echo tag("moduleid=5&catid=220&length=24&condition=status=3 and level=1 and thumb<>''&areaid=$cityid&pagesize=4&order=addtime desc&template=xiaohei-buy_fftj");?>
                    <?php } else if($kk==4) { ?>
                    <?php echo tag("moduleid=5&catid=682&length=24&condition=status=3 and level=1 and thumb<>''&areaid=$cityid&pagesize=4&order=addtime desc&template=xiaohei-buy_fftj");?>
                    <?php } else if($kk==5) { ?>
                    <?php echo tag("moduleid=5&catid=137&length=24&condition=status=3 and level=1 and thumb<>''&areaid=$cityid&pagesize=4&order=addtime desc&template=xiaohei-buy_fftj");?>
                    <?php } else if($kk==6) { ?>
                   <?php echo tag("moduleid=5&catid=346&length=24&condition=status=3 and level=1 and thumb<>''&areaid=$cityid&pagesize=4&order=addtime desc&template=xiaohei-buy_fftj");?>
                    <?php } else if($kk==7) { ?>
                   <?php echo tag("moduleid=5&catid=218&length=24&condition=status=3 and level=1 and thumb<>''&areaid=$cityid&pagesize=4&order=addtime desc&template=xiaohei-buy_fftj");?>
                    <?php } else if($kk==8) { ?>
                   <?php echo tag("moduleid=5&catid=222&length=24&condition=status=3 and level=1 and thumb<>''&areaid=$cityid&pagesize=4&order=addtime desc&template=xiaohei-buy_fftj");?>
                    <?php } else if($kk==9) { ?>
                  <?php echo tag("moduleid=5&catid=627&length=24&condition=status=3 and level=1 and thumb<>''&areaid=$cityid&pagesize=4&order=addtime desc&template=xiaohei-buy_fftj");?>
                    <?php } else if($kk==10) { ?>
                  <?php echo tag("moduleid=5&catid=609&length=24&condition=status=3 and level=1 and thumb<>''&areaid=$cityid&pagesize=4&order=addtime desc&template=xiaohei-buy_fftj");?>
                    <?php } ?>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
  <?php } } ?> 
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/index.js"></script> 
<?php include template('footer');?>
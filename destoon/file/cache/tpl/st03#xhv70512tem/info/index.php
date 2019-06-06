<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>info-index.css">
<!--中间信息开始-->
<div class="wrapper mt20 clear">
  <div class="t1124-ind-sort floatL">
    <div class="t1124-ind-prolisttit">
      <h2>推荐</h2>
      <img src="<?php echo DT_SKIN;?>image/info/sort_tit_bg.png"> </div>
    <div class="t1124-ind-prolistcon">
     <ul>
      <?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?>
      <?php if($k<16) { ?>
    <li><a href="<?php echo $MOD['linkurl'];?><?php echo $v['linkurl'];?>"><?php echo set_style($v['catname'],$v['style']);?></a> </li>
     <?php } ?>
<?php } } ?>
   </ul>
    </div>
  </div>
  <!--幻灯广告-->
  <div class="t1123-ind-banner floatL">
     <!--大幻灯749*323-->
     <?php echo ad(157);?>
  </div>
  <div class="t1124-ind-loginWrap rightbar floatR">
    <!--登录状态-->
<div class="xhhyzt"><?php include template('line-right', 'chip');?></div>
  <!--登录状态-->
    <div class="t1127-ind-priList">
      <div class="t1127-ind-priList-con tradeinfo" >
        <table cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th class="t1127-tdw1">最新招商</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="8">
              <div class="scrollList2  bd">
                  <?php $tags=tag("moduleid=$moduleid&length=20&condition=status=3&areaid=$cityid&pagesize=20&order=addtime desc&template=null");?>
          <ul>
            <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
            <li><span class="fr gray"><?php echo area_pos($t['areaid'], '/', 2);?></span><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></li>
            <?php } } ?>
          </ul>
                </div>
                </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<div class="wrapper clear"> 
  <!--招商分类开始-->
  <div class="t1123-ind-notice mt20">
    <div class="t1123-ind-notice-tit">
      <h2>行业直达</h2>
    </div>
    <div class="t1123-ind-notice-con">
      <div class="t1123-ind-notice-in">
        <ul class="t1123-ind-notice-list">
          <?php if(is_array($maincat)) { foreach($maincat as $i => $c) { ?>
          <?php if($i<10) { ?>
          <li><a href="<?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>"><?php echo $c['catname'];?></a></li>
          <?php } ?>
          <?php } } ?>
          <li class="fr1"><a href="<?php echo DT_PATH;?>sitemap/index.php?mid=22">更多&raquo;</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!--招商分类结束--> 
  <!--推荐公司 开始-->
  <div class="t1124-ind-supplier">
    <div class="t1124-ind-supplier-con">
      <div class="t1124-ind-supplier-tit">
        <h2>金牌供应商<span>TOP榜</span></h2>
      </div>
      <div class="t1124-in-supplierBox"> 
        <?php $tags=tag("moduleid=4&length=28&condition=groupid>5 and catids<>'' and level=1 and thumb<>''&areaid=$cityid&pagesize=9&order=userid desc&template=null");?> 
        <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
        <dl class="t1124-in-supplierBox-dl t1124-ind-sup<?php echo $i+1;?>">
          <dt class=""> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>"> <img src="<?php if($t['thumb']) { ?><?php echo str_replace('thumb', 'middle', $t['thumb']);?><?php } else { ?><?php echo DT_SKIN;?>image/nopic100.gif<?php } ?>" alt="<?php echo $t['alt'];?>" onerror="this.src='<?php echo DT_SKIN;?>image/nopic100.gif'"></a> </dt>
          <dd> <span class="t1124-in-supplierBox-addr"> <a title="<?php echo area_pos($t['areaid'], '/', 2);?>"> <?php echo area_pos($t['areaid'], '/', 2);?> </a> </span> <span class="t1124-in-supplierBox-company t1124-bgColor<?php echo $i+1;?>"> <a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['company'];?></a> </span> <span class="t1124-in-supplierBox-companyInfo"> <?php echo dsubstr($t['introduce'], 22, '..');?></span> </dd>
        </dl>
        <?php } } ?> </div>
    </div>
  </div>
  <!--推荐公司结束--> 
  <!--推荐招商开始-->
  <div class="t1124-ind-notice">
    <div class="t1124-ind-notice-tit">
     <h2 headline="">热门搜索</h2>
    </div>
    <div class="t1124-ind-notice-con">
      <div class="t1124-ind-notice-in">
        <ul class="t1124-ind-notice-list">
          <?php $tags=tag("moduleid=$searchid&table=keyword&condition=moduleid=$searchid and status=3&pagesize=10&order=total_search desc&template=null");?> 
          <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
          <li><span<?php if($i < 3) { ?> class="sooo"<?php } ?>><?php echo $i+1;?></span> <a href="<?php echo $MODULE[$moduleid]['linkurl'];?><?php echo rewrite('search.php?kw='.urlencode($t['word']));?>" rel="nofollow"><?php echo $t['word'];?></a></li>
          <?php } } ?>
        </ul>
      </div>
    </div>
  </div>
  <!--推荐招商结束--> 
  <!--ff开始--> 
  <?php $mid=22?>
  <?php $child = get_maincat(0,$mid,1);?>
  <?php if(is_array($child)) { foreach($child as $i => $c) { ?>
  <?php if($i < 5) { ?>
  <?php $kk=$i+1?>
  <!--ff S-->
  <div class="wrapper mt20 clear bxh">
    <div class="t1124-sup-w229 floatL">
      <div class="t1124-sup-recom-list">
        <div class="t1124-sup-tit1">
          <h2><em><?php echo $kk;?>F</em> <a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>"><?php echo $c['catname'];?></a></h2>
        </div>
        <div class="t1124-sup-recom-list-con-b"></div>
        <div class="t1124-sup-recom-list-con" content="">
          <ul class="global-common-text-list">
            <?php $tags=tag("moduleid=$moduleid&catid=".$c['catid']."&condition=status=3&areaid=$cityid&pagesize=11&order=addtime desc&template=null");?> 
            <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
            <li><span<?php if($i < 3) { ?> class="tj"<?php } ?>><?php echo $i+1;?></span> <a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a> </li>
            <?php } } ?>
          </ul>
        </div>
      </div>
    </div>
    <!--右边-->
    <div class="t1124-supply-w959 floatR">
      <div class="t1124-info-banner floatL">
        <div class="t1124-ind-banner-con">
          <ul>
            <li><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank" title="<?php echo $c['catname'];?>"> <img src="<?php echo DT_SKIN;?>image/info/<?php echo $kk;?>f.jpg"> </a></li>
          </ul>
        </div>
      </div>
      <div class="t1124-info-w959-top floatL">
        <div class="t1124-supply-w959-top-con">
          <div class="t1124-sup-top"> 
            <?php $tags=tag("moduleid=$moduleid&catid=".$c['catid']."&condition=status=3 and level=2 and thumb<>''&areaid=$cityid&pagesize=1&order=addtime desc&length=28&template=null");?> 
            <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
            <div class="t1124-sup-Tpic"> <span><a title="<?php echo $t['alt'];?>" target="_blank" href="<?php echo $t['linkurl'];?>"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>" onerror="this.src='<?php echo DT_SKIN;?>image/nopic100.gif'"></a></span> </div>
            <div class="t1124-sup-Tinfo"> <span class="t1124-sup-oldPrice"><?php echo $t['title'];?></span> <span class="t1124-sup-NowPrice">加盟金额&nbsp;<?php echo $t['price'];?></span>
              <div class="t1124-sup-tit"> <a target="_blank" href="<?php echo $t['linkurl'];?>"><?php echo dsubstr($t['introduce'], 40, '…');?></a> </div>
              <div class="t1124-sup-mRecom"> <a target="_blank" class="org_bg" href="<?php echo $t['linkurl'];?>">主力推荐</a> </div>
            </div>
            <?php } } ?> </div>
        </div>
      </div>
      <div class="t1124-info-w959-bottom">
        <div class="t1124-info-w959-bottom-con">
          <div class="t1124-info-w959-list-box"> 
            <?php $tags=tag("moduleid=$moduleid&catid=".$c['catid']."&condition=status=3 and level=1 and thumb<>''&areaid=$cityid&pagesize=4&order=addtime desc&length=50&template=null");?> 
            <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
            <div class="t1124-sup-bottom-list">
              <div class="t1124-sup-Btit"> <a title="<?php echo $t['alt'];?>" target="_blank" href="<?php echo $t['linkurl'];?>"><?php echo $t['title'];?></a> </div>
              <div class="t1124-sup-Binfo">
                <div class="t1124-sup-Binfo-price"> 加盟金额
                  <label><?php echo $t['price'];?></label>
                </div>
                <div class="t1124-sup-Binfo-num"> 更新：<?php echo $t['editdate'];?> </div>
                <div class="t1124-sup-Binfo-num-jm"> <a title="<?php echo $t['alt'];?>" target="_blank" href="<?php echo $t['linkurl'];?>">加盟</a> </div>
              </div>
            <div class="t1124-sup-Bpic"> <span><a title="<?php echo $t['alt'];?>" target="_blank" href="<?php echo $t['linkurl'];?>"> <img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>" onerror="this.src='<?php echo DT_SKIN;?>image/nopic60.gif'"> </a></span> </div>
            </div>
            <?php } } ?>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!--ff END--> 
  <?php } ?>
  <?php } } ?>
   </div>
<!--ff结束-->
</div>
<!--中间信息结束--> 
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/index.js"></script> 
<?php include template('footer');?>
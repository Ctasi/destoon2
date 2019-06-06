<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header-job');?> 
<script>
$(document).ready(function(){
    $(".a").hover(function(){
    $(this).find(".b").slideDown();
    },function(){
    $(this).find(".b").slideUp();
    });
});
</script> 
<!-- 主体 -->
<div class="container-index">
  <div class="complex-main clearfix">
    <div class="complex-left f-left">
      <div class="job-sort-wrap">
        <div class="hc_lnav jslist">
<div class="allbtn">
<div class="job-sort-control">
        <a href="<?php echo $MODULE['1']['linkurl'];?>sitemap/index.php?mid=9" target="_blank">全部职位分类<i class="sotr-icon"></i></a>
        </div>
<ul style="width:263px" class="jspop box">
        <?php include template('xiaohei-catalogjob', 'chip');?>
</ul>
</div>
</div>
      </div>
      <div class="bolck-nav clearfix"> <a class="b-nav-item f-left" href="<?php echo $MODULE['9']['linkurl'];?>search.php?action=job" target="_blank"> <i class="b-nav-icon icon1"></i>
        <p>找工作</p>
        </a> <a class="b-nav-item f-left" href="<?php echo $MODULE['9']['linkurl'];?>search.php?action=resume&kw=" target="_blank"> <i class="b-nav-icon icon2"></i>
        <p>找人才</p>
        </a> <a class="b-nav-item f-left" href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=9&action=add" target="_blank"> <i class="b-nav-icon icon9"></i>
        <p>发职位</p>
        </a> <a class="b-nav-item f-left" href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=9&action=add&resume=1" target="_blank"> <i class="b-nav-icon icon4"></i>
        <p>创简历</p>
        </a> <a class="b-nav-item f-left" href="<?php echo $MODULE['18']['linkurl'];?>" target="_blank"> <i class="b-nav-icon icon5"></i>
        <p>微商圈</p>
        </a> <a class="b-nav-item f-left" href="<?php echo $MODULE['5']['linkurl'];?>" target="_blank"> <i class="b-nav-icon icon6"></i>
        <p>找产品</p>
        </a> <a class="b-nav-item f-left" href="<?php echo $MODULE['6']['linkurl'];?>" target="_blank"> <i class="b-nav-icon icon3"></i>
        <p>找采购</p>
        </a> <a class="b-nav-item f-left" href="<?php echo $MODULE['4']['linkurl'];?>" target="_blank"> <i class="b-nav-icon icon7"></i>
        <p>找名企</p>
        </a> </div>
      <div class="news-tab">
        <div class="n-tab-control clearfix"><a href="javascript:;" class="f-left tab-ctrl select">公告</a></div>
        <div class="news-tab-box"> 
          <!-- 公告 -->
          <ul>
            <?php echo tag("table=announce&catid=4&areaid=$cityid&pagesize=6&order=listorder desc,addtime desc&target=_blank&length=24&cname=公告&template=xiaohei-gonggao");?>
          </ul>
        </div>
      </div>
    </div>
    <div class="complex-center f-left"> 
      <!-- 搜索 -->
  <form action="<?php echo $MOD['linkurl'];?>search.php" id="fsearch">
<input type="hidden" name="action" id="action" value="job"/>
        <div class="search-wrap clearfix">
          <div class="search-box f-left">
            <div class="search-type f-left">
<div class="search-type-show"><span><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?action=job');?>" class="type_1" rel="nofollow">找工作</a></span></div>
            </div>
            <div class="search-text f-left">
              <input type="text" name="kw" placeholder="请输入职位名称或企业名称" />
            </div>
          </div>
          <div class="search-submit f-left">
            <input type="submit" value="搜索" class="search-submit" id="sbm_img" />
          </div>
             </form>
        </div>
   
      <!-- 搜索结束 -->
      <div class="swipe-wrap">
        <div id="playBox">
          <div class="pre"></div>
          <div class="next"></div>
          <div class="smalltitle">
            <ul>
              <li class="thistitle"></li>
              <li ></li>
              <li ></li>
            </ul>
          </div>
          <ul class="oUlplay">
            <li><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/1.png" alt="" border="0" width="610" height="270"/></a></li>
            <li><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/2.png" alt="" border="0" width="610" height="270"/></a></li>
            <li><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/3.png" alt="" border="0" width="610" height="270"/></a></li>
          </ul>
        </div>
      </div>
      <div class="block-ad-wrap clearfix">
        <div class="block-ad-item f-left">
          <div class="block-ad-logo"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/001.jpg" alt="" width="202" height="81" border="0" /></a></div>
          <div class="block-ad-info">
            <h3><a href="./" target="_blank">北京万通伟业有限公司</a></h3>
            <p><a href="" target="_blank">会计师</a></p>
          </div>
        </div>
        <div class="block-ad-item f-left">
          <div class="block-ad-logo"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/002.gif" alt="" width="202" height="81" border="0" /></a></div>
          <div class="block-ad-info">
            <h3><a href="./" target="_blank">太原迅易科技有限公司</a></h3>
            <p><a href="" target="_blank">会计师</a></p>
          </div>
        </div>
        <div class="block-ad-item f-left">
          <div class="block-ad-logo"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/003.gif" alt="" width="202" height="81" border="0" /></a></div>
          <div class="block-ad-info">
            <h3><a href="./" target="_blank">上海凯宾斯基酒店有限公司</a></h3>
            <p><a href="./" target="_blank">厂长</a></p>
          </div>
        </div>
        <div class="block-ad-item f-left">
          <div class="block-ad-logo"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/004.jpg" alt="" width="202" height="81" border="0" /></a></div>
          <div class="block-ad-info">
            <h3><a href="./" target="_blank">郑州龙腾控股科技有限公司</a></h3>
            <p><a href="./" target="_blank">会计师</a></p>
          </div>
        </div>
        <div class="block-ad-item f-left">
          <div class="block-ad-logo"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/005.gif" alt="" width="202" height="81" border="0" /></a></div>
          <div class="block-ad-info">
            <h3><a href="./" target="_blank">浙江天风集团有限公司</a></h3>
            <p><a href="" target="_blank">会计师</a></p>
          </div>
        </div>
        <div class="block-ad-item f-left">
          <div class="block-ad-logo"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/006.jpg" alt="" width="202" height="81" border="0" /></a></div>
          <div class="block-ad-info">
            <h3><a href="./" target="_blank">武汉泰达网络有限公司</a></h3>
            <p><a href="" target="_blank">会计师</a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="complex-right f-left">
      <div class="urgent-block">
        <div class="urgent-title clearfix">
          <h4 class="f-left">紧急招聘</h4>
          <a href="<?php echo $MODULE['9']['linkurl'];?>search.php?action=job" class="underline f-right" target="_blank">更多>></a> </div>
        <ul class="urgent-list">
          <?php $tags=tag("moduleid=$moduleid&length=24&condition=status=3 and level=1&areaid=$cityid&pagesize=21&order=addtime desc&template=null");?> 
          <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
          <li class="clearfix"><a href="<?php echo userurl($t['username']);?>" class="u-com f-left underline" target="_blank"><?php echo $t['company'];?></a><a href="<?php echo $t['linkurl'];?>" class="u-job f-left underline" title="<?php echo $t['alt'];?>" target="_blank"><?php echo $t['title'];?></a></li>
          <?php } } ?>
        </ul>
      </div>
    </div>
  </div>
  <!-- 广告位集中区域 -->
  <div class="ad-area"> 
    <!-- 1198*58 广告  -->
    <div class="ad-row clearfix">
      <div class="ad-item ad-full f-left"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/01.png" alt="" width="1198" height="58" border="0" /></a></div>
    </div>
    <div class="ad-row clearfix">
      <div class="ad-item ad-full f-left"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/02.png" alt="" width="1198" height="58" border="0" /></a></div>
    </div>
    <div class="ad-row clearfix">
      <div class="ad-item ad-full f-left"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/03.png" alt="" width="1198" height="58" border="0" /></a></div>
    </div>
    <!-- 392*58 广告  格子广告-->
    <div class="ad-row clearfix">
      <div class="ad-item ad-31 f-left comimgtip"> <a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/04.jpg" alt="" width="392" height="58" border="0" /></a> </div>
      <div class="ad-item ad-31 f-left comimgtip"> <a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/05.jpg" alt="" width="392" height="58" border="0" /></a> </div>
      <div class="ad-item ad-31 f-left comimgtip nomr"> <a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/06.jpg" alt="" width="392" height="58" border="0" style="display: inline;" /></a> </div>
    </div>
    <!-- 230x58 广告  格子广告-->
    <div class="ad-row a23058d clearfix">
      <div class="ad-item ad-51 f-left comimgtip"> <a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/07.png" alt="" width="230" height="58" border="0" /></a> </div>
      <div class="ad-item ad-51 f-left comimgtip"> <a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/08.png" alt="" width="230" height="58" border="0" /></a> </div>
      <div class="ad-item ad-51 f-left comimgtip"> <a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/09.png" alt="" width="230" height="58" border="0" /></a> </div>
      <div class="ad-item ad-51 f-left comimgtip"> <a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/10.png" alt="" width="230" height="58" border="0" /></a> </div>
      <div class="a ad-item ad-51 f-left comimgtip nomr"> <a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/11.png" alt="" width="230" height="58" border="0" style="display: inline;"/></a> 
        <!-- 鼠标至上显示 -->
        <div class="b ad-more-info info51" style="display: none;">
          <div class="ad-placeholder"></div>
          <ul class="ad-job-list">
            <li class="clearfix">
              <div class="jobname f-left"><a href="./" class="underline" target="_blank">销售专员</a></div>
              <div class="jobpay f-left"><span>2000~3000元/月</span></div>
            </li>
          </ul>
          <div class="ad-com-info ad-com-info-w">
            <div class="companyname"><a href="./" class="underline" target="_blank">北京华尧迪科技有限公司</a></div>
            <p>XXX技术有限公司成立于2000年,是XXX投资有限公司与美国XXX公司合资兴建的中外合资企业,引进美国海XXX专利技术,专业从事XX研究开发和生产应用.<br />
              &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;公司2002年被XX认定为高新技术企业,是目前国内唯一的一家既生产XXX又生产X的生产厂家,主要产品有各XX,XX列产品XXX等.</p>
          </div>
          <a href="./" class="ad-more" target="_blank">查看更多内容>></a> </div>
      </div>
    </div>
  </div>
  <!-- 广告位集中区域结束 --> 
  <!-- 列表-推荐职位 -->
  
  <div class="index-data-wrap index-data-wrap-i7">
    <div class="blue-line"></div>
    <div class="data-title-box clearfix">
      <h4 class="f-left">推荐职位<span>Recommended Job</span></h4>
      <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=9&action=add" class="f-right underline" target="_blank">我是招聘单位，我想出现在这里</a> </div>
    <div class="famous-list clearfix"> 
      <?php $tags=tag("moduleid=$moduleid&length=24&condition=status=3 and level=1&areaid=$cityid&pagesize=8&order=addtime desc&template=null");?> 
      <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
      <div class="famous-items f-left"> <i class="fc-icon"></i>
        <div class="a famous-com comtip ajob"> <a href="<?php echo $t['linkurl'];?>"  target="_balnk"><?php echo $t['company'];?></a>
          <div class="b famous-more-info bjob" style="display: none;"> <i class="fmi-icon"></i>
            <div class="fmi-title">岗位待遇</div>
            <ul class="fmi-list">
              <li class="clearfix">
                <div class="fmi-jobname f-left"> <a href="<?php echo $t['linkurl'];?>" target="_balnk">特招：<?php echo $t['title'];?> 人员 <?php echo $t['total'];?> 名</a></div>
                <div class="fmi-jobname f-left"> <a href="<?php echo $t['linkurl'];?>" target="_balnk">
                  <?php if($t['minsalary'] && $t['maxsalary']) { ?>
                  <?php echo $t['minsalary'];?>-<?php echo $t['maxsalary'];?><?php echo $DT['money_unit'];?>/月
                  <?php } else if($t['minsalary']) { ?>
                  <?php echo $t['minsalary'];?><?php echo $DT['money_unit'];?>/月以上
                  <?php } else if($t['maxsalary']) { ?>
                  <?php echo $t['maxsalary'];?><?php echo $DT['money_unit'];?>/月以内
                  <?php } else { ?>
                  面议
                  <?php } ?></a></div>
                <div class="fmi-time f-left"><span><?php echo timetodate($t['edittime'], 3);?></span></div>
              </li>
            </ul>
            <p><a href="<?php echo userurl($t['username']);?>" target="_balnk" class="underline">查看该企业介绍</a></p>
          </div>
        </div>
        <div class="famous-job"> <span><a href="<?php echo $t['linkurl'];?>" class="underline" target="_balnk"><?php echo $t['title'];?></a></span> </div>
      </div>
      <?php } } ?> </div>
  </div>
  <!-- 列表-名企招聘结束 --> 
  <!-- 1198*58 广告  -->
  <div class="ad-area">
    <div class="ad-row clearfix">
      <div class="ad-item ad-full f-left"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/12.jpg" alt="" width="1198" height="58" border="0" /></a></div>
    </div>
  </div>
  <!-- 列表-最新职位 -->
  <div class="index-data-wrap">
    <div class="blue-line"></div>
    <div class="data-title-box clearfix">
      <h4 class="f-left">最新职位<span>Latest Job</span></h4>
      <a href="<?php echo $MODULE['9']['linkurl'];?>search.php?action=job" class="f-right underline" target="_blank">更多>></a> </div>
    <div class="newest-list clearfix"> 
      <?php $tags=tag("moduleid=$moduleid&length=24&condition=status=3&areaid=$cityid&pagesize=36&order=addtime desc&template=null");?> 
      <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
      <div class="newest-items f-left"> <i class="nc-icon"></i> <a href="<?php echo userurl($t['username']);?>" class="newest-com underline" target="_blank"><?php echo $t['company'];?></a> <a href="<?php echo $t['linkurl'];?>" class="newest-job underline" target="_blank"><?php echo $t['title'];?></a> </div>
      <?php } } ?> </div>
  </div>
  <!-- 列表-最新职位结束 --> 
  <!-- 1198*58 广告  -->
  <div class="ad-area">
    <div class="ad-row clearfix">
      <div class="ad-item ad-full f-left"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/01.png" alt="" width="1198" height="58" border="0" /></a></div>
    </div>
  </div>
  <!-- 列表-照片简历 -->
  <div class="index-data-wrap">
    <div class="blue-line"></div>
    <div class="data-title-box clearfix">
      <h4 class="f-left">照片简历<span>Photo Resume</span></h4>
      <a href="<?php echo $MODULE['9']['linkurl'];?>search.php?action=resume&kw=" class="f-right underline" target="_blank">更多>></a> </div>
    <div class="photo-list clearfix"> 
      <?php $tags=tag("moduleid=$moduleid&table=job_resume_$moduleid&length=24&condition=status=3 and open=3&areaid=$cityid&showcat=1pagesize=6&order=edittime desc&template=null");?> 
      <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
      <div class="photo-items f-left">
        <div class="avater-box">
          <div class="avater"><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php if($t['thumb']) { ?><?php echo $t['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nohead.gif<?php } ?>"  width="120" height="120" border="0"/></a></div>
          <p><a href="<?php echo $t['linkurl'];?>" target="_blank" class="underline"><?php echo $t['truename'];?></a></p>
        </div>
        <div class="photo-info">
          <p><?php echo $EDUCATION[$t['education']];?><?php if($t['experience']) { ?>,<?php echo $t['experience'];?>年<?php } else { ?>无<?php } ?></p>
          <p><?php echo $CATEGORY[$t['catid']]['catname'];?></p>
        </div>
      </div>
      <?php } } ?> </div>
  </div>
  <!-- 列表-照片简历结束 --> 
  <!-- 列表-职位导航 -->
  <div class="index-data-wrap">
    <div class="blue-line"></div>
    <div class="data-title-box clearfix">
      <h4 class="f-left">职位导航<span>Jobs Navigation</span></h4>
    </div>
    <div class="job-build"> 
      <!--楼层--> 
      <?php $mid=9?>
      <?php $child = get_maincat(0, $mid, 1);?>
      <?php if(is_array($child)) { foreach($child as $i => $c) { ?>
      <?php $kk=$i+1;?>
      <?php $catid=$c['catid'];?>
      <?php if($i < 3) { ?>
      <div class="floor-item">
        <div class="floor-title"><em><?php echo $i+1;?>F</em><span><a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><?php echo $c['catname'];?></a></span></div>
        <div class="floor-box clearfix"> 
          <!-- 分类 -->
          <div class="floor-sort f-left"> 
    <?php if($c['child']) { ?>
    <?php $sub = get_maincat($c['catid'], $mid);?>
    <?php if(is_array($sub)) { foreach($sub as $j => $s) { ?><?php if($j < 18) { ?>
          <a href="<?php echo $MODULE[$mid]['linkurl'];?><?php echo $s['linkurl'];?>" class="f-sort-item f-left" target="_blank"><?php echo set_style($s['catname'], $s['style']);?></a> <?php } ?>
    <?php } } ?>
    <?php } ?>
          </div>
          <!-- 职位 -->
          <div class="floor-jobs f-left">
      <?php $tags=tag("moduleid=$moduleid&catid=$catid&length=24&condition=status=3&areaid=$cityid&pagesize=9&order=addtime desc&template=null");?> 
      <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
      <div class="f-job-row"> <a href="<?php echo userurl($t['username']);?>" class="f-job-com underline" target="_blank"><?php echo $t['company'];?></a> <a href="<?php echo $t['linkurl'];?>" class="f-job-name underline" target="_blank"><?php echo $t['title'];?></a> </div>
      <?php } } ?>
          </div>
          <!-- 广告 楼层广告1 -->
          <div class="floor-ad-box f-left">
            <div class="floor-ad"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/<?php echo $i+1;?>f-1.jpg" alt="" width="378" height="60" border="0" /></a></div>
            <div class="floor-ad"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/<?php echo $i+1;?>f-2.jpg" alt="" width="378" height="60" border="0" /></a></div>
            <div class="floor-ad"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/<?php echo $i+1;?>f-3.jpg" alt="" width="378" height="60" border="0" /></a></div>
            <div class="floor-ad"><a href="./" target="_blank"><img src="<?php echo DT_SKIN;?>aa/job/<?php echo $i+1;?>f-4.jpg" alt="" width="378" height="60" border="0" /></a></div>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php } } ?> </div>
  </div>
  <!-- 列表-职位导航结束 --> 
  <!-- 列表-职场资讯 -->
  <div class="index-data-wrap">
    <div class="blue-line"></div>
    <div class="data-title-box clearfix">
      <h4 class="f-left">职场资讯<span>Workplace Information</span></h4>
      <a href="<?php echo $MODULE['21']['linkurl'];?>" class="f-right underline" target="_blank">更多>></a> </div>
    <div class="job-news-block clearfix">
      <div class="jn-left f-left">
      <!--1-->
        <div class="jn-box f-left">
         <?php $tags=tag("moduleid=21&catid=9629&condition=status=3 and thumb<>''&areaid=$cityid&pagesize=1&order=addtime desc&length=36&template=null");?> 
       <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
          <div class="jn-img f-left"><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" width="163" height="98" border="0"></a></div>
          <?php } } ?>
          <ul class="jn-list f-left">
           <?php $tags=tag("moduleid=21&catid=9629&condition=status=3&areaid=$cityid&pagesize=4&order=addtime desc&length=36&template=null");?> 
       <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
            <li><i class="jn-icon"></i><a target="_blank" href="<?php echo $t['linkurl'];?>" class="underline" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></li>
            <?php } } ?>
          </ul>
        </div>
        
         <!--2-->
        <div class="jn-box f-left">
         <?php $tags=tag("moduleid=21&catid=9629&condition=status=3 and thumb<>''&areaid=$cityid&pagesize=1&order=addtime desc&length=36&template=null");?> 
       <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
          <div class="jn-img f-left"><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" width="163" height="98" border="0"></a></div>
          <?php } } ?>
          <ul class="jn-list f-left">
           <?php $tags=tag("moduleid=21&catid=9629&condition=status=3&areaid=$cityid&pagesize=4&order=addtime desc&length=36&template=null");?> 
       <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
            <li><i class="jn-icon"></i><a target="_blank" href="<?php echo $t['linkurl'];?>" class="underline" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></li>
            <?php } } ?>
          </ul>
        </div>
        
         <!--3-->
        <div class="jn-box f-left">
         <?php $tags=tag("moduleid=21&catid=9629&condition=status=3 and thumb<>''&areaid=$cityid&pagesize=1&order=addtime desc&length=36&template=null");?> 
       <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
          <div class="jn-img f-left"><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" width="163" height="98" border="0"></a></div>
          <?php } } ?>
          <ul class="jn-list f-left">
           <?php $tags=tag("moduleid=21&catid=9629&condition=status=3&areaid=$cityid&pagesize=4&order=addtime desc&length=36&template=null");?> 
       <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
            <li><i class="jn-icon"></i><a target="_blank" href="<?php echo $t['linkurl'];?>" class="underline" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></li>
            <?php } } ?>
          </ul>
        </div>
        
         <!--4-->
        <div class="jn-box f-left">
         <?php $tags=tag("moduleid=21&catid=9629&condition=status=3 and thumb<>''&areaid=$cityid&pagesize=1&order=addtime desc&length=36&template=null");?> 
       <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
          <div class="jn-img f-left"><a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" width="163" height="98" border="0"></a></div>
          <?php } } ?>
          <ul class="jn-list f-left">
           <?php $tags=tag("moduleid=21&catid=9629&condition=status=3&areaid=$cityid&pagesize=4&order=addtime desc&length=36&template=null");?> 
       <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
            <li><i class="jn-icon"></i><a target="_blank" href="<?php echo $t['linkurl'];?>" class="underline" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></li>
            <?php } } ?>
          </ul>
        </div>
      </div>
      <ol class="jn-right f-left">
       <?php $tags=tag("moduleid=21&condition=status=3&areaid=$cityid&pagesize=9&order=addtime desc&length=40&datetype=3&template=null");?> 
       <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
        <li><span><?php echo $i+1;?></span><a href="<?php echo $t['linkurl'];?>" class="underline" target="_blank"><?php echo $t['title'];?></a></li>
       <?php } } ?>
      </ol>
    </div>
  </div>
  <!-- 列表-职场资讯结束 --> 
  <!-- 列表-友情链接 -->
  <div class="index-data-wrap">
    <div class="blue-line"></div>
    <div class="data-title-box clearfix">
      <h4 class="f-left">友情链接<span>Friendly Link</span></h4>
      <a href="<?php echo DT_PATH;?>link/index.php?action=reg" target="_blank"  class="f-right underline">申请>></a> </div>
    <div class="friendly-link">
  <?php if($DT['page_text']) { ?> 
  <?php echo tag("table=link&condition=status=3 and level>0 and thumb='' and username=''&areaid=$cityid&pagesize=".$DT['page_text']."&order=listorder desc,itemid desc&template=list-link&cols=9");?> 
  <?php } ?>
      </div>
  </div>
  <!-- 列表-友情链接结束 --> 
</div>
<!-- 主体结束 --> 
<?php include template('footer');?>
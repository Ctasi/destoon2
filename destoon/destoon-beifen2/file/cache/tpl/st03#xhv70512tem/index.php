<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array('index');?>
<?php include template('header');?>
<!--第一屏-->
<div class="clear index_01">
    <div class="wrapper">
        <div class="fl J-mainNav">
            
            <?php $mid = 21?>
            <?php $c0 = get_maincat(0, $mid, 1);?>
            <ul class="m_zl">
                <?php if(is_array($c0)) { foreach($c0 as $k0 => $v0) { ?>
                <?php if($k0 < 10) { ?>
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
                <!--大幻灯id 748*285-->
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
            <div class="xhhyzt">
                <?php include template('line-right', 'chip');?>
            </div>
            <div class="help-tab">
                <div class="hd">
                    <ul id="tab">
                        <li class="on" style="width: 24px;"><a href="<?php echo DT_PATH;?>announce/" target="_blank">公告</a></li>
                        <li style="width: 24px;">规则</li>
                        <li>我是卖家</li>
                        <li style="margin: 0;">我是买家</li>
                    </ul>
                </div>
                <div class="bd" id="tab-sub">
                    <?php echo tag("table=announce&condition=totime=0 or totime>$today_endtime-86400&areaid=$cityid&pagesize=2&class=dot&order=listorder desc,addtime desc&class=dot02&target=_blank&length=20&cname=公告&template=xiaohei-index02");?>
                    <?php echo tag("moduleid=23&catid=9778&length=20&cname=规则&condition=status=3&areaid=$cityid&pagesize=2&order=addtime desc&target=_blank&class=dot02&template=xiaohei-index02");?>
                    <?php echo tag("moduleid=23&catid=9773&length=20&cname=我是卖家&condition=status=3&areaid=$cityid&pagesize=2&order=addtime desc&target=_blank&class=dot02&template=xiaohei-index02");?>
                    <?php echo tag("moduleid=23&catid=9774&length=20&cname=我是买家&condition=status=3&areaid=$cityid&pagesize=2&order=addtime desc&target=_blank&class=dot02&template=xiaohei-index02");?>
                </div>
            </div>
            <div class="clear"> </div>
            <!--工具推广-->
            <div class="user-svr mt15"> <a target="_blank" rel="nofollow" href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_register'];?>" class="user-svr-basic"> <span class="free-tags">免费加入<b></b></span> <i class="icon-home icon-basic"></i> <em>会员服务</em> </a> <a target="_blank" href="<?php echo $MODULE['2']['linkurl'];?>validate.php" rel="nofollow" class="user-svr-basic"> <i class="icon-home icon-cer"></i> <em>会员认证</em> </a> <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>spread/" rel="nofollow"> <i class="icon-home icon-rank"></i> <em>排名推广</em> </a> <a target="_blank" href="<?php echo $MODULE['1']['linkurl'];?>ad/" rel="nofollow"> <i class="icon-home icon-advert"></i> <em>广告服务</em> </a> </div>
            <!-- 价格行情 -->
            <div class="price mt10">
                <div class="ptit f12 fb">新入供应商
                    <div class="fr" id="site_stats">
                        <ul>
                            <li class="tong">产品数：<span class="tongji"><?php echo number_format($DT['sellbase']+($db->count($DT_PRE.'sell_5', 'status=3', 1800)));?> </span></li>
                            <li class="tong">采购数：<span class="tongji"><?php echo number_format($DT['buybase']+($db->count($DT_PRE.'buy_6', 'status=3', 1800)));?> </span></li>
                            <li class="tong">企业数：<span class="tongji"><?php echo number_format($DT['companybase']+($db->count($DT_PRE.'company', '1', 1800)));?> </span></li>
                            <li class="tong">在线会员：<span class="tongji"><?php echo number_format($DT['onlinebase']+($db->count($DT_PRE.'online', '1', 1800)));?> </span></li>
                        </ul>
                    </div>
                </div>
                <div class="trade">
                    <div class="bd">
                        <?php $tags=tag("moduleid=4&length=20&condition=groupid>5 and catids<>''&areaid=$cityid&pagesize=20&order=userid desc&template=null");?>
                        <ul>
                            <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
                            <li><span class="fr gray"><?php echo area_pos($t['areaid'], '/', 2);?></span><a href="<?php echo $t['linkurl'];?>" target="_blank" alt="<?php echo $t['alt'];?>" title="<?php echo $t['alt'];?>"><?php echo $t['company'];?></a></li>
                            <?php } } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--采购信息-->
<div class="wrapper floors mt20 clear">
    <div class="buy-cont">
        <div class="sild-l">
            <div class="box_img n-box_img"> <a href="<?php echo $MODULE['6']['linkurl'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>aa/index/index-c1.png" width="220" height="358" alt="速购网-采购平台"  title="速购网-采购平台"/></a> </div>
        </div>
        <div class="buy-cont-r">
            <div class="order">
                <p class="title-index"><span class="fir">免费</span><span class="sec">发布采购</span></p>
                <div class="progress-wrap"> <span class="step  inline-block">填写需求</span> <span class="step-split inline-block"></span> <span class="step step2  inline-block">选择报价</span> <span class="step-split  inline-block"></span> <span class="step step3  inline-block">交易成功</span> </div>
                <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=6&action=add&catid=0" class="button" rel="nofollow">我要发布采购</a> </div>
            <div class="buy-trade">
                <div class="head"> <span>最新<span class="sec">需求</span></span> </div>
                <div class="bd">
                    <?php $tags=tag("moduleid=$mid&length=24&condition=status=3&areaid=$cityid&pagesize=20&order=addtime desc&template=index-baojia");?>
                </div>
            </div>
        </div>
        <div class="buy-cont-c">
            <div class="buy-title">
                <h2>今日<span class="fcolor">采购</span></h2>
                <a href="javascript:;" class="prev"></a> <a href="javascript:;" class="next"></a> </div>
            <div class="bd">
                <div class="main-list">
                    <?php $tags=tag("moduleid=$mid&length=24&condition=status=3 and level=1&areaid=$cityid&pagesize=9&order=addtime desc&template=index-sucai");?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--快采信息结束-->
<!--第二屏产品列表-->
<div class="wrapper">
    <?php $mid=5;?>
    <?php $child = get_maincat(0,$mid,1);?>
    <?php if(is_array($child)) { foreach($child as $i => $c) { ?>
    <?php $kk=$i+1;?>
    <?php $catid=$c['catid'];?>
    <?php if($i < 10) { ?><!--控制楼层数-->
    <div t="<?php echo $kk;?>" class="wrapper floors main_lb_box mt20 clear" id="<?php echo $kk;?>f" style="display:block">
        <!--楼层标题-->
        <div class="f-head">
            <h3 class="f-hd"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><?php echo $c['catname'];?></a></h3>
            <span class="floor-after fr">热门分类：
    <?php $sub = get_maincat($c['catid'],$mid,2);?>
    <?php if(is_array($sub)) { foreach($sub as $j => $s) { ?><?php if($j < 5) { ?>
      <a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $s['linkurl'];?>" target="_blank" title="<?php echo $s['catname'];?>" data-scode="<?php echo $s['catid'];?>"><?php echo $s['catname'];?></a>
    <?php } ?><?php } } ?>
      </span> </div>
        <!--楼层详细内容　开始-->
        <div class="floor-cont mark-lay">
            <!--楼层左侧　开始-->
            <div class="sild-l">
                <!--楼层左边标志图片-->
                <?php if($kk==1) { ?>
                <div class="box_img n-box_img"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/index/1f.jpg" width="220" height="358" alt="广告招商" title="广告招商"/></a></div>
                <?php } else if($kk==2) { ?>
                <div class="box_img n-box_img"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/index/2f.jpg" width="220" height="358" alt="广告招商" title="广告招商"/> </a></div>
                <?php } else if($kk==3) { ?>
                <div class="box_img n-box_img"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/index/3f.jpg" width="220" height="358" alt="广告招商" title="广告招商"/> </a></div>
                <?php } else if($kk==4) { ?>
                <div class="box_img n-box_img"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/index/4f.jpg" width="220" height="358" alt="广告招商" title="广告招商"/> </a></div>
                <?php } else if($kk==5) { ?>
                <div class="box_img n-box_img"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/index/5f.jpg" width="220" height="358" alt="广告招商" title="广告招商"/> </a></div>
                <?php } else if($kk==6) { ?>
                <div class="box_img n-box_img"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/index/6f.jpg" width="220" height="358" alt="广告招商" title="广告招商"/> </a></div>
                <?php } else if($kk==7) { ?>
                <div class="box_img n-box_img"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/index/7f.jpg" width="220" height="358" alt="广告招商" title="广告招商"/> </a></div>
                <?php } else if($kk==8) { ?>
                <div class="box_img n-box_img"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/index/8f.jpg" width="220" height="358" alt="广告招商" title="广告招商"/> </a></div>
                <?php } else if($kk==9) { ?>
                <div class="box_img n-box_img"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/index/9f.jpg" width="220" height="358" alt="广告招商" title="广告招商"/></a> </div>
                <?php } else if($kk==10) { ?>
                <div class="box_img n-box_img"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/index/10f.jpg" width="220" height="358" alt="广告招商" title="广告招商"/> </a></div>
                <?php } ?>
                <!--楼层左边标志图片-->
            </div>
            <!--楼层左侧　结束-->
            <!--楼层右侧广告 抡播　开始-->
            <div class="floor_solid sild-r J-floor_solid">
                <div class="hd">
                    <ul>
                    </ul>
                </div>
                <div class="bd">
                    <div class="tempWrap" style="overflow:hidden; position:relative; width:520px">
                        <ul style="width: 520px; left: 0px; position: relative; overflow: hidden; padding: 0px; margin: 0px;">
                            <li style="float: left; width: 520px;">
                                <div class="sidebar-box">
                                    <div class="sidebar-left">
                                        <!--楼层大小广告-->
                                        <div class="index_17"><strong>最新供应</strong><span class="f_r"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank">更多&gt;</a></span></div>
                                        <ul>
                                            <?php echo tag("moduleid=5&catid=$catid&condition=status=3&areaid=$cityid&pagesize=11&order=addtime desc&length=26&template=xiaohei-indexf03");?>
                                        </ul>
                                    </div>
                                    <div class="sildbar-right">
                                        <div class="index_17"><strong>热门企业</strong><span class="f_r"><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_register'];?>" target="_blank">免费加入</a></span></div>
                                        <ul>
                                            <?php if($kk==1) { ?>
                                            <?php echo tag("moduleid=4&catid=9129&condition=groupid>5 and catids<>''&areaid=$cityid&pagesize=11&order=userid desc&length=26&template=xiaohei-ffcom");?>
                                            <?php } else if($kk==2) { ?>
                                            <?php echo tag("moduleid=4&catid=8465&condition=groupid>5 and catids<>''&areaid=$cityid&pagesize=11&order=userid desc&length=26&template=xiaohei-ffcom");?>
                                            <?php } else if($kk==3) { ?>
                                            <?php echo tag("moduleid=4&catid=8518&condition=groupid>5 and catids<>''&areaid=$cityid&pagesize=11&order=userid desc&length=26&template=xiaohei-ffcom");?>
                                            <?php } else if($kk==4) { ?>
                                            <?php echo tag("moduleid=4&catid=8980&condition=groupid>5 and catids<>''&areaid=$cityid&pagesize=11&order=userid desc&length=26&template=xiaohei-ffcom");?>
                                            <?php } else if($kk==5) { ?>
                                            <?php echo tag("moduleid=4&catid=8435&condition=groupid>5 and catids<>''&areaid=$cityid&pagesize=11&order=userid desc&length=26&template=xiaohei-ffcom");?>
                                            <?php } else if($kk==6) { ?>
                                            <?php echo tag("moduleid=4&catid=8644&condition=groupid>5 and catids<>''&areaid=$cityid&pagesize=11&order=userid desc&length=26&template=xiaohei-ffcom");?>
                                            <?php } else if($kk==7) { ?>
                                            <?php echo tag("moduleid=4&catid=8516&condition=groupid>5 and catids<>''&areaid=$cityid&pagesize=11&order=userid desc&length=26&template=xiaohei-ffcom");?>
                                            <?php } else if($kk==8) { ?>
                                            <?php echo tag("moduleid=4&catid=8520&condition=groupid>5 and catids<>''&areaid=$cityid&pagesize=11&order=userid desc&length=26&template=xiaohei-ffcom");?>
                                            <?php } else if($kk==9) { ?>
                                            <?php echo tag("moduleid=4&catid=8925&condition=groupid>5 and catids<>''&areaid=$cityid&pagesize=11&order=userid desc&length=26&template=xiaohei-ffcom");?>
                                            <?php } else if($kk==10) { ?>
                                            <?php echo tag("moduleid=4&catid=8907&condition=groupid>5 and catids<>''&areaid=$cityid&pagesize=11&order=userid desc&length=26&template=xiaohei-ffcom");?>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--楼层右侧广告 抡播　结束-->
            <!--楼层中问　列表　开始-->
            <div class="cont-c">
                <ul class="cont-c-list clearfix">
                    <?php include template('xiaohei-catff', 'chip');?>
                </ul>
            </div>
            <!--楼层中问　列表　结束-->
        </div>
        <!--产品开始-->
        <div class="index_14">
            <?php echo tag("moduleid=5&catid=$catid&condition=status=3  and level>0 &areaid=$cityid&pagesize=11&order=addtime desc&length=26&template=xiaohei-indexf04");?>
        </div>
        <!--产品　结束-->
        <!--楼层详细内容　结束-->
    </div>
    <?php } ?>
    <?php } } ?>
</div>
</div>
<div class="wrapper mt20">
    <script>
        var block_show="";
        var block_hide="0";
    </script>
    <div class="main_lb_more" style="display: none;">展开更多行业</div>
</div>
<!--资讯-->
<div class="wrapper floors mark-lay mt20 clear ibox" id="11f">
    <div class="header">
        <h3>行业资讯</h3>
        <?php $tags=tag("table=category&condition=moduleid=21 and parentid=0&pagesize=10&order=listorder,catid&template=null");?>
        <span class="yl gray fr"><?php if(is_array($tags)) { foreach($tags as $i => $t) { ?><?php if($i) { ?> &nbsp;|&nbsp; <?php } ?><a href="<?php echo $MODULE['21']['linkurl'];?><?php echo $t['linkurl'];?>"><?php echo $t['catname'];?></a><?php } } ?>&nbsp;&nbsp;<a href="<?php echo $MODULE['21']['linkurl'];?>">更多>></a></span> </div>
    <div class="friendzx">
        <div class="elect-3 clearfix">
            <div class="elect-a">
                <h3><a href="<?php echo $MODULE['21']['linkurl'];?>" target="_blank" class="more">更多>></a>最新资讯</h3>
              <!--
                <ul class="ziyun-list clearfix">
                    <?php echo tag("moduleid=21&condition=status=3 and level>0 and thumb<>''&areaid=$cityid&pagesize=1&order=addtime desc&length=36&introduce=110&width=130&height=110&template=xiaohei-indexzx01");?>
                <!--</ul>-->
                <ul class="industry-list">
                    <?php echo tag("moduleid=21&condition=status=3&areaid=$cityid&pagesize=5&order=addtime desc&length=40&datetype=3&template=xiaohei-indexzx02");?>
                </ul>
            </div>
            <div class="elect-a mt-5">
                <h3><a href="<?php echo cat_url(9938);?>" target="_blank" class="more">更多>></a>点击排行</h3>
                <div class="box_body">
                    <div class="rank_list"><?php echo tag("moduleid=21&condition=status=3 and addtime>$today_endtime-30*86400&areaid=$cityid&order=hits desc&pagesize=10&target=_blank");?></div>
                </div>
            </div>
            <div class="elect-a scale-box">
                <h3><a href="<?php echo cat_url(9629);?>" target="_blank" class="more">更多>></a>精华咨询</h3>
                <div class="subline"  style="width: 356px;margin-left: 10px;line-height: 25px;">
                    <?php echo tag("moduleid=21&condition=status=3 and level=1&areaid=$cityid&order=".$MOD['order']."&pagesize=10&datetype=2&target=_blank");?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--友情链接-->
<div class="wrapper floors mark-lay mt20 clear ibox" id="12f">
    <div class="wrap">
        <div class="header">
            <h3>友情链接</h3>
            <span class="yl gray fr"><a href="<?php echo DT_PATH;?>link/index.php?action=reg" target="_blank">在线申请链接</a>&#160;&#160;&#160;&#160;<a href="<?php echo DT_PATH;?>">请做好本站链接之后再申请 关键字"<?php echo $DT['sitename'];?>"，本站网址：<?php echo DT_PATH;?></a></span> </div>
        <div class="friendlink"> <?php if($DT['page_text']) { ?>
            <?php echo tag("table=link&condition=status=3 and level>0 and thumb='' and username=''&areaid=$cityid&pagesize=".$DT['page_text']."&order=listorder desc,itemid desc&template=list-link&cols=9");?>
            <?php } ?> </div>
    </div>
</div>
<?php include template('left-daohang');?>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/daohang.js"></script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/index.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/marquee.js"></script>
<script type="text/javascript">
    new dmarquee(30, 10, 3000, 'site_stats');
</script>
<!--底部版权-->
<?php include template('footer');?>
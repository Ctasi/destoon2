<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="clear">
</div>
<div class="other_item">
<div class="copyrightbar">
  <div class="wrapper">
<dl class="fore1">
<dt>新手指南</dt>
<dd>
<div><a rel="nofollow" target="_blank" href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_register'];?>">注册新用户</a></div>
<div><a rel="nofollow" target="_blank" href="<?php echo $MODULE['23']['linkurl'];?>">操作指南</a></div>
<div><a rel="nofollow" target="_blank" href="<?php echo $MODULE['23']['linkurl'];?>">常见问题</a></div>
</dd>
</dl>
<dl class="fore2">
<dt>采购商服务</dt>
<dd>
<div><a rel="nofollow" target="_blank" href="<?php echo $MODULE['5']['linkurl'];?>">找产品</a></div>
<div><a rel="nofollow" target="_blank" href="<?php echo $MODULE['4']['linkurl'];?>">找公司</a></div>
<div><a rel="nofollow" target="_blank" href="<?php echo $MODULE['6']['linkurl'];?>">找采购</a></div>
<div><a rel="nofollow" target="_blank" href="<?php echo $MODULE['21']['linkurl'];?>">看资讯</a></div>
</dd>
</dl>
<dl class="fore3">
<dt>供应商服务</dt>
<dd>
<div><a rel="nofollow" target="_blank" href="<?php echo $MODULE['2']['linkurl'];?>/home.php">企业商铺</a></div>
<div><a rel="nofollow" target="_blank" href="<?php echo $MODULE['2']['linkurl'];?>/grade.php"><?php echo VIP;?>服务</a></div>
<div><a rel="nofollow" target="_blank" href="<?php echo $MODULE['2']['linkurl'];?>/validate.php">认证服务</a></div>
<div><a rel="nofollow" target="_blank" href="<?php echo $EXT['spread_url'];?>">推广服务</a></div>
</dd>
</dl>
<dl class="fore4">
<dt>交易安全</dt>
<dd>
<div><a target="_blank" href="<?php echo $MODULE['23']['linkurl'];?>">买家防骗</a></div>
<div><a target="_blank" href="<?php echo $MODULE['23']['linkurl'];?>">卖家防骗</a></div>
<div><a rel="nofollow" href="javascript:SendReport();">投诉举报</a></div>
</dd>
</dl>
<dl class="fore5">
<dt>关注我们</dt>
<dd>
<div>手机网站: <a target="_blank" href="<?php echo $EXT['mobile_url'];?>mobile.php"><?php echo $DT['waphttp'];?></a></div>
<div>新浪微博: <a target="_blank" href="http://<?php echo $DT['weibo'];?>" rel="nofollow"><?php echo $DT['weibo'];?></a></div>
<div>微信关注: <?php echo $DT['weixin'];?></div>
<div style="margin-top: 5px;">
<a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=5fd78221597e88a4af3e2c8512a61d5f1f8dc535171ea7773562452f9042dafd"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="<?php echo $DT['qqqunname'];?>" title="<?php echo $DT['qqqunname'];?>"></a>
</div>
</dd>
</dl>
<div class="hotline">
        <p class="phone"><?php echo $DT['telephone'];?></p>
<p><span class="serviceTime-normal" style="">周一至周五 9:00-18:00</span>
<br>（其他时间联系在线客服）</p>
<a rel="nofollow" class="btn-line-primary" href="<?php echo DT_PATH;?>about/contact.html" target="_blank">24小时在线客服</a>
</div>
<span class="clear"></span>
  </div>
  <div class="wrapper mt20" id="other_item">
<div id="footer">
<div class="links" style="font-size: 14px;margin-bottom: 10px;">
产品按字母分类：
<?php $LETTER = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');?>
 <?php if(is_array($LETTER)) { foreach($LETTER as $i => $L) { ?><span style="color: #666;"><a href="<?php echo DT_PATH;?>sitemap/index.php?mid=5&letter=<?php echo $L;?>" target="_blank"><?php echo $L;?></a></span><?php } } ?> 
  </div>
 <div class="links">
  <?php echo tag("table=webpage&condition=item=1&areaid=$cityid&order=listorder desc,itemid desc&template=list-webpage");?> 
<a href="<?php echo $MODULE['1']['linkurl'];?>sitemap/">网站地图</a>
 | <a href="<?php echo $EXT['spread_url'];?>">排名推广</a> 
<?php if($EXT['ad_enable']) { ?> | <a href="<?php echo $EXT['ad_url'];?>">广告服务</a><?php } ?>
<?php if($EXT['gift_enable']) { ?> | <a href="<?php echo $EXT['gift_url'];?>" target="_blank" rel="nofollow">积分商城</a><?php } ?>
<?php if($EXT['guestbook_enable']) { ?> | <a href="javascript:SendReport();" rel="nofollow">违规举报</a><?php } ?>
 </div>
<div class="copyright">
<div id="copyright"><?php echo $DT['copyright'];?></div>
<?php if($DT['icpno']) { ?><div><a href="http://www.miibeian.gov.cn" target="_blank" rel="nofollow"><?php echo $DT['icpno'];?></a></div><?php } ?>
<?php if(DT_DEBUG) { ?><div><?php echo debug();?></div><?php } ?>
</div>
<div class="authentication">
<div class="authentication_bg">
<a rel="nofollow" target="_blank" class="cert-1" href="#" title="网络警察"></a>
<a rel="nofollow" target="_blank" class="cert-2" href="#" title="网警备案"></a>
<a rel="nofollow" target="_blank" class="cert-3" href="#" title="网络工商"></a>
<a rel="nofollow" target="_blank" class="cert-4" href="#" title="浙江省网站信用联盟"></a>
<a rel="nofollow" target="_blank" class="cert-5" href="#" title="可信网站"></a>
<a rel="nofollow" target="_blank" class="cert-6" href="/" title="违法和不良信息举报中心"></a>
<a rel="nofollow" target="_blank" class="cert-7" href="/" title="违法和不良信息举报中心APP下载"></a>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include template('zxqq');?>
<?php include template('banquan');?>
<script type="text/javascript">
//全站悬浮右侧
$('.guess').scrollToFixed({
marginTop: $('.small-goods').outerHeight(true) - 345,
limit: function() {
var limit = $('.other_item').offset().top ;
return limit;
},
minWidth: 1000,
zIndex: 999,
fixed: function() {  },
dontCheckForPositionFixedSupport: true
});
//右侧到位自动隐藏
function changeScreen() {
var itemTop = document.getElementById("other_item").offsetTop;
if ($(document).scrollTop() > itemTop - 600) {
$(".guess").hide();
} else if ($(window).width() < 1200) {
$(".guess").hide();
} else {
$(".guess").show();
}
}
$(window).scroll(function() {
changeScreen();
});
$(window).resize(function(e) {
changeScreen();
});
</script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/myjs.js"></script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/topso.js"></script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/scrolltofixed.js"></script>
<script type="text/javascript">
<?php if($destoon_task) { ?>
show_task('<?php echo $destoon_task;?>');
<?php } else { ?>
<?php include DT_ROOT.'/api/task.inc.php';?>
<?php } ?>
<?php if($lazy) { ?>$(function(){$("img").lazyload();});<?php } ?>
</script>
</body>
</html>
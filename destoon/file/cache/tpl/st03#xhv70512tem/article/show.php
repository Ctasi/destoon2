<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="container">
<div class="content_detail">
<div class="tipsh">
<div class="col_detail">
<h2 style="margin-top:20px;font-size: 30px;"><?php echo $title;?></h2>
<script>
function tipgoUrl(mod) {
var obj = mod;
if (obj == "edit") {
return "/user/article_edit//id/1196809.html";
}
else {
return "/user/article_delete//id/1196809.html";
}
}
</script>
<div class="tipshnav" style="margin-top: 20px;">
<div class="fl"><a href="http://bj.dm67.com/" target="_blank">首页</a> &gt;&gt; <a href="http://bj.dm67.com/" target="_blank">北京DM67信息网</a> &gt;&gt; <a href="http://bj.dm67.com/dm67/?citx=25" target="_blank">北京商务服务</a></div>
<div class="fr f9">发布时间：<?php echo date('Y-m-d  h:i:sa',$addtime)?>&nbsp;</div>
<div style="clear:both;"></div>
</div>
<div class="tipshnr">
<div id="tip_msg_3_s" class="tipsempty info_fail" style="padding: 8px 0px 8px 0px">
<!--<span class="fb f14">以下是“<strong>公司年检都是什么流程和费用</strong>”信息发布人联系方式：</span>-->
<!--<p class="fred lh22">提示:要求提前汇款或缴纳定金或保证金的均属诈骗,经网站核实的被举报信息,将在第一时间删除,构建一个安全的免费发布信息平台!</p>-->
<div class="mq4"></div>
<div class="tipshnr_link">
<table width="100%" class="table_detail">
<tbody><tr>
<td><span class="fb"><strong>作者：</strong></span><?php echo $editor;?></td>
<!--<td><span class="fred fb fs"><strong>联 系 人</strong>：</span>李洁</td>-->
</tr>
<!--<tr>-->
<!--<td><span class="fb"><strong>单位名称：</strong></span>经典世纪投资顾问有限公司</td>-->
<!--<td><span class="fred fb"><strong>联系电话：</strong></span>18911744094</td>-->
<!--</tr>-->
<!--<tr>-->
<!--<td><span class="fb"><strong>所在城市：</strong></span>北京</td>-->
<!--<td><span class="fred fb"><strong>联系邮箱：</strong></span>1139731202@qq.com</td>-->
<!--</tr>-->
<!--<tr>-->
<!--<td colspan="4"><span class="fb">联系我时请说明是从DM67信息网看到的，这样我会给你最大的优惠！</span></td>-->
<!--</tr>-->
</tbody></table>
</div>
</div>
<div id="tip_msg_3_s" class="tipsempty info_fail" style="padding: 8px 0px 8px 0px;background:#F1F1F1;">
<b>核心提示：</b><?php echo $introduce;?>
</div>
<div style="padding-top: 8px; padding-bottom: 8px;">
</div>
<div id="tip_msg_1_s" class="con tipsempty">
<?php include template('content', 'chip');?>
</div>
<div id="tip_msg_2_s" class="con tipsempty">
<div class="mq"></div>
</div>
<table width="98%">
<tbody><tr>
<td>
<div class="bdsharebuttonbox bdshare-button-style1-16" data-bd-bind="1559788052797"><a class="bds_more" href="http://bj.dm67.com/dm67.php?dm=1196809#" data-cmd="more">分享到：</a><a class="bds_mshare" title="分享到一键分享" href="http://bj.dm67.com/dm67.php?dm=1196809#" data-cmd="mshare">一键分享</a><a class="bds_qzone" title="分享到QQ空间" href="http://bj.dm67.com/dm67.php?dm=1196809#" data-cmd="qzone">QQ空间</a><a class="bds_tsina" title="分享到新浪微博" href="http://bj.dm67.com/dm67.php?dm=1196809#" data-cmd="tsina">新浪微博</a><a class="bds_tqq" title="分享到腾讯微博" href="http://bj.dm67.com/dm67.php?dm=1196809#" data-cmd="tqq">腾讯微博</a><a class="bds_renren" title="分享到人人网" href="http://bj.dm67.com/dm67.php?dm=1196809#" data-cmd="renren">人人网</a><a class="bds_weixin" title="分享到微信" href="http://bj.dm67.com/dm67.php?dm=1196809#" data-cmd="weixin">微信</a><a class="bds_baidu" title="分享到百度搜藏" href="http://bj.dm67.com/dm67.php?dm=1196809#" data-cmd="baidu">百度搜藏</a></div>
<script>window._bd_share_config = { "common": { "bdSnsKey": {}, "bdText": "", "bdMini": "2", "bdMiniList": false, "bdPic": "", "bdStyle": "1", "bdSize": "16" }, "share": { "bdSize": 16 } }; with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];</script>
</td>
</tr>
</tbody></table>
</div>
<div class="mq"></div>
<div class="mq"></div>
<style>
.tipsh_tonglei h3 span { color: #dedada; padding-right: 10px; }
.tipsh_tonglei h3 span a { color: #666; }
</style>
<div class="tipsh_tonglei">
<h3><span class="fr f12  fnb"><a href="http://bj.dm67.com/" target="_blank" rel="nofollow"></a></span>最新公司新闻</h3>
<div class="nr">
<?php if(is_array($news_lists)) { foreach($news_lists as $c) { ?>
<p><span class="fs">·</span><a href="<?php echo $c['linkurl'];?>" title="<?php echo $c['title'];?>"><?php echo $c['title'];?></a></p>
<?php } } ?>
</div>
</div>
<div class="tipsh_tonglei">
<h3>最新供应</h3>
<div class="nr">
<?php $tags = tag("moduleid=5&order=addtime desc&template=null")?>
<?php if(is_array($tags)) { foreach($tags as $d) { ?>
<p><a href="<?php echo $d['linkurl'];?>" target="_blank"><?php echo $d['title'];?></a></p>
<?php } } ?>
</div>
</div>
</div>
<div class="col2_detail">
<div class="tiprightinfo">
<div class="con">
<ul style="padding-left: 10px;">
<?php $tags = tag("moduleid=21&template=null")?>
<?php if(is_array($tags)) { foreach($tags as $m) { ?>
<!--<li>[<a href="http://bj.dm67.com/dm67/?citx=25" class="f6">商务服务</a>]&nbsp;<a href="http://bj.dm67.com/dm67.php?dm=1196825" class="f6" title="转让北京市门头沟区特种工程">转让北京市门头沟区特种工程</a></li>-->
<li  style="font-size: 12px"><a href="<?php echo $m['linkurl'];?>" class="f6" title="<?php echo $m['title'];?>"  style="display:inline-block;font-size: 12px;width:202px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;"><?php echo $m['title'];?></a>&nbsp;&nbsp;&nbsp;[ <?php echo date('Y-m-d',$m['addtime']);?> ]</li>
<?php } } ?>
</ul>
<div style="clear:both;"></div>
</div>
</div>
</div>
<div style="clear:both;"></div>
</div>
</div>
</div>
<script type="text/javascript">
document.body.oncopy = function () {
setTimeout(function () {
var text = getClipboard();
if (text) {
text = text + "\r\n详细出处参考：" + document.location.href;
copy2Clipboard(text);
}
}, 100)
}
function copyfUrl() {
var clipBoardContent = "公司年检都是什么流程和费用" + "\r\n详细出处参考：" + document.location.href;
window.clipboardData.setData("Text", clipBoardContent);
alert("复制地址成功,赶快发送给您的客户吧!");
}
</script>
<?php if($content) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script><?php } ?>
<?php include template('footer');?>
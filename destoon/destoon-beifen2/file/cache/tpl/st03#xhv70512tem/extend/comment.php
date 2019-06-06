<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($iframe) { ?>
<!doctype html>
<html>
<head>
<meta charset="<?php echo DT_CHARSET;?>"/>
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?><?php echo $DT['sitename'];?><?php } ?></title>
<?php if($head_keywords) { ?>
<meta name="keywords" content="<?php echo $head_keywords;?>"/>
<?php } ?>
<?php if($head_description) { ?>
<meta name="description" content="<?php echo $head_description;?>"/>
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>comment.css"/>
<style type="text/css">
* {word-break:break-all;font-family:Tahoma,Verdana,Arial;-webkit-text-size-adjust:none;}/*"Microsoft Yahei",*/
body {margin:0;font-size:12px;color:#333333;background:#FFFFFF;}
form,input,select,textarea,td,th {font-size:12px;}
img {border:none;}
a:link,a:visited,a:active {color:#333333;text-decoration:none;}
a:hover {color:#FF6600;}
.f_r {float:right;}
.f_red {color:red;}
.btn-blue{color:#FFFFFF;font-size:14px;width:100px;line-height:32px;border:none;border-radius:4px;text-align:center;cursor:pointer;padding:0;-webkit-appearance:none;background:#007AFF;border:#1E74D0 1px solid;color:#FFFFFF;}
.btn-blue:hover{background:#0569D5;}
</style>
<script type="text/javascript" src="<?php echo DT_STATIC;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
<!--[if lte IE 9]><!-->
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery-1.5.2.min.js"></script>
<!--<![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery-2.1.1.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/page.js"></script>
<script type="text/javascript">if(parent.location == window.location) Go('<?php echo $linkurl;?>');</script>
</head>
<body oncontextmenu="return false">
<div id="destoon_space" style="display:none;"></div>
<iframe id="proxy_iframe" src="" style="display:none;"></iframe>
<div id="destoon_comment">
<?php if($template == 'close') { ?>
<div class="comment_close">[该评论已关闭]</div>
<?php } else { ?>
<a name="top"></a>
<div class="stat">
<table cellpadding="6" cellspacing="1" width="100%">
<tr align="center">
<td width="100">好评 <img src="<?php echo DT_STATIC;?>file/image/star3.gif" width="36" height="12" alt="" align="absmiddle"/> </td>
<td><div class="stat_p"><div style="width:<?php echo $stat['pc3'];?>;"></div></div></td>
<td class="stat_c" width="100"><?php echo $stat['pc3'];?></td>
<td class="stat_t" width="80" bgcolor="#E1F0FB"><?php echo $stat['star3'];?></td>
</tr>
<tr align="center">
<td>中评 <img src="<?php echo DT_STATIC;?>file/image/star2.gif" width="36" height="12" alt="" align="absmiddle"/></td>
<td><div class="stat_p"><div style="width:<?php echo $stat['pc2'];?>;"></div></div></td>
<td><?php echo $stat['pc2'];?></td>
<td bgcolor="#F2F8FD"><?php echo $stat['star2'];?></td>
</tr>
<tr align="center">
<td>差评 <img src="<?php echo DT_STATIC;?>file/image/star1.gif" width="36" height="12" alt="" align="absmiddle"/></td>
<td><div class="stat_p"><div style="width:<?php echo $stat['pc1'];?>;"></div></div></td>
<td><?php echo $stat['pc1'];?></td>
<td bgcolor="#F9FCFE"><?php echo $stat['star1'];?></td>
</tr>
</table>
</div>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div class="comment<?php if($k%2==0) { ?> comment_sp<?php } ?>">
<table>
<tr>
<td class="comment_l" valign="top">
<div>
<?php if($v['uname']) { ?><a href="<?php echo userurl($v['uname']);?>" target="_blank"><?php } ?><img src="<?php echo useravatar($v['uname']);?>"  width="48" height="48" alt="" align="absmiddle"/><?php if($v['uname']) { ?></a><?php } ?>
</div>
</td>
<td valign="top">
<div class="comment_title">
<span class="comment_floor">第 <strong><?php echo $v['floor'];?></strong> 楼</span>
<span id="i_<?php echo $v['itemid'];?>"><?php echo $v['name'];?> 于 <span class="comment_time"><?php echo $v['addtime'];?></span> 评论道：</span>
</div>
<div class="comment_content" id="c_<?php echo $v['itemid'];?>"><?php if($v['quotation']) { ?><?php echo $v['quotation'];?><?php } else { ?><?php echo $v['content'];?><?php } ?></div>
<?php if($v['reply']) { ?>
<div class="comment_reply">
<?php if($v['editor']) { ?><span style="color:red;">管理员</span><?php } else { ?><span style="color:blue;"><?php echo $v['replyer'];?></span><?php } ?> <span style="font-size:11px;"><?php echo $v['replytime'];?></span> 回复： <?php echo nl2br($v['reply']);?>
</div>
<?php } ?>
<div class="comment_info">
<span class="comment_vote">
<?php if($could_del) { ?>
<a href="?mid=<?php echo $mid;?>&itemid=<?php echo $itemid;?>&page=<?php echo $page;?>&action=delete&cid=<?php echo $v['itemid'];?>&proxy=<?php echo $proxy;?>" target="send" onclick="return confirm('确定要删除此评论吗？')">删除</a>&nbsp; | &nbsp;
<?php } ?>
<?php if($MOD['comment_vote']) { ?>
<a href="javascript:" onclick="R(<?php echo $v['itemid'];?>);">举报</a>&nbsp; | &nbsp;
<a href="javascript:" onclick="V(<?php echo $v['itemid'];?>, 1, <?php echo $v['agree'];?>);">支持</a>(<span id="v_<?php echo $v['itemid'];?>_1"><?php echo $v['agree'];?></span>)&nbsp; | &nbsp;
<a href="javascript:" onclick="V(<?php echo $v['itemid'];?>, 0, <?php echo $v['against'];?>);">反对</a>(<span id="v_<?php echo $v['itemid'];?>_0"><?php echo $v['against'];?></span>)&nbsp; | &nbsp;
<?php } ?>
<a href="javascript:" onclick="Q(<?php echo $v['itemid'];?>);">引用</a>(<?php echo $v['quote'];?>)
</span>
<img src="<?php echo DT_STATIC;?>file/image/star<?php echo $v['star'];?>.gif" width="36" height="12" alt="" align="absmiddle"/>
</div>
</td>
</tr>
</table>
</div>
<?php } } ?>
<a name="last"></a>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<iframe src="" name="send" id="send" style="display:none;" scrolling="no" frameborder="0"></iframe>
<div class="comment_form">
<form method="post" action="comment.php" target="send" onsubmit="return C();">
<input type="hidden" name="proxy" value="<?php echo $proxy;?>"/>
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="items" value="<?php echo $items;?>"/>
<input type="hidden" name="page" value="<?php echo $page;?>"/>
<input type="hidden" name="qid" value="0" id="qid"/>
<input type="hidden" name="submit" value="1"/>
<table cellpadding="10" cellspacing="1" width="100%">
<tr>
<td id="qbox" style="display:none;" bgcolor="#F9FCFE"></td>
</tr>
<tr>
<td>
<span class="f_r">
<input type="radio" name="star" value="3" id="star_3" checked/><label for="star_3"> 好评 <img src="<?php echo DT_STATIC;?>file/image/star3.gif" width="36" height="12" alt="" align="absmiddle"/></label>
<input type="radio" name="star" value="2" id="star_2"/><label for="star_2"> 中评 <img src="<?php echo DT_STATIC;?>file/image/star2.gif" width="36" height="12" alt="" align="absmiddle"/></label>
<input type="radio" name="star" value="1" id="star_1"/><label for="star_1"> 差评 <img src="<?php echo DT_STATIC;?>file/image/star1.gif" width="36" height="12" alt="" align="absmiddle"/></label>
</span>
<img src="<?php echo DT_STATIC;?>file/image/face.gif" title="插入表情" class="face" onclick="face_show();"/>
<div id="face" style="display:none;">
<div><span onclick="face_hide();" title="点击关闭" class="sc">x</span><strong>选择表情</strong></div>
<?php if($faces) { ?>
<table cellspacing="0" cellpadding="0" title="点击选择">
<?php if(is_array($faces)) { foreach($faces as $k => $v) { ?>
<?php if($k%10==0) { ?><tr><?php } ?>
<td><img src="<?php echo DT_STATIC;?>file/face/<?php echo $v;?>.gif" onclick="face_into('<?php echo $v;?>');"/></td>
<?php if($k%10==9) { ?></tr><?php } ?>
<?php } } ?>
</table>
<?php } ?>
</div>
</td>
</tr>
<tr>
<td><textarea class="comment_area" onfocus="F();face_hide();" onkeyup="S();" name="content" id="content" style="resize:none;"></textarea></td>
</tr>
<?php if($need_captcha) { ?>
<tr id="tr_captcha" style="display:none;">
<td>
<div class="comment_input">
<table cellpadding="0" cellspacing="0">
<tr>
<td>&nbsp;<span>*</span> 验证码：</td>
<td>&nbsp;<?php include template('captcha', 'chip');?> <span class="f_red" id="dcaptcha"></span></td>
</tr>
</table>
</div>
</td>
</tr>
<?php } ?>
<tr>
<td>
<input type="submit" name="submit" value="我来说两句" class="btn-blue"/>
&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="hidden" value="1"/> 匿名发表
&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#666666;">(内容限<?php echo $MOD['comment_min'];?>至<?php echo $MOD['comment_max'];?>字)
&nbsp;&nbsp;&nbsp;&nbsp;当前已经输入 <span style="color:red;" id="chars">0</span> 字
&nbsp;&nbsp;&nbsp;&nbsp;<span class="f_red" id="dcontent"></span>
</span>
</td>
</tr>
</table>
</form>
</div>
<?php } ?>
</div>
<script style="text/javascript">
<?php if($template == 'comment') { ?>
function face_show(){
$('#face').toggle();F();
}
function face_hide(){
$('#face').hide();
}
function face_into(s){
Dd('content').value+=':'+s+')';
}
function R(id) {
SendReport('评论举报，评论ID:'+id+'\n评论内容:\n'+Dd('c_'+id).innerHTML);
}
<?php if($MOD['comment_vote']) { ?>
var v_id = 0;
var v_op = 1;
var v_nm = 0;
function V(id, op, nm) {
v_id = id;
v_op = op;
v_nm = nm;
if(get_cookie('comment_vote_<?php echo $mid;?>_<?php echo $itemid;?>_'+id)) {
alert('您已经对此评论表过态了');
return;
}
$.post('comment.php', 'action=vote&mid=<?php echo $mid;?>&itemid=<?php echo $itemid;?>&cid='+id+'&op='+op, function(data) {
if(data == -2) {
alert('抱歉，您没有投票权限');
} else if (data == -1) {
alert('您已经对此评论表过态了');
} else if (data == 0) {
alert('参数错误，如有疑问请联系管理员');
} else if (data == 1) {
if(v_op == 1) {
Inner('v_'+v_id+'_1', ++v_nm);
} else {
Inner('v_'+v_id+'_0', ++v_nm);
}
}
});
}
<?php } ?>
function Q(qid){
  Dd('qid').value = qid;
  Ds('qbox');
  Dd('qbox').innerHTML = '&nbsp;<strong>引用:</strong><div class="comment_title">'+Dd('i_'+qid).innerHTML+'</div><div class="comment_content">'+Dd('c_'+qid).innerHTML+'</div>';
  H();
  Dd('content').focus();
}
function S() {
Inner('chars', Dd('content').value.length);
}
function C() {
var user_status = <?php echo $user_status;?>;
if(user_status == 1) {
alert('您的会员组没有评论权限');
return false;
}
if(user_status == 2) {
if(confirm('您还没有登录,是否现在登录?')) {
top.location = '<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_login'];?>?forward=<?php echo urlencode($linkurl);?>';
}
return false;
}
if(Dd('content').value.length < <?php echo $MOD['comment_min'];?>) {
Dmsg('内容最少<?php echo $MOD['comment_min'];?>字', 'content');
return false;
}
if(Dd('content').value.length > <?php echo $MOD['comment_max'];?>) {
Dmsg('内容最多<?php echo $MOD['comment_max'];?>字', 'content');
return false;
}
<?php if($need_captcha) { ?>
f = 'captcha';
if($('#c'+f).html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的验证码', f);
Ds('tr_captcha');
return false;
}
<?php } ?>
return true;
}
function F() {
<?php if($need_captcha) { ?>
Ds('tr_captcha');
<?php } ?>
H();
}
try{parent.Dd('comment_count').innerHTML = <?php echo $items;?>;}catch(e){}
<?php } ?>
function H() {
Dd('proxy_iframe').src = '<?php if($proxy) { ?><?php echo decrypt($proxy, DT_KEY.'PROXY');?><?php } else { ?><?php echo $MODULE[$mid]['linkurl'];?><?php } ?>ajax.php?action=proxy&itemid=1#'+Dd('destoon_comment').scrollHeight+'|<?php echo $items;?>';
}
H();
</script> 
</body>
</html>
<?php } else { ?>
<?php include template('header');?>
<div id="destoon_space" style="display:none;"></div>
<div class="m">
<div class="nav bd-b"><span class="f_r"><a href="javascript:;" class="b" onclick="Golast();">发表评论</a></span><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MODULE[$mid]['linkurl'];?>"><?php echo $MODULE[$mid]['name'];?></a> <i>&gt;</i> <a href="<?php echo $linkurl;?>"><?php echo $title;?></a> <i>&gt;</i> 评论列表</div>
</div>
<?php if($EXT['comment_api'] == 'changyan') { ?>
<div class="m">
<div class="b20"></div>
<div id="SOHUCS" sid="<?php echo $mid;?>-<?php echo $itemid;?>"></div>
<script charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/changyan.js" ></script>
<script type="text/javascript">
window.changyan.api.config({
appid: '<?php echo $EXT['comment_api_id'];?>',
conf: '<?php echo $EXT['comment_api_key'];?>'
});
</script>
</div>
<?php } else if($EXT['comment_api'] == 'duoshuo') { ?>
<div class="m">
<div class="b20"></div>
<div class="ds-thread" data-thread-key="<?php echo $mid;?>-<?php echo $itemid;?>" data-title="<?php echo $title;?>" data-url="<?php echo $linkurl;?>" data-image="<?php if($thumb) { ?><?php echo str_replace('.thumb.'.file_ext($thumb), '', $thumb);?><?php } ?>"></div>
<script type="text/javascript">
var duoshuoQuery = {short_name:"<?php echo $EXT['comment_api_id'];?>"};
(function() {
var ds = document.createElement('script');
ds.type = 'text/javascript';ds.async = true;
ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
ds.charset = 'UTF-8';
(document.getElementsByTagName('head')[0] 
 || document.getElementsByTagName('body')[0]).appendChild(ds);
})();
</script>
</div>
<?php } else { ?>
<div class="m">
<div id="destoon_comment">
<div class="stat">
<table cellpadding="10" cellspacing="1" width="100%">
<tr align="center">
<td width="100">好评 <img src="<?php echo DT_STATIC;?>file/image/star3.gif" width="36" height="12" alt="" align="absmiddle"/> </td>
<td><div class="stat_p"><div style="width:<?php echo $stat['pc3'];?>;"></div></div></td>
<td class="stat_c" width="100"><?php echo $stat['pc3'];?></td>
<td class="stat_t" width="80" bgcolor="#E1F0FB"><?php echo $stat['star3'];?></td>
</tr>
<tr align="center">
<td>中评 <img src="<?php echo DT_STATIC;?>file/image/star2.gif" width="36" height="12" alt="" align="absmiddle"/></td>
<td><div class="stat_p"><div style="width:<?php echo $stat['pc2'];?>;"></div></div></td>
<td><?php echo $stat['pc2'];?></td>
<td bgcolor="#F2F8FD"><?php echo $stat['star2'];?></td>
</tr>
<tr align="center">
<td>差评 <img src="<?php echo DT_STATIC;?>file/image/star1.gif" width="36" height="12" alt="" align="absmiddle"/></td>
<td><div class="stat_p"><div style="width:<?php echo $stat['pc1'];?>;"></div></div></td>
<td><?php echo $stat['pc1'];?></td>
<td bgcolor="#F9FCFE"><?php echo $stat['star1'];?></td>
</tr>
</table>
</div>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div class="comment<?php if($k%2==0) { ?> comment_sp<?php } ?>">
<table>
<tr>
<td class="comment_l" valign="top">
<div>
<?php if($v['uname']) { ?><a href="<?php echo userurl($v['uname']);?>" target="_blank"><?php } ?><img src="<?php echo useravatar($v['uname']);?>" width="48" height="48" alt="" align="absmiddle"/><?php if($v['uname']) { ?></a><?php } ?>
</div>
</td>
<td valign="top">
<div class="comment_title">
<span class="comment_floor">第 <strong><?php echo $v['floor'];?></strong> 楼</span>
<span id="i_<?php echo $v['itemid'];?>"><?php echo $v['name'];?> 于 <span class="comment_time"><?php echo $v['addtime'];?></span> 评论道：</span>
</div>
<div class="comment_content" id="c_<?php echo $v['itemid'];?>"><?php if($v['quotation']) { ?><?php echo $v['quotation'];?><?php } else { ?><?php echo $v['content'];?><?php } ?></div>
<?php if($v['reply']) { ?>
<div class="comment_reply">
<?php if($v['editor']) { ?><span style="color:red;">管理员</span><?php } else { ?><span style="color:blue;"><?php echo $v['replyer'];?></span><?php } ?> <span style="font-size:11px;"><?php echo $v['replytime'];?></span> 回复： <?php echo nl2br($v['reply']);?>
</div>
<?php } ?>
<div class="comment_info">
<span class="comment_vote">
<?php if($could_del) { ?>
<a href="index.php?mid=<?php echo $mid;?>&itemid=<?php echo $itemid;?>&page=<?php echo $page;?>&action=delete&cid=<?php echo $v['itemid'];?>" target="send" onclick="return confirm('确定要删除此评论吗？')">删除</a>&nbsp; | &nbsp;
<?php } ?>
<?php if($MOD['comment_vote']) { ?>
<a href="javascript:" onclick="R(<?php echo $v['itemid'];?>);">举报</a>&nbsp; | &nbsp;
<a href="javascript:" onclick="V(<?php echo $v['itemid'];?>, 1, <?php echo $v['agree'];?>);">支持</a>(<span id="v_<?php echo $v['itemid'];?>_1"><?php echo $v['agree'];?></span>)&nbsp; | &nbsp;
<a href="javascript:" onclick="V(<?php echo $v['itemid'];?>, 0, <?php echo $v['against'];?>);">反对</a>(<span id="v_<?php echo $v['itemid'];?>_0"><?php echo $v['against'];?></span>)&nbsp; | &nbsp;
<?php } ?>
<a href="javascript:" onclick="Q(<?php echo $v['itemid'];?>);">引用</a>(<?php echo $v['quote'];?>)
</span>
<img src="<?php echo DT_STATIC;?>file/image/star<?php echo $v['star'];?>.gif" width="36" height="12" alt="" align="absmiddle"/>
</div>
</td>
</tr>
</table>
</div>
<?php } } ?>
<a name="last"></a>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<iframe src="" name="send" id="send" style="display:none;" scrolling="no" frameborder="0"></iframe>
<div class="comment_form">
<form method="post" action="index.php" target="send" onsubmit="return C();">
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="items" value="<?php echo $items;?>"/>
<input type="hidden" name="page" value="<?php echo $page;?>"/>
<input type="hidden" name="qid" value="0" id="qid"/>
<table cellpadding="8" cellspacing="1" width="100%">
<tr>
<td id="qbox" style="display:none;" bgcolor="#F9FCFE"></td>
</tr>
<tr>
<td>
<span class="f_r">
<input type="radio" name="star" value="3" id="star_3" checked/><label for="star_3"> 好评 <img src="<?php echo DT_STATIC;?>file/image/star3.gif" width="36" height="12" alt="" align="absmiddle"/></label>
<input type="radio" name="star" value="2" id="star_2"/><label for="star_2"> 中评 <img src="<?php echo DT_STATIC;?>file/image/star2.gif" width="36" height="12" alt="" align="absmiddle"/></label>
<input type="radio" name="star" value="1" id="star_1"/><label for="star_1"> 差评 <img src="<?php echo DT_STATIC;?>file/image/star1.gif" width="36" height="12" alt="" align="absmiddle"/></label>
</span>
<img src="<?php echo DT_STATIC;?>file/image/face.gif" title="插入表情" class="face" onclick="face_show();"/>
<div id="face" style="display:none;">
<div><span onclick="face_hide();" title="点击关闭" class="sc">x</span><strong>选择表情</strong></div>
<?php if($faces) { ?>
<table cellspacing="0" cellpadding="0" title="点击选择">
<?php if(is_array($faces)) { foreach($faces as $k => $v) { ?>
<?php if($k%10==0) { ?><tr><?php } ?>
<td><img src="<?php echo DT_STATIC;?>file/face/<?php echo $v;?>.gif" onclick="face_into('<?php echo $v;?>');"/></td>
<?php if($k%10==9) { ?></tr><?php } ?>
<?php } } ?>
</table>
<?php } ?>
</div>
</td>
</tr>
<tr>
<td><textarea class="comment_area" onfocus="F();face_hide()" onkeyup="S();" name="content" id="content" placeholder="请输入评论内容"></textarea></td>
</tr>
<?php if($need_captcha) { ?>
<tr id="tr_captcha" style="display:none;">
<td>
<div class="comment_input">
<table cellpadding="0" cellspacing="0">
<tr>
<td>&nbsp;<span>*</span> 验证码：</td>
<td>&nbsp;<?php include template('captcha', 'chip');?> <span class="f_red" id="dcaptcha"></span></td>
</tr>
</table>
</div>
</td>
</tr>
<?php } ?>
<tr>
<td>
<input type="submit" name="submit" value="我来说两句" class="btn-blue"/>
&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="hidden" value="1"/> 匿名发表
&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#666666;">(内容限<?php echo $MOD['comment_min'];?>至<?php echo $MOD['comment_max'];?>字)
&nbsp;&nbsp;&nbsp;&nbsp;当前已经输入 <span style="color:red;" id="chars">0</span> 字
&nbsp;&nbsp;&nbsp;&nbsp;<span class="f_red" id="dcontent"></span>
</span>
</td>
</tr>
</table>
</form>
</div>
</div>
</div>
<script style="text/javascript">
function Golast() {
$('html,body').animate({scrollTop:$("[name='last']").offset().top}, 500);
Dd('content').focus();
}
function face_show(){
$('#face').toggle();F();
}
function face_hide(){
$('#face').hide();
}
function face_into(s){
Dd('content').value+=':'+s+')';
}
function R(id) {
SendReport('评论举报，评论ID:'+id+'\n评论内容:\n'+Dd('c_'+id).innerHTML);
}
<?php if($MOD['comment_vote']) { ?>
var v_id = 0;
var v_op = 1;
var v_nm = 0;
function V(id, op, nm) {
v_id = id;
v_op = op;
v_nm = nm;
if(get_cookie('comment_vote_<?php echo $mid;?>_<?php echo $itemid;?>_'+id)) {
alert('您已经对此评论表过态了');
return;
}
$.post('index.php', 'action=vote&mid=<?php echo $mid;?>&itemid=<?php echo $itemid;?>&cid='+id+'&op='+op, function(data) {
if(data == -2) {
alert('抱歉，您没有投票权限');
} else if (data == -1) {
alert('您已经对此评论表过态了');
} else if (data == 0) {
alert('参数错误，如有疑问请联系管理员');
} else if (data == 1) {
if(v_op == 1) {
Inner('v_'+v_id+'_1', ++v_nm);
} else {
Inner('v_'+v_id+'_0', ++v_nm);
}
}
});
}
<?php } ?>
function Q(qid){
  Dd('qid').value = qid;
  Ds('qbox');
  Dd('qbox').innerHTML = '&nbsp;<strong>引用:</strong><div class="comment_title">'+Dd('i_'+qid).innerHTML+'</div><div class="comment_content">'+Dd('c_'+qid).innerHTML+'</div>';
  Dd('content').focus();
}
function S() {
Inner('chars', Dd('content').value.length);
}
function C() {
var user_status = <?php echo $user_status;?>;
if(user_status == 1) {
alert('您的会员组没有评论权限');
return false;
}
if(user_status == 2) {
if(confirm('您还没有登录,是否现在登录?')) {
top.location = '<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_login'];?>?forward=<?php echo urlencode($linkurl);?>';
}
return false;
}
if(Dd('content').value.length < <?php echo $MOD['comment_min'];?>) {
Dmsg('内容最少<?php echo $MOD['comment_min'];?>字', 'content');
return false;
}
if(Dd('content').value.length > <?php echo $MOD['comment_max'];?>) {
Dmsg('内容最多<?php echo $MOD['comment_max'];?>字', 'content');
return false;
}
<?php if($need_captcha) { ?>
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsg('请填写验证码', 'captcha');
Ds('tr_captcha');
return false;
}
<?php } ?>
return true;
}
function F() {
<?php if($need_captcha) { ?>
Ds('tr_captcha');
<?php } ?>
}
</script>
<?php } ?>
<?php include template('footer');?>
<?php } ?>
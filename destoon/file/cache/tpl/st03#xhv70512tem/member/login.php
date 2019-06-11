<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header-login', 'member');?>
<style>
* {
margin: 0px; padding: 0px; border: 0px currentColor; border-image: none; color: rgb(102, 102, 102); font-family: "΢���ź�"; font-size: 16px; box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box;
}
.bgone {
margin: auto; left: 0px; top: 0px; width: 100%; height: 100%; right: 0px; bottom: 0px; position: absolute;
}
.pic {
margin: auto; left: 0px; top: 46px; width: 492px; height: auto; right: 453px; bottom: 0px; position: absolute; z-index: 99999;
}
.table {
margin: auto; left: 0px; top: 20%; width: 960px; height: 465px; right: 0px; bottom: 0px; position: absolute; background-color: rgb(255, 255, 255);
}
.password {
top: 12.8rem; right: 4rem; display: flex; position: absolute;
}
.btn {
border-radius: 10px; border: currentColor; border-image: none; top: 22.5rem; width: 373px; height: 50px; text-align: center; right: 3.9rem; color: rgb(255, 255, 255); text-indent: 0rem; font-size: 20px; position: absolute; box-shadow: 2px 2px 1px rgba(0,0,0,0.2); text-shadow: 2px 2px 1px rgba(0,0,0,0.2); background-color: rgb(21, 146, 239);
}
.wel {
top: -7rem; width: 960px; height: 35px; text-align: center; color: rgb(255, 255, 255); font-size: 30px; position: absolute;
}
.wel1 {
top: -4rem; width: 960px; height: 35px; text-align: center; color: rgb(255, 255, 255); font-size: 12.38px; position: absolute;
}
input {
background: rgb(238, 246, 253); width: 373px; height: 55px; text-indent: 55px; border-bottom-color: rgb(214, 231, 250); border-bottom-width: 2px; border-bottom-style: solid;
}
.password input {
border: 0px currentColor; border-image: none;
}
.user {
top: 7.8rem; right: 4rem; display: flex; position: absolute;
}
#yonghu img {
left: 10px; top: 13px; height: 30px; position: absolute;
}
.title {
top: 5.8rem;
right: 23rem;
display: flex;
position: absolute;
}
.code {
top: 16.8rem;
right: 4rem;
display: flex;
position: absolute;
}
</style>
<?php echo DT_SKIN?>
<IMG class="bgone" src="<?php echo DT_SKIN;?>image/zc/1.jpg" height="800px"> <IMG class="pic" src="<?php echo DT_SKIN;?>image/zc/a.png">
<div style="width:100%;height:800px;position:relative;">
<div class="m table" style="padding:32px 0;overflow: hidden;top:-3%">
<DIV class="wel">某某系统后台登录</DIV>
<DIV class="wel1">MOU MOU XI TONG HUO TAI DENG LU</DIV>
<div class="title">
<ul>
<li<?php if($action=='login') { ?> class="on"<?php } ?>><a href="?action=login&forward=<?php echo $_forward;?>">帐号登录</a></li>
<?php if($could_sms) { ?><li<?php if($action=='sms') { ?> class="on"<?php } ?>><a href="?action=sms&forward=<?php echo $_forward;?>">短信登录</a></li><?php } ?>
<?php if($could_scan) { ?><li<?php if($action=='scan') { ?> class="on"<?php } ?>><a href="?action=scan&forward=<?php echo $_forward;?>">扫码登录</a></li><?php } ?>
</ul>
</div>
<?php if($action == 'scan') { ?>
<div id="weixin_qrcode"></div>
<script src="//res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js"></script>
<script type="text/javascript">
var obj = new WxLogin({
id:"weixin_qrcode",
appid: "<?php echo WX_ID;?>",
scope: "snsapi_login",
redirect_uri: "<?php echo urlencode(WX_CALLBACK);?>",
state: "",
style: "",
href: "<?php echo DT_PATH;?>api/oauth/wechat/style.css"
});
</script>
<?php } else if($action == 'sms') { ?>
<form method="post" action="?" onsubmit="return Scheck();">
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<DIV class="user">
<input name="mobile" type="text" id="mobile" placeholder="已认证手机号" class="input-mob"/>
<DIV id="yonghu"><IMG
src="<?php echo DT_SKIN;?>image/zc/yhm.png"></DIV><INPUT type="text" placeholder="用户名" value="">
</DIV>
<DIV class="password">
<div><?php include template('captcha', 'chip');?></div>
<div>&nbsp;&nbsp;<a href="javascript:;" class="b" onclick="Dsend();" id="send">发送短信</a></div>
<div><input name="code" type="text" id="code" placeholder="短信验证码" class="input-code"/></div>
<div><input type="submit" name="submit" value="登 录" class="btn-blue login-btn"/></div>
</DIV>
</form>
<?php } else { ?>
<form method="post" action="?" onsubmit="return Dcheck();">
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="auth" value="<?php echo $auth;?>"/>
<DIV class="user">
<DIV id="yonghu"><IMG
src="<?php echo DT_SKIN;?>image/zc/yhm.png"></DIV><input name="username" type="text" id="username" value="<?php echo $username;?>" placeholder="用户名/Email/已认证手机" />
</DIV>
<DIV class="password">
<DIV id="yonghu"><IMG src="<?php echo DT_SKIN;?>image/zc/mm.png"></DIV><input name="password" type="password" id="password" value="" placeholder="密码"/>
</DIV><INPUT name="submit" class="btn  btn-blue login-btn" type="submit" value="登录">
<div class="t_c f_gray"><a href="<?php echo $DT['file_register'];?>" class="b">会员注册</a> &nbsp;|&nbsp; <a href="send.php" class="b">忘记密码</a></div>
<?php if($MOD['captcha_login']) { ?><div class="code"><?php include template('captcha', 'chip');?></div><?php } ?>
<?php if($oa) { ?><div title="使用社交帐号登录" class="login-oauth">
<?php if(is_array($OAUTH)) { foreach($OAUTH as $k => $v) { ?>
<?php if($v['enable']) { ?><a href="<?php echo DT_PATH;?>api/oauth/<?php echo $k;?>/connect.php" title="<?php echo $v['name'];?>"><img src="<?php echo DT_PATH;?>api/oauth/<?php echo $k;?>/icon.png" alt="<?php echo $v['name'];?>"/></a><?php } ?>
<?php } } ?>
</div><?php } ?>
</form>
<?php } ?>
<style>
#captcha {
 width: 263px; height: 55px; text-indent: 22px; border-bottom-color: rgb(214, 231, 250); border-bottom-width: 2px; border-bottom-style: solid;
}
.f_gray {
top: 20.8rem;
right: 18rem;
display: flex;
position: absolute;
}
.ccaptcha {
margin-right: -24px;
}
</style>
</DIV>
<div class="c_b"></div>
</div>
</div>
<script type="text/javascript">
function Dmsgs(msg) {
$('#msgs').html(msg);
$('#msgs').fadeIn(100, function() {
setTimeout(function() {$('#msgs').fadeOut(300);}, 3000);
});
}
function Dcheck() {
if(Dd('username').value.length < 2) {
Dmsgs('请输入登录名称');
Dd('username').focus();
return false;
}
if(Dd('password').value.length < 6) {
Dmsgs('请输入密码');
Dd('password').focus();
return false;
}
<?php if($MOD['captcha_login']) { ?>
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsgs('请填写验证码');
Dd('captcha').focus();
return false;
}
<?php } ?>
return true;
}
function Scheck() {
if(Dd('mobile').value.length < 11) {
Dmsgs('请输入手机号码');
Dd('mobile').focus();
return false;
}
if(Dd('code').value.length < 6) {
Dmsgs('请输入短信验证码');
Dd('code').focus();
return false;
}
return true;
}
function Dstop() {
var i = 180;
var interval=window.setInterval(
function() {
if(i == 0) {
$('#send').html('发送短信');
clearInterval(interval);
} else {
$('#send').html('重新发送('+i+'秒)');
i--;
}
},
1000);
}
function Dsend() {
if($('#send').html().indexOf('秒') != -1) {
Dmsgs('请耐心等待');
return false;
}
if(Dd('mobile').value.length < 11) {
Dmsgs('请输入手机号码');
Dd('mobile').focus();
return false;
}
if($('#ccaptcha').html().indexOf('ok.png') == -1) {
Dmsgs('验证码填写错误');
Dd('captcha').focus();
return false;
}
$.post('?', 'action=send&mobile='+Dd('mobile').value+'&captcha='+Dd('captcha').value, function(data) {
if(data == 'ok') {
Dmsgs('短信发送成功');
Dstop();return;
} else if(data == 'format') {
Dmsgs('手机格式错误');
} else if(data == 'captcha') {
Dmsgs('验证码错误');
} else if(data == 'exist') {
Dmsgs('号码不存在或未验证');
} else if(data == 'max') {
Dmsgs('发送次数过多');
} else if(data == 'fast') {
Dmsgs('发送频率过快');
} else {
Dmsgs('发送失败'+data);
}
reloadcaptcha();
});
}
</script>
<?php include template('footer-mini');?>
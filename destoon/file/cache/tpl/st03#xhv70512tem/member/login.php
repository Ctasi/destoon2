<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header-login', 'member');?>
<div class="m" style="padding:32px 0;overflow: hidden;">
<div class="login-show"><img src="<?php echo DT_SKIN;?>image/zc/denglu.jpg" width="820" height="380" alt=""/>&nbsp;</div>
<div class="login-main">
<div id="msgs"></div>
<div class="login-head">
<ul>
<li<?php if($action=='login') { ?> class="on"<?php } ?>><a href="?action=login&forward=<?php echo $_forward;?>">帐号登录</a></li>
<?php if($could_sms) { ?><li<?php if($action=='sms') { ?> class="on"<?php } ?>><a href="?action=sms&forward=<?php echo $_forward;?>">短信登录</a></li><?php } ?>
<?php if($could_scan) { ?><li<?php if($action=='scan') { ?> class="on"<?php } ?>><a href="?action=scan&forward=<?php echo $_forward;?>">扫码登录</a></li><?php } ?>
</ul>
</div>
<div class="login-body">
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
<div><input name="mobile" type="text" id="mobile" placeholder="已认证手机号" class="input-mob"/></div>
<div><?php include template('captcha', 'chip');?></div>
<div>&nbsp;&nbsp;<a href="javascript:;" class="b" onclick="Dsend();" id="send">发送短信</a></div>
<div><input name="code" type="text" id="code" placeholder="短信验证码" class="input-code"/></div>
<div><input type="submit" name="submit" value="登 录" class="btn-blue login-btn"/></div>
</form>
<?php } else { ?>
<form method="post" action="?" onsubmit="return Dcheck();">
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="auth" value="<?php echo $auth;?>"/>
<div><input name="username" type="text" id="username" value="<?php echo $username;?>" placeholder="用户名/Email/已认证手机" class="input-user"/></div>
<div><input name="password" type="password" id="password" value="" placeholder="密码"  class="input-pass"/></div>
<?php if($MOD['captcha_login']) { ?><div><?php include template('captcha', 'chip');?></div><?php } ?>
<div><input type="submit" name="submit" value="登 录" class="btn-blue login-btn"/></div>
<div class="t_c f_gray"><a href="<?php echo $DT['file_register'];?>" class="b">会员注册</a> &nbsp;|&nbsp; <a href="send.php" class="b">忘记密码</a></div>
<?php if($oa) { ?><div title="使用社交帐号登录" class="login-oauth">
<?php if(is_array($OAUTH)) { foreach($OAUTH as $k => $v) { ?>
<?php if($v['enable']) { ?><a href="<?php echo DT_PATH;?>api/oauth/<?php echo $k;?>/connect.php" title="<?php echo $v['name'];?>"><img src="<?php echo DT_PATH;?>api/oauth/<?php echo $k;?>/icon.png" alt="<?php echo $v['name'];?>"/></a><?php } ?>
<?php } } ?>
</div><?php } ?>
</form>
<?php } ?>
</div>
</div>
<div class="c_b"></div>
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
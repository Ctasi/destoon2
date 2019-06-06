<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<?php if($action == 'grade') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab_on"><a href="?action=<?php echo $action;?>"><span>账户升级</span></a></td>
<td class="tab"><a href="grade.php"><span>服务列表</span></a></td>
</tr>
</table>
</div>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="groupid" value="<?php echo $groupid;?>"/>
<table cellspacing="1" cellpadding="10" class="tb">
<tr>
<td class="tl">当前组</td>
<td class="tr"><?php echo $GROUP[$_groupid]['groupname'];?></td>
</tr>
<tr>
<td class="tl">升级为</td>
<td class="tr"><?php echo $GROUP[$groupid]['groupname'];?></td>
</tr>
<?php if($fee>0) { ?>
<tr>
<td class="tl">应付总额</td>
<td class="tr"><span class="f_price px16" id="money"><?php echo $fee;?></span> <?php echo $DT['money_unit'];?></td>
</tr>
<tr id="mymoney" style="display:none;">
<td class="tl">账户余额</td>
<td class="tr"><span class="f_blue"><?php echo $_money;?></span> <?php echo $DT['money_unit'];?></td>
</tr>
<tr id="payword" style="display:none;">
<td class="tl"><span class="f_red">*</span> 支付密码</td>
<td class="tr"><?php include template('password', 'chip');?>&nbsp;<span id="dpassword" class="f_red"></span></td>
</tr>
<tr id="paytype" style="display:none;">
<td class="tl"><span class="f_red">*</span> 支付方式</td>
<td class="tr">
<table cellspacing="5" cellpadding="5">
<?php $PAYLIST = get_paylist();?>
<input type="hidden" name="bank" id="bank" value="<?php echo $PAYLIST['0']['bank'];?>"/>
<?php if(is_array($PAYLIST)) { foreach($PAYLIST as $k => $v) { ?>
<tr onclick="$('#bank').val($('#paytype :checked').val());">
<td><input type="radio" name="bank" value="<?php echo $v['bank'];?>" id="bank-<?php echo $v['bank'];?>"<?php if($k==0) { ?> checked<?php } ?>/></td>
<td><label for="bank-<?php echo $v['bank'];?>" class="c_p"><img src="<?php echo DT_PATH;?>api/pay/<?php echo $v['bank'];?>/logo.gif" alt=""/></label></td>
<td><?php if($v['percent']>0) { ?>手续费 <?php echo $v['percent'];?>%<?php } ?></td>
</tr>
<?php } } ?>
</table>
</td>
</tr>
<?php } else { ?>
<tr>
<td class="tl">公司名称</td>
<td class="tr"><input type="text" name="company" id="company" value="<?php echo $_company;?>" size="50"/> <span id="dcompany" class="f_red"></span></td>
</tr>
<?php } ?>
<tr>
<td class="tl"> </td>
<td class="tr">
<input type="submit" name="submit" value="申请升级" class="btn_g"/>&nbsp;&nbsp;
<input type="button" value="重新选择" class="btn" onclick="Go('grade.php');"/>
</td>
</tr>
</table>
</form>
<?php } else if($action == 'vip') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab_on"><a href="?action=<?php echo $action;?>"><span><?php echo VIP;?>续费</span></a></td>
<td class="tab"><a href="?action=index"><span>账户详情</span></a></td>
</tr>
</table>
</div>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellspacing="1" cellpadding="10" class="tb">
<tr>
<td class="tl">到期时间</td>
<td class="tr"><?php echo $todate;?></td>
</tr>
<tr>
<td class="tl">剩余时间</td>
<td class="tr"><?php echo $havedays;?> 天</td>
</tr>
<tr>
<td class="tl">服务费用</td>
<td class="tr"><span class="f_red"><?php echo $MG['fee'];?></span> <?php echo $DT['money_unit'];?>/年</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 续费年限</td>
<td class="tr">
<select name="year" id="year" onchange="$('#money').html(this.value*<?php echo $MG['fee'];?>);">
<option value="1"<?php if($year == 1) echo ' selected';?>>1年</option>
<option value="2"<?php if($year == 2) echo ' selected';?>>2年</option>
<option value="3"<?php if($year == 3) echo ' selected';?>>3年</option>
</select>
</td>
</tr>
<tr>
<td class="tl">应付总额</td>
<td class="tr"><span class="f_price px16" id="money"><?php echo $fee;?></span> <?php echo $DT['money_unit'];?></td>
</tr>
<tr id="mymoney" style="display:none;">
<td class="tl">账户余额</td>
<td class="tr"><span class="f_blue"><?php echo $_money;?></span> <?php echo $DT['money_unit'];?></td>
</tr>
<tr id="payword" style="display:none;">
<td class="tl"><span class="f_red">*</span> 支付密码</td>
<td class="tr"><?php include template('password', 'chip');?>&nbsp;<span id="dpassword" class="f_red"></span></td>
</tr>
<tr id="paytype" style="display:none;">
<td class="tl"><span class="f_red">*</span> 支付方式</td>
<td class="tr">
<table cellspacing="5" cellpadding="5">
<?php $PAYLIST = get_paylist();?>
<input type="hidden" name="bank" id="bank" value="<?php echo $PAYLIST['0']['bank'];?>"/>
<?php if(is_array($PAYLIST)) { foreach($PAYLIST as $k => $v) { ?>
<tr onclick="$('#bank').val($('#paytype :checked').val());">
<td><input type="radio" name="bank" value="<?php echo $v['bank'];?>" id="bank-<?php echo $v['bank'];?>"<?php if($k==0) { ?> checked<?php } ?>/></td>
<td><label for="bank-<?php echo $v['bank'];?>" class="c_p"><img src="<?php echo DT_PATH;?>api/pay/<?php echo $v['bank'];?>/logo.gif" alt=""/></label></td>
<td><?php if($v['percent']>0) { ?>手续费 <?php echo $v['percent'];?>%<?php } ?></td>
</tr>
<?php } } ?>
</table>
</td>
</tr>
<tr>
<td class="tl"> </td>
<td class="tr" height="50"><input type="submit" name="submit" value="立即续费" class="btn_g"/></td>
</tr>
</table>
</form>
<?php } else { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab_on"><a href="?action=index"><span>帐户详情</span></a></td>
<td class="tab"><a href="grade.php"><span>账户升级</span></a></td>
</tr>
</table>
</div>
<div class="t2">基本资料</div>
<table cellspacing="1" cellpadding="8" class="tb">
<?php if($user['truename']) { ?>
<tr>
<td class="tl">姓名</td>
<td class="tr"><?php echo $user['truename'];?> （<?php if($user['gender']==1) { ?>先生<?php } else { ?>女士<?php } ?>）</td>
</tr>
<?php } ?>
<?php if($_groupid > 5) { ?>
<tr>
<td class="tl">公司</td>
<td class="tr">
<?php if($MG['homepage']) { ?>
<a href="<?php echo $linkurl;?>" target="_blank" class="b"><?php echo $company;?></a>
<?php } else { ?>
<?php echo $company;?>
<?php } ?>
</td>
</tr>
<?php } ?>
<tr>
<td class="tl">会员名</td>
<td class="tr"><?php echo $username;?></td>
</tr>
<tr>
<td class="tl">昵称</td>
<td class="tr"><?php echo $passport;?></td>
</tr>
<tr>
<td class="tl">会员组</td>
<td class="tr"><?php echo $MG['groupname'];?></td>
</tr>
<tr>
<td class="tl">上次登录</td>
<td class="tr"><?php echo timetodate($logintime, 5);?><?php if($DT['login_log']==2) { ?>&nbsp;&nbsp;<a href="record.php?action=login" class="b">登录记录</a><?php } ?></td>
</tr>
<tr>
<td class="tl">注册时间</td>
<td class="tr"><?php echo timetodate($regtime, 5);?></td>
</tr>
<?php if($support) { ?>
<tr>
<td class="tl">客服专员</td>
<td class="tr"><a href="ask.php?action=support" class="b"><?php echo $support;?></a></td>
</tr>
<?php } ?>
<?php if($vip) { ?>
<?php } else if($groupid>4) { ?>
<tr>
<td class="tl"></td>
<td class="tr"><input type="button" value="会员升级" class="btn_g" onclick="Go('grade.php');"/></td>
</tr>
<?php } ?>
</table>
<?php if($vip) { ?>
<div class="t2"><?php echo VIP;?>信息</div>
<table cellspacing="1" cellpadding="8" class="tb">
<tr>
<td class="tl"><?php echo VIP;?>级别</td>
<td class="tr"><img src="<?php echo DT_SKIN;?>image/vip_<?php echo $vip;?>.gif" alt="<?php echo VIP;?>" title="<?php echo VIP;?>:<?php echo $vip;?>级"/></td>
</tr>
<tr>
<td class="tl">服务开始</td>
<td class="tr"><?php echo timetodate($fromtime, 3);?></td>
</tr>
<tr>
<td class="tl">服务结束</td>
<td class="tr"><?php echo timetodate($totime, 3);?></td>
</tr>
<tr>
<td class="tl">剩余时间</td>
<td class="tr"><strong><?php echo $havedays;?></strong> 天</td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr"><input type="button" value="服务续费" class="btn_g" onclick="Go('?action=vip');"/></td>
</tr>
</table>
<?php } ?>
<div class="t2">身份认证</div>
<table cellspacing="1" cellpadding="8" class="tb">
<?php if($MOD['vemail']) { ?>
<tr>
<td class="tl">邮件认证</td>
<td class="tr"><a href="validate.php?action=email"><?php if($vemail) { ?><span class="f_green">已通过</span><?php } else { ?><span class="f_gray">未通过</span><?php } ?></a></td>
</tr>
<?php } ?>
<?php if($MOD['vmobile']) { ?>
<tr>
<td class="tl">手机认证</td>
<td class="tr"><a href="validate.php?action=mobile"><?php if($vmobile) { ?><span class="f_green">已通过</span><?php } else { ?><span class="f_gray">未通过</span><?php } ?></a></td>
</tr>
<?php } ?>
<?php if($MOD['vbank']) { ?>
<tr>
<td class="tl">银行认证</td>
<td class="tr"><a href="validate.php?action=bank"><?php if($vbank) { ?><span class="f_green">已通过</span><?php } else { ?><span class="f_gray">未通过</span><?php } ?></a></td>
</tr>
<?php } ?>
<?php if($MOD['vtruename']) { ?>
<tr>
<td class="tl">实名认证</td>
<td class="tr"><a href="validate.php?action=truename"><?php if($vtruename) { ?><span class="f_green">已通过</span><?php } else { ?><span class="f_gray">未通过</span><?php } ?></a></td>
</tr>
<?php } ?>
<?php if($MOD['vcompany']) { ?>
<tr>
<td class="tl">公司认证</td>
<td class="tr"><a href="validate.php?action=company"><?php if($vcompany) { ?><span class="f_green">已通过</span><?php } else { ?><span class="f_gray">未通过</span><?php } ?></a></td>
</tr>
<?php } ?>
</table>
<?php } ?>
<script type="text/javascript">s('account');</script>
<script type="text/javascript">
<?php if($action == 'grade') { ?>
<?php if($fee > 0) { ?>
var money = <?php echo $fee;?>;
function check() {
if(money > <?php echo $_money;?>) {
Go('charge.php?action=pay&reason=grade|<?php echo $groupid;?>&amount='+money+'&bank='+$('#bank').val());
return false;
}
if(money > <?php echo $DT['quick_pay'];?>){
if(Dd('password').value.length < 6) {
Dmsg('请填写支付密码', 'password');
return false;
}
}
return true;
}
window.setInterval(
function() {
if(money > <?php echo $_money;?> || <?php echo $_money;?> < 0.01) {
$('#mymoney').hide();$('#paytype').show();$('#payword').hide();
} else {
$('#mymoney').show();$('#paytype').hide();if(money > <?php echo $DT['quick_pay'];?>){$('#payword').show();}
}
}, 
500);
<?php } else { ?>
function check() {
if(Dd('company').value.length < 5) {
Dmsg('请填写公司名称', 'company');
return false;
}
return true;
}
<?php } ?>
<?php } else if($action == 'vip') { ?>
function check() {
var money = $('#year').val()*<?php echo $MG['fee'];?>;
if(money > <?php echo $_money;?>) {
Go('charge.php?action=pay&reason=vip|'+$('#year').val()+'&amount='+money+'&bank='+$('#bank').val());
return false;
}
if(money > <?php echo $DT['quick_pay'];?>){
if(Dd('password').value.length < 6) {
Dmsg('请填写支付密码', 'password');
return false;
}
}
return true;
}
window.setInterval(
function() {
var money = $('#year').val()*<?php echo $MG['fee'];?>;
if(money > <?php echo $_money;?> || <?php echo $_money;?> < 0.01) {
$('#mymoney').hide();$('#paytype').show();$('#payword').hide();
} else {
$('#mymoney').show();$('#paytype').hide();if(money > <?php echo $DT['quick_pay'];?>){$('#payword').show();}
}
}, 
500);
<?php } ?>
</script>
<?php include template('footer', 'member');?>
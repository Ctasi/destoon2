<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($user_status == 3) { ?>
<?php if($module == 'exhibit') { ?>
<?php echo $content;?></div>
<div class="head-txt"><strong>联系方式</strong></div>
<div class="content">
联系人：<?php echo $truename;?><br/>
<?php if($addr) { ?>地址：<?php echo $addr;?><br/><?php } ?>
<?php if($postcode) { ?>邮编：<?php echo $postcode;?><br/><?php } ?>
<?php if($mobile) { ?>手机：<?php echo anti_spam($mobile);?><br/><?php } ?>
电话：<?php echo anti_spam($telephone);?><br/>
<?php if($fax) { ?>传真：<?php echo anti_spam($fax);?><br/><?php } ?>
<?php if($email) { ?>Email：<?php echo anti_spam($email);?><br/><?php } ?>
<?php if($qq) { ?>QQ：<?php echo im_qq($qq);?><br/><?php } ?>
<?php if($wx) { ?>微信：<?php echo im_wx($wx, $username);?><br/><?php } ?>
<?php } else if($module == 'job') { ?>
<table cellpadding="6" cellspacing="0" width="100%">
<tr>
<td width="100" align="center">联系手机</td>
<td><?php echo anti_spam($mobile);?></td>
</tr>
<tr>
<td align="center">电子邮件</td>
<td ><?php echo anti_spam($email);?></td>
</tr>
<tr>
<td align="center">联系电话</td>
<td><?php echo anti_spam($telephone);?></td>
</tr>
<tr>
<td align="center">联系地址</td>
<td><?php echo $address;?></td>
</tr>
<tr>
<td align="center">即时通讯</td>
<td>
<?php if($username && $DT['im_web']) { ?><?php echo im_web($username.'&mid='.$moduleid.'&itemid='.$itemid);?>&nbsp;<?php } ?>
<?php if($qq && $DT['im_qq']) { ?><?php echo im_qq($qq);?>&nbsp;<?php } ?>
<?php if($wx && $DT['im_wx']) { ?><?php echo im_wx($wx, $username);?>&nbsp;<?php } ?>
<?php if($ali && $DT['im_ali']) { ?><?php echo im_ali($ali);?>&nbsp;<?php } ?>
<?php if($skype && $DT['im_skype']) { ?><?php echo im_skype($skype);?>&nbsp;<?php } ?>
</td>
</tr>
</table>
<?php } else if($module == 'know') { ?>
<div class="best_answer_show">
<?php echo $best['content'];?>
<?php if($best['url']) { ?><br/>
<span class="px12"><strong>参考资料：</strong><a href="<?php echo fix_link($best['url']);?>" target="_blank"><?php echo $best['url'];?></a></span>
<?php } ?>
</div>
<?php } else if($module == 'down') { ?>
<div class="down-url">
<ul>
<li><a href="<?php echo $MOD['linkurl'];?>down.php?itemid=<?php echo $itemid;?>" class="b">主站下载</a></li>
<?php if($MIRROR) { ?>
<?php if(is_array($MIRROR)) { foreach($MIRROR as $k=>$v) { ?>
<li><a href="<?php echo $MOD['linkurl'];?>down.php?mirror=<?php echo $k;?>&itemid=<?php echo $itemid;?>" class="b"><?php echo $v['name'];?>镜像</a></li>
<?php } } ?>
<?php } ?>
</ul>
<div class="c_b"></div>
</div>
<?php } else if($module == 'photo') { ?>
<?php if($action == 'side') { ?>
<?php if(is_array($S)) { foreach($S as $k => $v) { ?>
<a href="<?php echo $v['linkurl'];?>#p"><img src="<?php echo $v['thumb'];?>" width="80" height="80" title="<?php echo $v['introduce'];?>" alt="" <?php if($page==$v['page']) { ?>class="thumb_b"<?php } else { ?>class="thumb_a"<?php } ?>/></a>
<?php } } ?>
<?php } else { ?>
<div><a href="<?php echo $prev_photo;?>"><img src="<?php echo DT_SKIN;?>image/spacer.gif" id="cursor_a" title="上一张 支持键盘←方向键"/></a><a href="<?php echo $next_photo;?>"><img src="<?php echo DT_SKIN;?>image/spacer.gif" id="cursor_b" title="下一张 支持键盘→方向键"/></a></div>
<div class="t_c"><img src="<?php echo $P['src'];?>" id="destoon_photo" oncontextmenu="return false;" onload="if(this.width><?php echo $MOD['max_width'];?>)this.width=<?php echo $MOD['max_width'];?>;if(this.src.indexOf('spacer.gif')!=-1){this.width=<?php echo $MOD['max_width'];?>;this.height=1;}"/></div>
<?php } ?>
<?php } else if($module == 'video') { ?>
<div class="player"><?php include template('player', 'chip');?></div>
<?php } else if($module == 'article') { ?>
<div class="content" id="article"><?php echo $content;?></div>
<?php } else { ?>
<?php echo $content;?>
<?php } ?>
<?php } else if($user_status == 2) { ?>
<?php if(isset($description) && $description) { ?>
<?php if($module == 'exhibit') { ?>
<div class="pd10 lh18 px13"><?php echo $description;?></div>
<?php } else if($module == 'article') { ?>
<div class="content"><?php echo $description;?></div>
<?php } else { ?>
<?php echo $description;?>
<?php } ?>
<?php } ?>
<br/><br/>
<div class="px14 t_c" style="margin:auto;width:300px;background:#FFFFFF;">
<table cellpadding="6" cellspacing="6" width="100%">
<tr>
<td class="f_b">
<div style="padding:6px;border:#40B3FF 1px solid;background:#E5F5FF;">
查看详情需要支付<?php echo $name;?> <strong class="f_red"><?php echo $fee;?></strong> <?php echo $unit;?>
</div>
</td>
</tr>
<tr>
<td>我的<?php echo $name;?>余额 <strong class="f_blue"><?php if($currency=='money') { ?><?php echo $_money;?><?php } else { ?><?php echo $_credit;?><?php } ?></strong> <?php echo $unit;?></td>
</tr>
<?php if($MOD['fee_period']) { ?>
<tr>
<td>支付后可查看<strong class="f_red"><?php echo $MOD['fee_period'];?></strong>分钟，过期重新计费</td>
</tr>
<?php } ?>
<tr>
<td><input type="button" value="立即支付" class="btn-green" onclick="Go('<?php echo $pay_url;?>');"/></td>
</tr>
</table>
</div>
<br/><br/>
<?php } else if($user_status == 1) { ?>
<br/><br/>
<div class="px14 t_c" style="margin:auto;width:300px;">
<table cellpadding="5" cellspacing="5" width="100%">
<tr>
<td class="f_b">
<div style="padding:6px;border:#FFC600 1px solid;background:#FFFEBF;">
您的会员级别没有查看详情的权限
</div>
</td>
</tr>
<tr>
<td>获得更多商业机会，建议<span class="f_red">升级</span>会员级别</td>
</tr>
<?php if($DT['telephone']) { ?>
<tr>
<td>咨询电话：<?php echo $DT['telephone'];?></td>
</tr>
<?php } ?>
<tr>
<td><input type="button" value="立即升级" class="btn-green" onclick="Go('<?php echo $MODULE['2']['linkurl'];?>grade.php');"/></td>
</tr>
</table>
</div>
<br/><br/>
<?php } else if($user_status == 0) { ?>
<br/><br/>
<div class="px14 t_c" style="margin:auto;width:300px;">
<table cellpadding="5" cellspacing="5" width="100%">
<tr>
<td class="f_b">
<div style="padding:6px;border:#FFC600 1px solid;background:#FFFEBF;">
您还没有登录，请登录后查看详情
</div>
</td>
</tr>
<tr>
<td><input type="button" value="立即登录" class="btn-blue" onclick="Go('<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_login'];?>');"/></td>
</tr>
<tr>
<td><input type="button" value="免费注册" class="btn-green" onclick="Go('<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_register'];?>');"/></td>
</tr>
</table>
</div>
<br/><br/>
<?php } else { ?>
<?php if($description) { ?>
<div class="content"><?php echo $description;?></div>
<?php } else { ?>
<br/><br/><br/><br/><br/><br/>
<center><img src="<?php echo DT_SKIN;?>image/load.gif"/></center>
<br/><br/><br/><br/><br/><br/>
<?php } ?>
<?php } ?>
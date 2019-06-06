<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($user_status == 3) { ?>
<ul>
<?php if($member) { ?>
<?php if($module == 'sell') { ?>
          <div class="shop-info-bdgs clear"><dl><dd><a href="<?php echo $member['linkurl'];?>" target="_blank"><?php echo $member['company'];?></a></dd></dl></div>
          <div class="shop-info-bd clear">
            <div class="shop-rate clear">
              <dl>
                <dt>会员性质&nbsp;</dt>
                <dd><b><?php echo group_name($member['groupid']);?></b></dd>
              </dl>
              <dl>
                <dt>会员年限&nbsp;</dt>
                <dd><b>第<?php echo vip_year($member['fromtime']);?>年</b></dd>
              </dl>
              <dl>
                <dt>VIP等级&nbsp;</dt>
                <dd><b><img src="<?php echo DT_SKIN;?>image/vip_<?php echo $member['vip'];?>.gif" align="absmiddle"/></b></dd>
              </dl>
            </div>
          </div>
          <div class="shop-info-wrap clear">
            <div class="shop-info-hd">
              <dl>
                <dt>联系人：</dt>
                <dd><?php echo $member['truename'];?>(<?php echo gender($member['gender']);?>)  <?php echo $member['career'];?></dd>
              </dl>
              <dl>
                <dt>洽谈：</dt>
                <dd> [<?php if(online($member['userid'])==1) { ?><font class="f_red">在线</font><?php } else { ?><font class="f_gray">离线</font><?php } ?>]
                  <?php if($member['username'] && $DT['im_web']) { ?><?php echo im_web($member['username'].'&mid='.$moduleid.'&itemid='.$itemid);?>&nbsp;<?php } ?>
                  <?php if($member['qq'] && $DT['im_qq']) { ?><?php echo im_qq($member['qq']);?>&nbsp;<?php } ?>
                  <?php if($member['wx'] && $DT['im_wx']) { ?><?php echo im_wx($member['wx'], $member['username']);?>&nbsp;<?php } ?>
                  <?php if($member['ali'] && $DT['im_ali']) { ?><?php echo im_ali($member['ali']);?>&nbsp;<?php } ?>
                  <?php if($member['skype'] && $DT['im_skype']) { ?><?php echo im_skype($member['skype']);?>&nbsp;<?php } ?> </dd>
              </dl>
              <dl>
                <dt>关注：</dt>
                <dd> <a href="<?php echo $MODULE['2']['linkurl'];?>friend.php?action=add&username=<?php echo $member['username'];?>" rel="nofollow">[加商友]</a>
 <a href="<?php echo $MODULE['2']['linkurl'];?>message.php?action=send&touser=<?php echo $member['username'];?>" rel="nofollow">[发信件]</a> </dd>
              </dl>
              <dl>
                <dt>电话：</dt>
                <dd><?php echo anti_spam($member['telephone']);?></dd>
              </dl>
              <dl>
                <dt>手机：</dt>
                <dd> <?php echo anti_spam($member['mobile']);?><?php if($DT['sms'] && $member['vmobile']) { ?>&nbsp;&nbsp;<a href="<?php echo $MODULE['2']['linkurl'];?>sms.php?action=add&auth=<?php echo encrypt($member['mobile'], DT_KEY.'SMS');?>" target="_blank" rel="nofollow">[发送短信]</a><?php } ?></dd>
              </dl>
              <dl>
                <dt>地区：</dt>
                <dd><?php echo area_pos($member['areaid'], '-');?></dd>
              </dl>
              <dl>
                <dt>地址：</dt>
                <dd title="<?php echo $member['address'];?>"><?php echo $member['address'];?></dd>
              </dl>
              <dl class="shop-icon">
                <dt>认证：</dt>
                <dd> 
<?php if($member['vtruename']) { ?><i class="icon-vali_name" title="通过实名认证"></i>&nbsp;  <?php } ?>
<?php if($member['vcompany']) { ?><i class="icon-vali_gong" title="通过工商认证"></i>&nbsp;&nbsp; <?php } ?>
<?php if($member['vmobile']) { ?><i class="icon-vali_phone" title="通过手机认证"></i>&nbsp;&nbsp; <?php } ?>
<?php if($member['vemail']) { ?><i class="icon-vali_email" title="通过邮件认证"></i> <?php } ?>
</dd>
              </dl>
            </div>
            <div class="shop-info-fd clear"> <a target="_blank" href="<?php echo $member['linkurl'];?>"><img src="<?php echo DT_SKIN;?>image/sell/click_jrdp.gif" alt="进入该公司店铺" width="123" height="28"></a> </div>
          </div>
      <?php } else { ?>
          <div class="shop-info-bdgs clear">
            <dl>
              <dd><a href="<?php echo $member['linkurl'];?>" target="_blank"><?php echo $member['company'];?></a></dd>
            </dl>
          </div>
          <div class="shop-info-bd clear">
            <div class="shop-rate clear">
              <dl>
                <dt>会员性质&nbsp;</dt>
                <dd><b><?php echo group_name($member['groupid']);?></b></dd>
              </dl>
              <dl>
                <dt>会员年限&nbsp;</dt>
                <dd><b>第<?php echo vip_year($member['fromtime']);?>年</b></dd>
              </dl>
              <dl>
                <dt>VIP等级&nbsp;</dt>
                <dd><b><img src="<?php echo DT_SKIN;?>image/vip_<?php echo $member['vip'];?>.gif" align="absmiddle"/></b></dd>
              </dl>
            </div>
          </div>
          <div class="shop-info-wrap clear">
            <div class="shop-info-hd">
<?php if($member['deposit']) { ?>
 <dl>
                <dt>消保：</dt>
                <dd><?php if(($member['deposit'])<1) { ?><span class="f_green"><strong>暂未签署消保协议</strong></span><?php } else { ?><img src="<?php echo DT_SKIN;?>image/mall/baoz1.png" width="16" height="12" align="absmiddle" title="该店铺已签署消费者保障协议"/>已缴纳 <span class="red"><strong><?php echo $member['deposit'];?></strong> <?php echo $DT['money_unit'];?></span> 保证金<?php } ?></dd>
              </dl>
  <?php } ?>
              <dl>
                <dt>联系人：</dt>
                <dd><?php echo $member['truename'];?>(<?php echo gender($member['gender']);?>)  <?php echo $member['career'];?></dd>
              </dl>
              <dl>
                <dt>洽谈：</dt>
                <dd> [<?php if(online($member['userid'])==1) { ?><font class="f_red">在线</font><?php } else { ?><font class="f_gray">离线</font><?php } ?>]
                  <?php if($member['username'] && $DT['im_web']) { ?><?php echo im_web($member['username'].'&mid='.$moduleid.'&itemid='.$itemid);?>&nbsp;<?php } ?>
                  <?php if($member['qq'] && $DT['im_qq']) { ?><?php echo im_qq($member['qq']);?>&nbsp;<?php } ?>
                  <?php if($member['wx'] && $DT['im_wx']) { ?><?php echo im_wx($member['wx'], $member['username']);?>&nbsp;<?php } ?>
                  <?php if($member['ali'] && $DT['im_ali']) { ?><?php echo im_ali($member['ali']);?>&nbsp;<?php } ?>
                  <?php if($member['skype'] && $DT['im_skype']) { ?><?php echo im_skype($member['skype']);?>&nbsp;<?php } ?> </dd>
              </dl>
              <dl>
                <dt>关注：</dt>
                <dd> <a href="<?php echo $MODULE['2']['linkurl'];?>friend.php?action=add&username=<?php echo $member['username'];?>" rel="nofollow">[加商友]</a>
 <a href="<?php echo $MODULE['2']['linkurl'];?>message.php?action=send&touser=<?php echo $member['username'];?>" rel="nofollow">[发信件]</a> </dd>
              </dl>
              <dl>
                <dt>电话：</dt>
                <dd><?php echo anti_spam($member['telephone']);?></dd>
              </dl>
              <dl>
                <dt>手机：</dt>
                <dd> <?php echo anti_spam($member['mobile']);?><?php if($DT['sms'] && $member['vmobile']) { ?>&nbsp;&nbsp;<a href="<?php echo $MODULE['2']['linkurl'];?>sms.php?action=add&auth=<?php echo encrypt($member['mobile'], DT_KEY.'SMS');?>" target="_blank" rel="nofollow">[发送短信]</a><?php } ?></dd>
              </dl>
              <dl>
                <dt>地区：</dt>
                <dd><?php echo area_pos($member['areaid'], '-');?></dd>
              </dl>
              <dl>
                <dt>地址：</dt>
                <dd title="<?php echo $member['address'];?>"><?php echo $member['address'];?></dd>
              </dl>
              <dl class="shop-icon">
                <dt>认证：</dt>
                <dd> 
<?php if($member['vtruename']) { ?><i class="icon-vali_name" title="通过实名认证"></i>&nbsp;  <?php } ?>
<?php if($member['vcompany']) { ?><i class="icon-vali_gong" title="通过工商认证"></i>&nbsp;&nbsp; <?php } ?>
<?php if($member['vmobile']) { ?><i class="icon-vali_phone" title="通过手机认证"></i>&nbsp;&nbsp; <?php } ?>
<?php if($member['vemail']) { ?><i class="icon-vali_email" title="通过邮件认证"></i> <?php } ?>
</dd>
              </dl>
            </div>
            <div class="shop-info-fd clear"> <a target="_blank" href="<?php echo $member['linkurl'];?>"><img src="<?php echo DT_SKIN;?>image/sell/click_jrdp.gif" alt="进入该公司店铺" width="123" height="28"></a> </div>
          </div>
<?php } ?> 
<?php } else { ?>
<li class="f_b t_c" style="font-size:14px;"><a href="<?php echo userurl('');?>" target="_blank"><?php echo $item['company'];?></a></li>
<li style="padding-top:3px;">
<span>联系人</span><?php echo $item['truename'];?>&nbsp;
<?php if($item['username'] && $DT['im_web']) { ?><?php echo im_web($item['username'].'&mid='.$moduleid.'&itemid='.$itemid);?>&nbsp;<?php } ?>
<?php if($item['qq'] && $DT['im_qq']) { ?><?php echo im_qq($item['qq']);?>&nbsp;<?php } ?>
<?php if($item['wx'] && $DT['im_wx']) { ?><?php echo im_wx($item['wx'], $item['username']);?>&nbsp;<?php } ?>
<?php if($item['ali'] && $DT['im_ali']) { ?><?php echo im_ali($item['ali']);?>&nbsp;<?php } ?>
<?php if($item['skype'] && $DT['im_skype']) { ?><?php echo im_skype($item['skype']);?>&nbsp;<?php } ?>
&nbsp;&nbsp;<strong class="f_red">未注册</strong>
</li>
<?php if($item['email']) { ?><li><span>邮件</span><?php echo anti_spam($item['email']);?></li><?php } ?>
<?php if($item['telephone']) { ?><li><span>电话</span><?php echo anti_spam($item['telephone']);?></li><?php } ?>
<?php if($item['mobile']) { ?><li><span>手机</span><?php echo anti_spam($item['mobile']);?></li><?php } ?>
<li><span>地区</span><?php echo area_pos($item['areaid'], '&nbsp;');?></li>
<?php if($item['address']) { ?><li title="<?php echo $item['address'];?>"><span>地址</span><a href="<?php echo DT_PATH;?>api/address.php?auth=<?php echo encrypt($item['address'].'|'.$item['company'], DT_KEY.'MAP');?>" target="_blank"><?php echo $item['address'];?></a></li><?php } ?>
</li>
<?php } ?>
</ul>
<?php } else if($user_status == 2) { ?>
<div class="px14 t_c">
<table cellpadding="6" cellspacing="6" width="100%">
<tr>
<td class="f_b"><div style="padding:6px;border:#40B3FF 1px solid;background:#E5F5FF;">查看该信息联系方式需支付<?php echo $name;?> <strong class="f_red"><?php echo $fee;?></strong> <?php echo $unit;?></div></td>
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
<?php } else if($user_status == 1) { ?>
<div class="px14 t_c">
<table cellpadding="6" cellspacing="6" width="100%">
<tr>
<td class="f_b"><div style="padding:6px;border:#FFC600 1px solid;background:#FFFEBF;">您的会员级别没有查看联系方式的权限</div></td>
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
<?php } else if($user_status == 0) { ?>
<br/>
<div class="px14 t_c">
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
<br/>
<?php } else { ?>
<br/><br/><br/>
<center><img src="<?php echo DT_SKIN;?>image/load.gif"/></center>
<br/><br/><br/>
<?php } ?>
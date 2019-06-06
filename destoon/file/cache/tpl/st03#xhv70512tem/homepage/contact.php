<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div class="dsn" id="pos_show"><a href="<?php echo $COM['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MENU[$menuid]['linkurl'];?>"><?php echo $MENU[$menuid]['name'];?></a></div>
<div class="main_head"><div><strong><?php echo $MENU[$menuid]['name'];?></strong></div></div>
<div class="main_body">
<div class="px14 lh18">
<table width="100%" cellpadding="10" cellspacing="1">
<tr>
<td width="100">公司名称：</td>
<td><?php echo $COM['company'];?></td>
</tr>
<tr>
<td>公司地址：</td>
<td><a href="<?php echo DT_PATH;?>api/address.php?auth=<?php echo encrypt($COM['address'].'|'.$COM['company'], DT_KEY.'MAP');?>" target="_blank"><?php echo $COM['address'];?></a></td>
</tr>
<tr>
<td>所在地区：</td>
<td><?php echo area_pos($COM['areaid'], '/');?></td>
</tr>
<?php if($COM['postcode']) { ?>
<tr>
<td>邮政编码：</td>
<td><?php echo $COM['postcode'];?></td>
</tr>
<?php } ?>
<tr>
<td>公司电话：</td>
<td><?php if($domain) { ?><?php echo $COM['telephone'];?><?php } else { ?><?php echo anti_spam($COM['telephone']);?><?php } ?></td>
</tr>
<?php if($COM['fax']) { ?>
<tr>
<td>公司传真：</td>
<td><?php if($domain) { ?><?php echo $COM['fax'];?><?php } else { ?><?php echo anti_spam($COM['fax']);?><?php } ?></td>
</tr>
<?php } ?>
<?php if($COM['mail']) { ?>
<tr>
<td>电子邮件：</td>
<td><?php if($domain) { ?><?php echo $COM['mail'];?><?php } else { ?><?php echo anti_spam($COM['mail']);?><?php } ?></td>
</tr>
<?php } ?>
<tr>
<td>公司网址：</td>
<td><?php if($COM['homepage']) { ?><a href="<?php echo $COM['homepage'];?>" target="_blank"><?php echo $COM['homepage'];?></a><br/><?php } ?>
<a href="<?php echo $COM['linkurl'];?>" target="_blank"><?php echo $COM['linkurl'];?></a></td>
</tr>
<?php if($COM['truename']) { ?>
<tr>
<td>联 系 人：</td>
<td><?php echo $COM['truename'];?> （<?php if($COM['gender']==1) { ?>先生<?php } else { ?>女士<?php } ?>）</td>
</tr>
<?php } ?>
<?php if($COM['department']) { ?>
<tr>
<td>部门(职位)：</td>
<td><?php echo $COM['department'];?><?php if($COM['career']) { ?> （<?php echo $COM['career'];?>）<?php } ?></td>
</tr>
<?php } ?>
<?php if($COM['mobile']) { ?>
<tr>
<td>手机号码：</td>
<td><?php if($domain) { ?><?php echo $COM['mobile'];?><?php } else { ?><?php echo anti_spam($COM['mobile']);?><?php } ?></td>
</tr>
<?php } ?>
<?php if($COM['gzh']) { ?>
<tr>
<td>微信公众号：</td>
<td><?php echo $COM['gzh'];?> &nbsp; <a href="javascript:;" onclick="prompt('请按Ctrl+C复制微信号', '<?php echo $COM['gzh'];?>');" class="b">复制</a></td>
</tr>
<?php } ?>
<?php if($COM['gzhqr']) { ?>
<tr>
<td>扫码关注：</td>
<td><img src="<?php echo $COM['gzhqr'];?>"/></td>
</tr>
<?php } ?>
<tr>
<td>即时通讯：</td>
<td>
<?php if($COM['username'] && $DT['im_web']) { ?><?php echo im_web($COM['username']);?>&nbsp;<?php } ?>
<?php if($COM['qq'] && $DT['im_qq']) { ?><?php echo im_qq($COM['qq']);?>&nbsp;<?php } ?>
<?php if($COM['wx'] && $DT['im_wx']) { ?><?php echo im_wx($COM['wx'], $COM['username']);?>&nbsp;<?php } ?>
<?php if($COM['ali'] && $DT['im_ali']) { ?><?php echo im_ali($COM['ali']);?>&nbsp;<?php } ?>
<?php if($COM['skype'] && $DT['im_skype']) { ?><?php echo im_skype($COM['skype']);?>&nbsp;<?php } ?>
</td>
</tr>
<tr>
<td>在线状态：</td>
<td><?php if(online($COM['userid'])==1) { ?><span class="f_red">当前在线</span><?php } else { ?><span class="f_gray">当前离线</span><?php } ?></td>
</tr>
</table>
</div>
</div>
<?php if($api_map && $map) { ?>
<div class="main_head"><div><strong>公司地图</strong><a name="map"></a></div></div>
<div class="main_body">
<?php $map_height = 300;?>
<?php @include DT_ROOT.'/api/map/'.$api_map.'/show.inc.php';?>
</div>
<?php } ?>
<?php if($could_message) { ?>
<div class="main_head"><div><strong>在线留言</strong><a name="guestbook"></a></div></div>
<div class="main_body"><script type="text/javascript">Df('<?php echo $MODULE['4']['linkurl'];?>home.php?action=message&job=guestbook&template=<?php echo $template;?>&skin=<?php echo $skin;?>&username=<?php echo $username;?>&sign=<?php echo crypt_sign($template.$skin.$username);?>', 'name="fra" id="fra" style="width:98%;height:488px;"');</script></div>
<?php } ?>
<?php include template('footer', $template);?>
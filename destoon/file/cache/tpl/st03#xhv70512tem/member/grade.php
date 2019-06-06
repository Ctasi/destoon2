<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
<h1 class="title"><?php echo $DT['sitename'];?>会员服务一览表</h1>
<table cellpadding="16" cellspacing="0" class="tb">
<tr align="center">
<th width="<?php echo $percent;?>">服务范围</th>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<th width="<?php echo $percent;?>"><?php echo $v['groupname'];?></th>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>收费模式</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><?php if($v['fee_mode']) { ?><span class="f_red">包年</span><?php } else { ?><span class="f_green">免费</span><?php } ?></td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>年 费</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><?php if($v['fee']) { ?><span class="f_price"><?php echo $DT['money_sign'];?><strong><?php echo $v['fee'];?></strong><?php echo $DT['money_unit'];?>/年</span><?php } else { ?>--<?php } ?></td>
<?php } ?><?php } } ?>
</tr>
<?php if($UP) { ?>
<tr align="center">
<td>&nbsp;</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><?php if(isset($UP[$k])) { ?><input type="button" value="立即升级" class="btn-green" onclick="Go('account.php?action=grade&groupid=<?php echo $v['groupid'];?>');"/><?php } else { ?>&nbsp;<?php } ?></td>
<?php } ?><?php } } ?>
</tr>
<?php } ?>
<tr align="center">
<td>允许发布信息</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td valign="top" class="f_gray">
<?php $i=0;?>
<?php if(is_array($MODULE)) { foreach($MODULE as $k => $m) { ?>
<?php if(in_array($m['moduleid'], $v['moduleids'])) { ?><?php if($i++>0) { ?> | <?php } ?><a href="<?php echo $m['linkurl'];?>" target="_blank"><?php echo $m['name'];?></a><?php } ?>
<?php } } ?>
</td>
<?php } ?>
<?php } } ?>
</tr>
<tr align="center">
<td>拥有<?php echo VIP;?>标识 <img src="<?php echo DT_SKIN;?>image/vip.gif" align="absmiddle" alt="<?php echo VIP;?>" title="<?php echo VIP;?>"/></td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><img src="<?php echo DT_SKIN;?>image/<?php if($v['vip']) { ?>yes<?php } else { ?>no<?php } ?>.gif"/></td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>信息优先排序</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><img src="<?php echo DT_SKIN;?>image/<?php if($v['vip']) { ?>yes<?php } else { ?>no<?php } ?>.gif"/></td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>产品首页推荐</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><img src="<?php echo DT_SKIN;?>image/<?php if($v['vip']) { ?>yes<?php } else { ?>no<?php } ?>.gif"/></td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>产品在线销售</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><img src="<?php echo DT_SKIN;?>image/<?php if($v['trade_order']) { ?>yes<?php } else { ?>no<?php } ?>.gif"/></td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>信息关键字排名</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><img src="<?php echo DT_SKIN;?>image/<?php if($v['spread']) { ?>yes<?php } else { ?>no<?php } ?>.gif"/></td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>拥有公司主页</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><img src="<?php echo DT_SKIN;?>image/<?php if($v['homepage']) { ?>yes<?php } else { ?>no<?php } ?>.gif"/></td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>自定义公司主页</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><img src="<?php echo DT_SKIN;?>image/<?php if($v['home']) { ?>yes<?php } else { ?>no<?php } ?>.gif"/></td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>自定义公司模板</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><img src="<?php echo DT_SKIN;?>image/<?php if($v['style']) { ?>yes<?php } else { ?>no<?php } ?>.gif"/></td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>客户服务</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><img src="<?php echo DT_SKIN;?>image/<?php if($v['ask']) { ?>yes<?php } else { ?>no<?php } ?>.gif"/></td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>商机订阅</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><img src="<?php echo DT_SKIN;?>image/<?php if($v['mail']) { ?>yes<?php } else { ?>no<?php } ?>.gif"/></td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>邮件发送</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><img src="<?php echo DT_SKIN;?>image/<?php if($v['sendmail']) { ?>yes<?php } else { ?>no<?php } ?>.gif"/></td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>收件箱容量</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td>
<?php if($v['inbox_limit'] == -1) { ?>
0
<?php } else if($v['inbox_limit'] == 0) { ?>
不限
<?php } else { ?>
<?php echo $v['inbox_limit'];?>
<?php } ?>
</td>
<?php } ?><?php } } ?>
</tr>

<tr align="center">
<td>每日可发站内信</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td>
<?php if($v['message_limit'] == -1) { ?>
0
<?php } else if($v['message_limit'] == 0) { ?>
不限
<?php } else { ?>
<?php echo $v['message_limit'];?>
<?php } ?>
</td>
<?php } ?><?php } } ?>
</tr>

<tr align="center">
<td>每日询盘次数</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td>
<?php if($v['inquiry_limit'] == -1) { ?>
0
<?php } else if($v['inquiry_limit'] == 0) { ?>
不限
<?php } else { ?>
<?php echo $v['inquiry_limit'];?>
<?php } ?>
</td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>每日报价次数</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td>
<?php if($v['price_limit'] == -1) { ?>
0
<?php } else if($v['price_limit'] == 0) { ?>
不限
<?php } else { ?>
<?php echo $v['price_limit'];?>
<?php } ?>
</td>
<?php } ?><?php } } ?>
</tr>

<tr align="center">
<td>商友数量数量</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td>
<?php if($v['friend_limit'] == -1) { ?>
0
<?php } else if($v['friend_limit'] == 0) { ?>
不限
<?php } else { ?>
<?php echo $v['friend_limit'];?>
<?php } ?>
</td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>贸易提醒数量</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td>
<?php if($v['alert_limit'] == -1) { ?>
0
<?php } else if($v['alert_limit'] == 0) { ?>
不限
<?php } else { ?>
<?php echo $v['alert_limit'];?>
<?php } ?>
</td>
<?php } ?><?php } } ?>
</tr>
<tr align="center">
<td>商机收藏数量</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td>
<?php if($v['favorite_limit'] == -1) { ?>
0
<?php } else if($v['favorite_limit'] == 0) { ?>
不限
<?php } else { ?>
<?php echo $v['favorite_limit'];?>
<?php } ?>
</td>
<?php } ?><?php } } ?>
</tr>
<?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?>
<?php if($m['moduleid'] > 4 && !$m['islink'] && $m['module'] != 'special') { ?>
<?php $M = cache_read('module-'.$m['moduleid'].'.php');?>
<tr align="center">
<td><?php echo $m['name'];?>发布数量</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?>
<?php if($k > 4) { ?>
<td>
<?php $limit = intval($M['limit_'.$v['groupid']]);?>
<?php if($limit == -1) { ?>
0
<?php } else if($limit == 0) { ?>
不限
<?php } else { ?>
<?php echo $limit;?>
<?php } ?>
</td>
<?php } ?>
<?php } } ?>
</tr>
<?php } ?>
<?php } } ?>
<?php if($UP) { ?>
<tr align="center">
<td>&nbsp;</td>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<td><?php if(isset($UP[$k])) { ?><input type="button" value="立即升级" class="btn-green" onclick="Go('account.php?action=grade&groupid=<?php echo $v['groupid'];?>');"/><?php } else { ?>&nbsp;<?php } ?></td>
<?php } ?><?php } } ?>
</tr>
<?php } ?>
<tr align="center">
<th width="<?php echo $percent;?>">服务范围</th>
<?php if(is_array($GROUPS)) { foreach($GROUPS as $k => $v) { ?><?php if($k > 4) { ?>
<th width="<?php echo $percent;?>"><?php echo $v['groupname'];?></th>
<?php } ?><?php } } ?>
</tr>
</table>
</div>
<?php include template('footer');?>
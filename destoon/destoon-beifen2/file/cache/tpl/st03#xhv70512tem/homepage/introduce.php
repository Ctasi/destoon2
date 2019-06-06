<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div class="dsn" id="pos_show"><a href="<?php echo $COM['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MENU[$menuid]['linkurl'];?>"><?php echo $MENU[$menuid]['name'];?></a><?php if($itemid) { ?> <i>&gt;</i> <?php echo $title;?><?php } ?></div>
<?php if($itemid) { ?>
<div class="main_head"><div><strong><?php echo $title;?></strong></div></div>
<div class="main_body">
<div class="lh18 px14"><?php echo $content;?></div>
</div>
<?php } else { ?>
<div class="main_head"><div><strong><?php echo $MENU[$menuid]['name'];?></strong></div></div>
<div class="main_body">
<div class="lh18 px14">
<table width="98%" cellpadding="3" cellspacing="3" align="center">
<tr>
<td><img src="<?php echo $thumb;?>" align="right" style="margin:5px 0 5px 10px;padding:5px;border:#C0C0C0 1px solid;"/><?php echo $content;?></td>
</tr>
</table>
</div>
</div>
<?php if($video) { ?>
<div class="main_head"><div><strong>形象视频</strong></div></div>
<div class="main_body">
<?php echo load('player.js');?>
<center><script type="text/javascript">document.write(player('<?php echo $video;?>',600,500,0));</script></center>
</div>
<?php } ?>
<div class="main_head"><div><strong>公司档案</strong></div></div>
<div class="main_body">
<div class="px14 lh18">
<table width="100%" cellpadding="10" cellspacing="1">
<tr>
<td width="100" class="f_b">公司名称：</td>
<td width="340"><?php echo $COM['company'];?></td>
<td width="100" class="f_b">公司类型：</td>
<td><?php echo $COM['type'];?> (<?php echo $COM['mode'];?>)</td>
</tr>
<tr>
<td class="f_b">所 在 地：</td>
<td><?php echo area_pos($COM['areaid'], '/');?></td>
<td class="f_b">公司规模：</td>
<td><?php echo $COM['size'];?></td>
</tr>
<tr>
<td class="f_b">注册资本：</td>
<td><?php if($COM['capital']) { ?><?php echo $COM['capital'];?>万<?php echo $COM['regunit'];?><?php } else { ?>未填写<?php } ?></td>
<td class="f_b">注册年份：</td>
<td><?php echo $COM['regyear'];?></td>
</tr>
</table>
<table width="100%" cellpadding="10" cellspacing="1">
<tr>
<td width="100" class="f_b">资料认证：</td>
<td>
<?php if($COM['vcompany']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_company.gif" width="16" height="16" align="absmiddle" title="资料通过工商认证"/><?php } ?>
<?php if($COM['vtruename']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_truename.gif" width="16" height="16" align="absmiddle" title="资料通过实名认证"/><?php } ?>
<?php if($COM['vbank']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_bank.gif" width="16" height="16" align="absmiddle" title="资料通过银行帐号认证"/><?php } ?>
<?php if($COM['vmobile']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_mobile.gif" width="16" height="16" align="absmiddle" title="资料通过手机认证"/><?php } ?>
<?php if($COM['vemail']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_email.gif" width="16" height="16" align="absmiddle" title="资料通过邮件认证"/><?php } ?>
<?php if($COM['validated']) { ?>&nbsp;<img src="<?php echo DT_STATIC;?>file/image/check-ok.png" align="absmiddle"/> 企业资料通过<?php echo $COM['validator'];?>认证<?php } ?>
</td>
</tr>
<?php if($COM['deposit']) { ?>
<tr>
<td class="f_b">保 证 金：</td>
<td>已缴纳 <strong class="f_green"><?php echo $COM['deposit'];?></strong> <?php echo $DT['money_unit'];?></td>
</tr>
<?php } ?>
<?php if($COM['mode']) { ?>
<tr>
<td class="f_b">经营模式：</td>
<td><?php echo $COM['mode'];?></td>
</tr>
<?php } ?>
<?php if($COM['business']) { ?>
<tr>
<td class="f_b">经营范围：</td>
<td><?php echo $COM['business'];?></td>
</tr>
<?php } ?>
<?php if($COM['sell']) { ?>
<tr>
<td class="f_b">销售的产品：</td>
<td><?php echo $COM['sell'];?></td>
</tr>
<?php } ?>
<?php if($COM['buy']) { ?>
<tr>
<td class="f_b">采购的产品：</td>
<td><?php echo $COM['buy'];?></td>
</tr>
<?php } ?>
<?php if($COM['catid']) { ?>
<tr>
<td class="f_b">主营行业：</td>
<td>
<?php $catids = explode(',', substr($COM['catid'], 1, -1));?>
<table cellpadding="6" cellspacing="1" width="100%">
<?php if(is_array($catids)) { foreach($catids as $i => $c) { ?>
<?php if($i%3==0) { ?><tr><?php } ?>
<td width="33%"><?php echo cat_pos(get_cat($c), ' / ', '_blank');?></td>
<?php if($i%3==2) { ?></tr><?php } ?>
<?php } } ?>
</table>
</td>
</tr>
<?php } ?>
</table>
</div>
</div>
<?php if($could_comment && in_array($moduleid, explode(',', $EXT['comment_module']))) { ?>
<div id="comment_div" style="display:;">
<div class="main_head"><div><span class="f_r px12">共<span id="comment_count">0</span>条&nbsp;&nbsp;</span><strong><span id="message_title">相关评论</span></strong></div></div>
<div class="main_body"><script type="text/javascript">Df('<?php echo DT_PATH;?>api/comment.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $COM['userid'];?>&proxy=<?php echo $comment_proxy;?>', 'id="destoon_comment" style="width:100%;"');</script></div>
</div>
<?php } ?>
<?php } ?>
<?php include template('footer', $template);?>
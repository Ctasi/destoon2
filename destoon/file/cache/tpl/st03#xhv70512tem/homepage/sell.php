<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div class="dsn" id="pos_show"><a href="<?php echo $COM['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MENU[$menuid]['linkurl'];?>"><?php echo $MENU[$menuid]['name'];?></a><?php if($itemid) { ?> <i>&gt;</i> <?php echo $title;?><?php } ?></div>
<?php if($itemid) { ?>
<div class="main_head"><div><strong><?php echo $title;?></strong></div></div>
<div class="main_body">
<table width="100%" align="center">
<tr>
<td width="250" valign="top">
<div id="mid_pos"></div>
<div id="mid_div" onmouseover="SAlbum();" onmouseout="HAlbum();" onclick="PAlbum(Dd('mid_pic'));">
<img src="<?php echo $albums['0'];?>" width="240" height="180" id="mid_pic"/><span id="zoomer"></span>
</div>
<div class="b5"></div>
<div>
<?php if(is_array($thumbs)) { foreach($thumbs as $k => $v) { ?><img src="<?php echo $v;?>" width="60" height="60" onmouseover="if(this.src.indexOf('nopic60.gif')==-1)Album(<?php echo $k;?>, '<?php echo $albums[$k];?>');" class="<?php if($k) { ?>ab_im<?php } else { ?>ab_on<?php } ?>" id="t_<?php echo $k;?>"/><?php } } ?>
</div>
<div class="b5"></div>
<div onclick="PAlbum(Dd('mid_pic'));" class="c_b t_c c_p"><img src="<?php echo DT_SKIN;?>image/ico_zoom.gif" width="16" height="16" align="absmiddle"/> 点击图片查看原图</div>
</td>
<td width="15"> </td>
<td valign="top">
<div id="big_div" style="display:none;"><img src="" id="big_pic"/></div>
<table width="100%" cellpadding="4" cellspacing="4">
<?php if($MOD['hits']) { ?>
<tr>
<td class="f_dblue">产品：</td>
<td><span id="hits" class="f_r">浏览次数：<?php echo $hits;?></span><strong><?php echo $title;?></strong>&nbsp;</td>
</tr>
<?php } ?>
<?php if($brand) { ?>
<tr>
<td class="f_dblue">品牌：</td>
<td><?php echo $brand;?></td>
</tr>
<?php } ?>
<?php if($n1 && $v1) { ?>
<tr>
<td class="f_dblue"><?php echo $n1;?>：</td>
<td><?php echo $v1;?></td>
</tr>
<?php } ?>
<?php if($n2 && $v2) { ?>
<tr>
<td class="f_dblue"><?php echo $n2;?>：</td>
<td><?php echo $v2;?></td>
</tr>
<?php } ?>
<?php if($n3 && $v3) { ?>
<tr>
<td class="f_dblue"><?php echo $n3;?>：</td>
<td><?php echo $v3;?></td>
</tr>
<?php } ?>
<tr>
<td class="f_dblue">单价：</td>
<td class="f_b f_orange"><?php if($price>0) { ?><?php echo $price;?><?php echo $DT['money_unit'];?>/<?php echo $unit;?><?php } else { ?>面议<?php } ?></td>
</tr>
<tr>
<td class="f_dblue">最小起订量：</td>
<td class="f_b f_orange"><?php if($minamount) { ?><?php echo $minamount;?> <?php echo $unit;?><?php } ?></td>
</tr>
<tr>
<td class="f_dblue">供货总量：</td>
<td class="f_b f_orange"><?php if($amount) { ?><?php echo $amount;?> <?php echo $unit;?><?php } ?></td>
</tr>
<tr>
<td class="f_dblue">发货期限：</td>
<td>自买家付款之日起  <span class="f_b f_orange"><?php if($days) { ?><?php echo $days;?><?php } ?></span> 天内发货</td>
</tr>
<tr>
<td class="f_dblue">有效期至：</td>
<td><?php if($todate) { ?><?php echo $todate;?><?php } else { ?>长期有效<?php } ?><?php if($expired) { ?> <span class="f_red">[已过期]</span><?php } ?></td>
</tr>
<tr>
<td width="80" class="f_dblue">最后更新：</td>
<td><?php echo $editdate;?></td>
</tr>
<?php if($could_inquiry && !$expired) { ?>
<tr>
<td class="f_dblue">&nbsp;</td>
<td><a href="#message"><img src="<?php echo DT_SKIN;?>image/btn_inquiry.gif" alt="询价"/></a></td>
</tr>
<?php } ?>
</table>
<script type="text/javascript">
document.write('<br/><br/><center><a href="<?php echo $MODULE['4']['linkurl'];?>home.php?action=prev&itemid=<?php echo $itemid;?>&username=<?php echo $username;?>" class="t">&#171;上一个产品</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $MODULE['4']['linkurl'];?>home.php?action=next&itemid=<?php echo $itemid;?>&username=<?php echo $username;?>" class="t">下一个产品&#187;</a></center>');
</script>
</td>
</tr>
</table>
</div>
<div class="main_head"><div><strong>详细信息</strong></div></div>
<div class="main_body">
<?php if($CP) { ?><?php include template('property_show', 'chip');?><?php } ?>
<div class="content" id="content"><?php echo $content;?></div>
</div>
<?php if($could_inquiry) { ?>
<div class="main_head"><div><strong><span id="message_title">询价单</span><a name="message"></a></strong></div></div>
<div class="main_body"><script type="text/javascript">Df('<?php echo $inquiry_url;?>', 'name="fra" id="fra" style="width:98%;height:488px;"');</script></div>
<?php } ?>
<?php if($could_comment && in_array($moduleid, explode(',', $EXT['comment_module']))) { ?>
<div id="comment_div" style="display:;">
<div class="main_head"><div><span class="f_r px12">共<span id="comment_count">0</span>条&nbsp;&nbsp;</span><strong><span id="message_title">相关评论</span></strong></div></div>
<div class="main_body"><script type="text/javascript">Df('<?php echo DT_PATH;?>api/comment.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>&proxy=<?php echo $comment_proxy;?>', 'id="destoon_comment" style="width:100%;"');</script></div>
</div>
<?php } ?>
<script type="text/javascript">
try {Dd('type_<?php echo $typeid;?>').style.backgroundColor = '#F1F1F1';}catch (e){}
var content_id = 'content';
var img_max_width = <?php echo $MOD['max_width'];?>;
</script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script>
<?php } else { ?>
<div class="main_head">
<div>
<span class="f_r f_n px12">
<?php if($view) { ?>
<a href="<?php echo userurl($username, 'file=sell&typeid='.$typeid, $domain);?>">以橱窗方式浏览</a> | <strong>以目录方式浏览</strong>
<?php } else { ?>
<strong>以橱窗方式浏览</strong> | <a href="<?php echo userurl($username, 'file=sell&view=1&typeid='.$typeid, $domain);?>">以目录方式浏览</a>
<?php } ?>
</span>
<strong><?php echo $MENU[$menuid]['name'];?></strong>
</div>
</div>
<div class="main_body">
<?php if($view) { ?>
<table cellpadding="10" cellspacing="1" width="100%">
<tr bgcolor="#EEEEEE">
<th width="100">图片</th>
<th>标 题</th>
<th width="110">更新时间</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr align="center"<?php if($k%2==1) { ?> bgcolor="#F1F1F1"<?php } ?>>
<td height="100"><a href="<?php echo $v['linkurl'];?>"><img src="<?php echo imgurl($v['thumb']);?>" width="80" height="80" alt="" style="border:#C0C0C0 1px solid;"/></a></td>
<td align="left" class="lh18" valign="top"><a href="<?php echo $v['linkurl'];?>" class="px14"><?php echo $v['title'];?></a><br/><span class="f_gray"><?php echo $v['introduce'];?></span>
</td>
<td><?php echo timetodate($v['edittime'], 3);?></td>
</tr>
<?php } } ?>
</table>
<?php } else { ?>
<table cellpadding="10" cellspacing="1" width="100%">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<?php if($k%4==0) { ?><tr align="center"><?php } ?>
<td valign="top" width="25%">
<div class="thumb">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php echo imgurl($v['thumb'], 160);?>" width="160" height="160" alt="<?php echo $v['alt'];?>"/></a>
<div><a href="<?php echo $v['linkurl'];?>"><?php echo $v['title'];?></a></div>
<p><?php echo timetodate($v['edittime'], 3);?></p>
</div>
</td>
<?php if($k%4==3) { ?></tr><?php } ?>
<?php } } ?>
</table>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
</div>
<script type="text/javascript">
try {Dd('type_<?php echo $typeid;?>').innerHTML = '<strong>'+Dd('name_<?php echo $typeid;?>').innerHTML+'</strong>';}catch (e){}
</script>
<?php } ?>
<?php include template('footer', $template);?>
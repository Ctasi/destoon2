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
<table width="100%" cellpadding="10" cellspacing="1">
<tr>
<td width="80" class="f_dblue">产 品：</td>
<td><?php if($MOD['hits']) { ?><span id="hits" class="f_r">浏览次数：<?php echo $hits;?></span><?php } ?><strong><?php echo $title;?></strong>&nbsp;</td>
</tr>
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
<td class="f_dblue">需求数量：</td>
<td><?php echo $amount;?></td>
</tr>
<tr>
<td class="f_dblue">价格要求：</td>
<td class="f_b f_orange"><?php echo $price;?></td>
</tr>
<tr>
<td class="f_dblue">包装要求：</td>
<td><?php echo $pack;?></td>
</tr>
<tr>
<td class="f_dblue">所在地：</td>
<td><?php echo area_pos($areaid, '');?></td>
</tr>
<tr>
<td class="f_dblue">有效期至：</td>
<td><?php if($todate) { ?><?php echo $todate;?><?php } else { ?>长期有效<?php } ?><?php if($expired) { ?> <span class="f_red">[已过期]</span><?php } ?></td>
</tr>
<tr>
<td class="f_dblue">最后更新：</td>
<td><?php echo $editdate;?></td>
</tr>
<tr>
<td class="f_dblue">&nbsp;</td>
<td><a href="#message"><img src="<?php echo DT_SKIN;?>image/btn_price.gif" alt="报价"/></a></td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<div class="main_head"><div><strong>详细信息</strong></div></div>
<div class="main_body">
<?php if($CP) { ?><?php include template('property_show', 'chip');?><?php } ?>
<div class="content" id="content"><?php echo $content;?></div>
</div>
<?php if($could_price) { ?>
<div class="main_head"><div><strong><span id="message_title">报价单</span><a name="message"></a></strong></div></div>
<div class="main_body"><script type="text/javascript">Df('<?php echo $price_url;?>', 'name="fra" id="fra" style="width:98%;height:488px;"');</script></div>
<?php } ?>
<?php if($could_comment && in_array($moduleid, explode(',', $EXT['comment_module']))) { ?>
<div id="comment_div" style="display:;">
<div class="main_head"><div><span class="f_r px12">共<span id="comment_count">0</span>条&nbsp;&nbsp;</span><strong><span id="message_title">相关评论</span></strong></div></div>
<div class="main_body"><script type="text/javascript">Df('<?php echo DT_PATH;?>api/comment.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>&proxy=<?php echo $comment_proxy;?>', 'id="destoon_comment" style="width:100%;"');</script></div>
</div>
<?php } ?>
<script type="text/javascript">
var content_id = 'content';
var img_max_width = <?php echo $MOD['max_width'];?>;
</script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script>
<?php } else { ?>
<div class="main_head"><div><strong><?php echo $MENU[$menuid]['name'];?></strong></div></div>
<div class="main_body">
<table cellpadding="10" cellspacing="1" width="100%" align="center">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr<?php if($k%2==1) { ?> bgcolor="#FBFBFB"<?php } ?>>
<td align="left"><a href="<?php echo $v['linkurl'];?>" class="px14"><?php echo $v['title'];?></a>
</td>
<td align="center" width="80"><?php echo timetodate($v['edittime'], 3);?></td>
</tr>
<?php } } ?>
</table>
<div class="pages"><?php echo $pages;?></div>
</div>
<?php } ?>
<?php include template('footer', $template);?>
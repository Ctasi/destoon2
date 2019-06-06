<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div class="dsn" id="pos_show"><a href="<?php echo $COM['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MENU[$menuid]['linkurl'];?>"><?php echo $MENU[$menuid]['name'];?></a><?php if($itemid) { ?> <i>&gt;</i> <?php echo $title;?><?php } ?></div>
<div class="main_head"><div><strong><?php echo $MENU[$menuid]['name'];?></strong></div></div>
<div class="main_body">
<?php if($itemid) { ?>
<?php if($pass) { ?>
<style type="text/css">
.photo_info {color:#F1F1F1;padding:10px 16px;background:#666666;}
.photo_info h1 {text-align:left;margin:2px 0;}
.photo_info_r {float:right;padding:8px 6px 0 0;}
.photo_intro {color:#FFFFFF;padding:10px 16px 0 16px;line-height:160%;text-indent:2em;}
.photo_l {background:#333333;}
.photo_r {background:#000000;width:120px;text-align:center;}
.photo_pos {color:#003278;padding:0 12px 10px 12px;}
.thumb_a {border:#666666 1px solid;padding:2px;margin-top:10px;}
.thumb_b {border:#FF6600 1px solid;padding:2px;margin-top:10px;}
.count_a {font-size:20px;color:#FF6600;}
.count_b {font-size:20px;}
.photo_all {padding:10px;}
.photo_all div {color:#F1F1F1;padding:2px 10px 2px 12px;text-align:left;}
#cursor_a {position:absolute;z-index:1000;width:500px;cursor:url('<?php echo DT_SKIN;?>image/prev.cur'),default;}
#cursor_b {position:absolute;z-index:1000;width:500px;cursor:url('<?php echo DT_SKIN;?>image/next.cur'),default;margin-left:500px;}
</style>
<?php if($view) { ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td valign="top" class="photo_l">
<a name="p"></a>
<div class="photo_info">
<div>
<h1 class="title" id="title"><?php echo $title;?></h1>
日期：<?php echo $adddate;?>&nbsp;&nbsp;&nbsp;
<?php if($MOD['hits']) { ?>点击：<span id="hits"><?php echo $hits;?></span>&nbsp;&nbsp;&nbsp;<?php } ?>
图片：<?php echo $items;?>&nbsp;&nbsp;&nbsp;
<span onclick="Go('<?php echo userurl($username, 'file='.$file.'&itemid='.$itemid, $domain);?>#p');" class="c_p">返回大图</span>
</div>
</div>
<div class="photo_all" oncontextmenu="return false">
<table width="100%">
<?php if(is_array($T)) { foreach($T as $i => $t) { ?>
<?php if($i%5==0) { ?><tr align="center"><?php } ?>
<td width="20%" valign="top">
<a href="<?php echo $t['linkurl'];?>"><img src="<?php echo $t['thumb'];?>" width="160" alt="<?php echo $t['introduce'];?>" class="thumb_a" onmouseover="this.className='thumb_b';" onmouseout="this.className='thumb_a';"/></a>
<div>(<?php echo $t['number'];?>) <?php echo $t['title'];?></div>
</td>
<?php if($i%5==4) { ?></tr><?php } ?>
<?php } } ?>
</table>
</div>
</td>
</tr>
</table>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
</div>
<?php } else { ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td valign="top" class="photo_l">
<a name="p"></a>
<div class="photo_info">
<div class="photo_info_r"><span class="count_a"><?php echo $page;?></span> <span class="count_b">/ <?php echo $items;?></span></div>
<div>
<h1 class="title" id="title"><?php echo $title;?></h1>
日期：<?php echo $adddate;?>&nbsp;&nbsp;&nbsp;
<?php if($MOD['hits']) { ?>点击：<span id="hits"><?php echo $hits;?></span>&nbsp;&nbsp;&nbsp;<?php } ?>
<span onclick="window.open('<?php echo DT_PATH;?>api/view.php?img='+Dd('destoon_photo').src);" class="c_p">查看原图</span>&nbsp;&nbsp;&nbsp;
<span onclick="Go('<?php echo userurl($username, 'file='.$file.'&itemid='.$itemid.'&view=1', $domain);?>#p');" class="c_p">全部图片</span>
</div>
</div>
<div class="b10"></div>
<div id="photo">
<div><img src="<?php echo DT_SKIN;?>image/spacer.gif" id="cursor_a" onclick="Go('<?php echo $prev_photo;?>#p');" title="上一张"/></a><img src="<?php echo DT_SKIN;?>image/spacer.gif" id="cursor_b" onclick="Go('<?php echo $next_photo;?>#p');" title="下一张"/></div>
<div class="t_c"><img src="<?php echo $P['src'];?>" id="destoon_photo" oncontextmenu="return false;" onload="if(this.width>800)this.width=800;if(this.src.indexOf('spacer.gif')!=-1){this.width=800;this.height=1;}"/></div>
</div>
<?php if($P['introduce']) { ?><div class="photo_intro"><?php echo nl2br($P['introduce']);?></div><?php } ?>
<div class="b10"></div>
</td>
<td valign="top" class="photo_r">
<br/><br/><br/>
<a href="<?php echo $prev_photo;?>#p"><img src="<?php echo DT_SKIN;?>image/photo_prev.gif" title="上一张"/></a>
<br/><br/>
<div id="side">
<?php if(is_array($S)) { foreach($S as $k => $v) { ?>
<a href="<?php echo $v['linkurl'];?>#p"><img src="<?php echo $v['thumb'];?>" width="80" height="80" title="<?php echo $v['introduce'];?>" alt="" <?php if($page==$v['page']) { ?>class="thumb_b"<?php } else { ?>class="thumb_a" onmouseover="this.className='thumb_b';" onmouseout="this.className='thumb_a';"<?php } ?>/></a>
<?php } } ?>
</div>
<br/><br/>
<a href="<?php echo $next_photo;?>#p"><img src="<?php echo DT_SKIN;?>image/photo_next.gif" title="下一张"/></a>
<br/><br/>
</td>
</tr>
</table>
</div>
<div class="main_head"><div><strong>详细信息</strong></div></div>
<div class="main_body">
<?php if($CP) { ?><?php include template('property_show', 'chip');?><?php } ?>
<div class="content" id="content"><?php echo $content;?></div>
</div>
<?php if($could_comment && in_array($moduleid, explode(',', $EXT['comment_module']))) { ?>
<div id="comment_div" style="display:;">
<div class="main_head"><div><span class="f_r px12">共<span id="comment_count">0</span>条&nbsp;&nbsp;</span><strong><span id="message_title">相关评论</span></strong></div></div>
<div class="main_body"><script type="text/javascript">Df('<?php echo DT_PATH;?>api/comment.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>&proxy=<?php echo $comment_proxy;?>', 'id="destoon_comment" style="width:100%;"');</script></div>
</div>
<?php } ?>
<script type="text/javascript">$(function(){try{Dd('cursor_a').style.height = Dd('cursor_b').style.height =  Dd('destoon_photo').height+'px';} catch(e) {}});</script>
<?php } ?>
<?php } else { ?>
<br/><br/><br/><br/>
<form method="post" action="<?php echo DT_PATH;?>index.php">
<input type="hidden" name="homepage" value="<?php echo $username;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<table width="300" cellpadding="10" align="center">
<tr style="display:none;">
<td><input name="iebug" type="text" size="30"/></td>
</tr>
<?php if($open == 2) { ?>
<tr>
<td class="px14"><img src="<?php echo DT_SKIN;?>image/ico_lock.gif" width="16" height="16" align="absmiddle"/> <strong>请输入访问密码</strong></td>
</tr>
<?php } else if($open == 1) { ?>
<tr>
<td class="px14"><img src="<?php echo DT_SKIN;?>image/ico_lock.gif" width="16" height="16" align="absmiddle"/> <strong>请回答，<?php echo $question;?>？</strong></td>
</tr>
<?php } ?>
<tr>
<td><input name="key" type="text" size="30"/>&nbsp;&nbsp;<span class="f_red"><?php echo $error;?></span></td>
</tr>
<tr>
<td><input type="submit" name="submit" value=" 确 定 " class="sbm"/></td>
</tr>
</table>
</form>
<br/><br/><br/><br/><br/>
<?php } ?>
<?php } else { ?>
<table cellpadding="10" cellspacing="1" width="100%">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<?php if($k%4==0) { ?><tr align="center"><?php } ?>
<td valign="top" width="25%">
<div class="thumb">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php echo $v['thumb'];?>" width="160" height="120" alt="<?php echo $v['alt'];?>" title="<?php echo $v['alt'];?>"/></a>
<div><a href="<?php echo $v['linkurl'];?>" title="<?php echo $v['alt'];?>"><?php echo $v['title'];?></a></div>
<p><?php echo $v['items'];?>图<?php if($v['open']<3) { ?> <img src="<?php echo $MODULE['2']['linkurl'];?>image/ico_lock.gif" style="border:none;padding:0;" align="absmiddle" title="访问受限"/><?php } ?></p>
<p><?php echo timetodate($v['addtime'], 3);?></p>
</div>
</td>
<?php if($k%4==3) { ?></tr><?php } ?>
<?php } } ?>
</table>
<div class="pages"><?php echo $pages;?></div>
<?php } ?>
</div>
<?php if($itemid) { ?><script type="text/javascript">$(function(){Dd('side').style.display = Dd('split').style.display = 'none';});</script><?php } ?>
<?php include template('footer', $template);?>
<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div class="dsn" id="pos_show"><a href="<?php echo $COM['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MENU[$menuid]['linkurl'];?>"><?php echo $MENU[$menuid]['name'];?></a><?php if($itemid) { ?> <i>&gt;</i> <?php echo $title;?><?php } ?></div>
<div class="main_head"><div><strong><?php echo $MENU[$menuid]['name'];?></strong></div></div>
<div class="main_body">
<?php if($itemid) { ?>
<div class="title"><?php echo $title;?></div>
<div class="info">发布时间：<?php echo timetodate($addtime, 3);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浏览次数：<?php echo $hits;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $MENU[$menuid]['linkurl'];?>">返回列表</a></div>
<div class="content" id="content"><?php echo $content;?></div>
<script type="text/javascript">
var content_id = 'content';
var img_max_width = 600;
</script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script>
<?php } else { ?>
<table cellpadding="10" cellspacing="1" width="100%" align="center">
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<tr>
<td class="px14">&middot; <a href="<?php echo $v['linkurl'];?>"><?php echo $v['title'];?></a></td>
<td align="center" width="80" class="f_gray"><?php echo timetodate($v['addtime'], 3);?></td>
</tr>
<?php } } ?>
</table>
<div class="pages"><?php echo $pages;?></div>
<?php } ?>
</div>
<script type="text/javascript">
try {Dd('type_<?php echo $typeid;?>').innerHTML = '<strong>'+Dd('name_<?php echo $typeid;?>').innerHTML+'</strong>';}catch (e){}
</script>
<?php include template('footer', $template);?>
<?php defined('IN_DESTOON') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="<?php echo DT_CHARSET;?>"/>
<title><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php echo $DT['sitename'];?></title>
<link rel="stylesheet" type="text/css" href="<?php echo DT_PATH;?>admin/image/style.css"/>
<meta name="robots" content="noindex,nofollow"/>
<?php if(!DT_DEBUG) { ?><script type="text/javascript">window.onerror= function(){return true;}</script><?php } ?>
<script type="text/javascript" src="<?php echo DT_STATIC;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
<!--[if lte IE 9]><!-->
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery-1.5.2.min.js"></script>
<!--<![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery-2.1.1.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/admin.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/member.js"></script>
</head>
<body>
<?php if($job == 'item') { ?>
<div class="sbox">
<form action="?">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="job" value="<?php echo $job;?>"/>
<input type="hidden" name="from" value="<?php echo $from;?>"/>
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="username" value="<?php echo $username;?>"/>
<input type="text" size="40" name="kw" id="kw" value="<?php echo $kw;?>" title="关键词" placeholder="请输入关键词"/>&nbsp;
<?php echo $MODULE[$mid]['name'];?>ID：<input type="text" size="10" name="itemid" value="<?php echo $itemid;?>">&nbsp;
<input type="submit" value="搜 索" class="btn-g"/>&nbsp;
<input type="button" value="重 置" class="btn" onclick="Go('?action=<?php echo $action;?>&job=<?php echo $job;?>&mid=<?php echo $mid;?>&from=<?php echo $from;?>&username=<?php echo $username;?>');"/>
</form>
</div>
<table cellspacing="0" class="tb">
<tr>
<?php if($mid==16 && $from=='relate') { ?>
<th width="70">商品</th>
<?php } else { ?>
<th>ID</th>
<th width="14"> </th>
<?php } ?>
<?php if($mid == 4) { ?>
<th>公 司</th>
<?php } else { ?>
<th>标 题</th>
<th width="120">添加时间</th>
<?php } ?>
<th width="60">选择</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr align="center">
<?php if($mid==16 && $from=='relate') { ?>
<td><a href="javascript:_preview('<?php echo $v['thumb'];?>');"><img src="<?php echo $v['thumb'];?>" width="60" style="padding:5px;"/></a></td>
<?php } else { ?>
<td><?php echo $v['itemid'];?></td>
<td><?php if($v['level']) { ?><img src="<?php echo DT_PATH;?>admin/image/level_<?php echo $v['level'];?>.gif" title="<?php echo $v['level'];?>级" alt=""/><?php } ?></td>
<?php } ?>
<td align="left"><a href="<?php echo $v['linkurl'];?>" target="_blank"><?php echo $v['title'];?></a><?php if($v['thumb']) { ?> <a href="javascript:_preview('<?php echo $v['thumb'];?>');"><img src="<?php echo DT_PATH;?>admin/image/img.gif" width="10" height="10" title="标题图,点击预览" alt=""/></a><?php } ?></td>
<?php if($mid > 4) { ?>
<td><?php echo $v['adddate'];?></td>
<?php } ?>
<td>
<div class="dsn">
<div id="introduce_<?php echo $v['itemid'];?>"><?php echo $v['introduce'];?></div>
</div>
<a href="javascript:S('<?php echo $v['itemid'];?>','<?php echo $v['alt'];?>','<?php echo $v['linkurl'];?>','<?php echo $v['thumb'];?>','<?php echo $v['level'];?>','<?php echo $v['style'];?>');" class="t">[选择]</a>
</td>
</tr>
<?php } } ?>
</table>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">
function S(itemid, title, linkurl, thumb, introduce, level, style) {
try {
<?php if($from == 'special') { ?>
parent.Dd('title').value=title;
parent.Dd('linkurl').value=linkurl;
parent.Dd('thumb').value=thumb;
parent.Dd('introduce').value=Dd('introduce_'+itemid).innerHTML;
parent.color_select(style);
parent.$('#level').val(level);
<?php } else if($from == 'relate') { ?>
parent.Dd('id').value=itemid;
parent.Dd('dform_add').submit();
<?php } else { ?>
parent.Dd('key_id').value=itemid;
<?php } ?>
} catch(e) {}
try {parent.cDialog();} catch(e) {}
}
Dd('kw').focus();
var new_top = Number(parent.Dd('Dtop').style.top.replace('px', ''));
if(new_top > 100) new_top -= 50;
try{parent.Dd('Dtop').style.top=new_top+'px';}catch(e){}
</script>
<br/>
<?php } else { ?>
<?php if($mid) { ?>
<div class="sbox">
<form action="?">
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="job" value="<?php echo $job;?>"/>
<input type="hidden" name="from" value="<?php echo $from;?>"/>
<input type="hidden" name="fid" value="<?php echo $fid;?>"/>
<input type="text" size="60" name="kw" id="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<input type="submit" value="搜 索" class="btn-g"/>&nbsp;
<input type="button" value="返 回" class="btn" onclick="Go('?action=<?php echo $action;?>&job=<?php echo $job;?>&from=<?php echo $from;?>&fid=<?php echo $fid;?>');"/>&nbsp;
<input type="button" value="上 传" class="btn" onclick="window.open('<?php echo $DT['file_my'];?>?mid=12&action=add');"/>&nbsp;
<input type="button" value="关 闭" class="btn" onclick="<?php if($from == 'album') { ?>window.parent.cDialog();<?php } else { ?>window.close();<?php } ?>"/>
</form>
</div>
<?php } ?>
<style tyle="text/css">
.photo {width:115px;height:130px;overflow:hidden;float:left;text-align:center;padding:10px;}
.photo_img {width:100px;height:100px;overflow:hidden;padding:3px;margin:0 auto 8px auto;background:#FFFFFF;border:#CCCCCC 1px solid;cursor:pointer;}
</style>
<?php if($itemid || $DT['uploadlog']) { ?>
<script type="text/javascript">
function S(t, m, l) {
try {
<?php if($from == 'album') { ?>
window.parent.getAlbum(t, '<?php echo $fid;?>');
window.parent.cDialog();
<?php } else { ?>
window.opener.SetUrl(l);window.opener.GetE("frmUpload").reset();
window.close();
<?php } ?>
} catch(e) {}
}
</script>
<div>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div class="photo">
<div class="photo_img"><img src="<?php echo $v['thumb'];?>" width="100" title="<?php echo $v['introduce'];?>" onclick="S('<?php echo $v['thumb'];?>','<?php echo $v['middle'];?>','<?php echo $v['large'];?>');"/></div>
<div><a href="<?php echo $v['large'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/zoomin.gif"/></a>&nbsp;&nbsp;<a href="<?php echo $v['middle'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/zoomout.gif"/></a></div>
</div>
<?php } } ?>
<div class="c_b"></div>
<?php } else { ?>
<br/><br/><br/><center class="f_b">抱歉，您还没有上传过任何图片！</center><br/><br/><br/>
<?php } ?>
</div>
<?php } else { ?>
<div>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div class="photo">
<a href="?itemid=<?php echo $v['itemid'];?>&from=<?php echo $from;?>&fid=<?php echo $fid;?>"><img src="<?php echo $v['thumb'];?>" width="120" title="<?php echo $v['title'];?>"/></a>
<span class="f_gray"><?php echo $v['items'];?> 张图片</span>
</div>
<?php } } ?>
<div class="c_b"></div>
</div>
<?php } else { ?>
<br/><br/><br/><center class="f_b">您还没有创建<?php echo $MODULE[$mid]['name'];?>，<a href="<?php echo $DT['file_my'];?>?mid=12&action=add" target="_blank" class="t">点击这里立即创建</a></center><br/><br/><br/>
<?php } ?>
<?php } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } ?>
</body>
</html>
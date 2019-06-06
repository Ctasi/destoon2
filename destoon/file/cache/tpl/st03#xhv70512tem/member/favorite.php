<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="?action=add"><span>添加收藏</span></a></td>
<td class="tab" id="s3"><a href="?action=index"><span>商机收藏</span></a></td>
<td class="tab" id="type"><a href="javascript:Dwidget('type.php?item=favorite', '[收藏分类]', 600, 300);"><span>收藏分类</span></a></td>
</tr>
</table>
</div>
<?php if($action == 'edit' || $action == 'add') { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellspacing="1" cellpadding="5" class="tb">
<tr>
<td class="tl">分类</td>
<td class="tr"><span id="type_box"><?php echo $type_select;?></span>&nbsp; <a href="javascript:var type_item='favorite-<?php echo $_userid;?>',type_name='post[typeid]',type_default='<?php echo $L['default_type'];?>',type_id=<?php echo $typeid;?>,type_interval=setInterval('type_reload()',500);Dwidget('type.php?item=favorite', '[收藏分类]', 600, 300);" class="t">[管理分类]</a></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 标题</td>
<td class="tr"><input type="text" size="45" name="post[title]" id="title" value="<?php echo $title;?>"/> <?php echo dstyle('post[style]', $style);?> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 网址</td>
<td class="tr"><input type="text" size="60" name="post[url]" id="url" value="<?php echo $url;?>"/> <span id="durl" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">备注</td>
<td class="tr"><input type="text" size="60" name="post[note]" id="note" value="<?php echo $note;?>"/></td>
</tr>
<tr>
<td class="tl">排序</td>
<td class="tr f_gray"><input type="text" size="3" name="post[listorder]" id="listorder" value="<?php echo $listorder;?>"/> 请填写数字，数字越大越靠前</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value="<?php if($action=='add') { ?>添 加<?php } else { ?>修 改<?php } ?>" class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="取 消" class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">s('favorite');m(<?php if($action=='add') { ?>'add'<?php } else { ?>'s3'<?php } ?>);</script>
<?php } else { ?>
<form action="?">
<div class="tt">
&nbsp;<?php echo $fields_select;?>&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<?php echo $type_select;?>&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>&nbsp;
<input type="button" value=" 重 置 " class="btn" onclick="Go('?');"/>
</div>
</form>
<style type="text/css">
.list-favor {border-top:#DDDDDD 1px solid;border-left:#DDDDDD 1px solid;display:table;margin:10px 0;}
.list-favor div {width:189px;height:245px;overflow:hidden;padding:20px;float:left;border-right:#DDDDDD 1px solid;border-bottom:#DDDDDD 1px solid;}
.list-favor p {height:189px;overflow:hidden;margin:0;}
.list-favor p img {width:189px;}
.list-favor h6 {height:40px;line-height:20px;overflow:hidden;margin:20px 0 0 0;padding:0;font-weight:normal;}
.list-favor b {display:none;width:229px;height:24px;line-height:24px;margin:-20px 0 0 -20px;background:#333333;font-weight:normal;text-align:center;color:#FFFFFF;z-index:2;position:absolute;opacity:0.8;filter:alpha(opacity=80);}
.list-favor div:hover {background:#F1F1F1;}
.list-favor div:hover b {display:block;}
</style>
<div class="list-favor">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div>
<b><a href="?action=edit&itemid=<?php echo $v['itemid'];?>" class="w">修改</a>&nbsp; | &nbsp;<a href="?action=delete&itemid=<?php echo $v['itemid'];?>" onclick="return confirm('确定要删除吗？此操作将不可撤销');" class="w">删除</a></b>
<p><a href="<?php echo $v['url'];?>" target="_blank"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic160.png<?php } ?>"/></a></p>
<h6><a href="<?php echo $v['url'];?>" target="_blank" class="t"><?php echo $v['title'];?></a></h6>
</div>
<?php } } ?>
</div>
<?php if($MG['favorite_limit']) { ?>
<div class="limit">收藏夹容量 <span class="f_b f_red"><?php echo $MG['favorite_limit'];?></span> 条&nbsp;&nbsp;&nbsp;当前已收藏 <span class="f_b"><?php echo $limit_used;?></span> 条&nbsp;&nbsp;&nbsp;还可以收藏 <span class="f_b f_blue"><?php echo $limit_free;?></span> 条</div>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('favorite');m('s3');</script>
<?php } ?>
<?php if($action=='add' || $action=='edit') { ?>
<script type="text/javascript">
function check() {
if(Dd('title').value.length < 2) {
Dmsg('请填写标题', 'title');
return false;
}
if(Dd('url').value.length < 12) {
Dmsg('请填写网址', 'url');
return false;
}
return true;
}
</script>
<?php } ?>
<?php include template('footer', 'member');?>
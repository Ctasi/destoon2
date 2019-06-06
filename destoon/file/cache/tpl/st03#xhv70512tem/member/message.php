<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<link rel="stylesheet" type="text/css" href="image/message.css"/>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="send"><a href="?action=send"><span>发送信件</span></a></td>
<td class="tab" id="inbox"><a href="?action=inbox"><span>收件箱</span></a></td>
<td class="tab" id="outbox"><a href="?action=outbox"><span>已发送</span></a></td>
<td class="tab" id="draft"><a href="?action=draft"><span>草稿箱</span></a></td>
<td class="tab" id="recycle"><a href="?action=recycle"><span>回收站</span></a></td>
<td class="tab" id="export"><a href="?action=export"><span>信件导出</span></a></td>
<td class="tab" id="empty"><a href="?action=empty"><span>信件清理</span></a></td>
<td class="tab" id="setting"><a href="?action=setting"><span>信件设置</span></a></td>
</tr>
</table>
</div>
<?php if($action == 'send') { ?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/> 
<input type="hidden" name="typeid" value="<?php echo $typeid;?>"/> 
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 收件人</td>
<td class="tr f_gray"><input type="text" size="45" name="post[touser]" id="touser" value="<?php echo $touser;?>"/>&nbsp;&nbsp;<a href="javascript:Dwidget('friend.php?action=my', '[我的商友]', 600, 300);" class="t">[我的商友]</a> <span id="dtouser" class="f_red"></span>
<br/>多个收件人请按空格键隔开 最多同时发送给<?php echo $MOD['maxtouser'];?>个收件人</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 标题</td>
<td class="tr"><input type="text" size="60" name="post[title]" id="title" value="<?php echo $title;?>"/> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 内容</td>
<td class="tr"><textarea name="post[content]" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', 'Message', '100%', 200);?><br/><span id="dcontent" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">选项</td>
<td class="tr">
<input type="checkbox" name="post[save]" id="save" value="1" onclick="if(this.checked){Dd('copy').checked=Dd('feedback').checked=false;}"/> 不发送，保存为草稿
<input type="checkbox" name="post[copy]" id="copy" value="1" onclick="if(this.checked){Dd('save').checked=false;}"/> 保存到已发送
<input type="checkbox" name="post[feedback]" id="feedback" value="1" onclick="if(this.checked){Dd('save').checked=false;}"/> 已读回执
</td>
</tr>
<?php if($need_captcha) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<?php } ?>
<tr>
<td class="tl"> </td>
<td class="tr" height="50">
<input type="submit" name="submit" value=" 确 定 " class="btn_g"/>
<?php if($MG['message_limit']) { ?>
&nbsp;&nbsp;&nbsp;今日可发 <span class="f_b f_red"><?php echo $MG['message_limit'];?></span> 次
&nbsp;&nbsp;&nbsp;当前已发 <span class="f_b"><?php echo $limit_used;?></span> 次
&nbsp;&nbsp;&nbsp;还可以发 <span class="f_b f_blue"><?php echo $limit_free;?></span> 次
<?php } ?>
</td>
</tr>
</table>
</form>
<?php echo load('clear.js');?>
<script type="text/javascript">
function check() {
var len;
if(Dd('save').checked == false) {
if(Dd('touser').value == '') {
Dmsg('请填写收件人', 'touser');
return false;
}
var max = <?php echo $MOD['maxtouser'];?>;
if(max && substr_count(Dd('touser').value, ' ') >= max) {
Dmsg('最多可以选择'+max+'个收件人', 'touser');
return false;
}
}
len = Dd('title').value.length;
if(len < 5) {
Dmsg('标题不能少于5个字，当前已输入'+len+'个字', 'title');
return false;
}
if(len > 60) {
Dmsg('标题不能多于60个字，当前已输入'+len+'个字', 'title');
return false;
}
len = FCKLen();
if(len < 10) {
Dmsg('内容不能少于10个字，当前已输入'+len+'个字', 'content');
return false;
}
if(len > 5000) {
Dmsg('内容不能多于5000个字，当前已输入'+len+'个字', 'content');
return false;
}
<?php if($need_captcha) { ?>
f = 'captcha';
if($('#c'+f).html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的验证码', f);
return false;
}
<?php } ?>
return true;
}
</script>
<?php } else if($action == 'edit') { ?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/> 
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/> 
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 收件人</td>
<td class="tr f_gray"><input type="text" size="45" name="message[touser]" id="touser" value="<?php echo $touser;?>"/>&nbsp;&nbsp;<a href="javascript:Dwidget('friend.php?action=my', '[我的商友]', 600, 300);" class="t">[我的商友]</a> <span id="dtouser" class="f_red"></span><br/>多个收件人请按空格键隔开 最多同时发送给<?php echo $MOD['maxtouser'];?>个收件人</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 标题</td>
<td class="tr f_gray"><input type="text" size="60" name="message[title]" id="title" value="<?php echo $title;?>"/> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 内容</td>
<td class="tr f_gray"><textarea name="message[content]" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', 'Simple', '100%', 200);?><br/><span id="dcontent" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">选项</td>
<td class="tr">
<input type="checkbox" name="message[send]" id="sendmsg" value="1" onclick="if(!this.checked){Dd('copy').checked=Dd('feedback').checked=false;}"/> 发送信件
<input type="checkbox" name="message[copy]" id="copy" value="1" onclick="if(this.checked){Dd('sendmsg').checked=true;}"/> 保存到已发送
<input type="checkbox" name="message[feedback]" id="feedback" value="1" onclick="if(this.checked){Dd('sendmsg').checked=true;}"/> 已读回执
</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 确 定 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<?php echo load('clear.js');?>
<script type="text/javascript">
function check() {
var len;
if(Dd('sendmsg').checked == true) {
if(Dd('touser').value == '') {
Dmsg('请填写收件人', 'touser');
return false;
}
var max = <?php echo $MOD['maxtouser'];?>;
if(max && substr_count(Dd('touser').value, ' ') >= max) {
Dmsg('最多可以选择'+max+'个收件人', 'touser');
return false;
}
}
len = Dd('title').value.length;
if(len < 5) {
Dmsg('标题不能少于5个字，当前已输入'+len+'个字', 'title');
return false;
}
if(len > 60) {
Dmsg('标题不能多于60个字，当前已输入'+len+'个字', 'title');
return false;
}
len = FCKLen();
if(len < 10) {
Dmsg('内容不能少于10个字，当前已输入'+len+'个字', 'content');
return false;
}
if(len > 5000) {
Dmsg('内容不能多于5000个字，当前已输入'+len+'个字', 'content');
return false;
}
return true;
}
</script>
<?php } else if($action == 'export') { ?>
<form method="post" action="?">
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">提示</td>
<td class="tr f_blue">&nbsp;请定期导出重要信件，以免被系统自动清除</td>
</tr>
<tr>
<td class="tl">信件</td>
<td class="tr">
<input type="radio" value="3" name="message[status]" checked="checked"/> 收件箱
<input type="radio" value="2" name="message[status]" /> 已发送
<input type="radio" value="1" name="message[status]" /> 草稿箱
<input type="radio" value="4" name="message[status]" /> 回收站
</td>
</tr>
<tr>
<td class="tl">日期范围</td>
<td class="tr">
<?php echo dcalendar('message[fromdate]', $fromdate);?> 至 <?php echo dcalendar('message[todate]', $todate);?>
<br/><span class="f_gray">每次最多导出100封，请设置合理的时间段，以免遗漏部分信件</span>
</td>
</tr>
<tr>
<td class="tl">选项</td>
<td class="tr">
<input type="checkbox" value="1" name="message[isread]" /> 仅导出未读信件
</td>
</tr>
<tr>
<td class="tl"> </td>
<td class="tr" height="50">
<input type="submit" name="submit" value=" 导 出 " class="btn_g"/>
</td>
</tr>
</table>
</form>
<?php } else if($action == 'empty') { ?>
<form method="post" action="?">
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl">信件</td>
<td class="tr">
<input type="radio" value="3" name="message[status]" checked="checked"/> 收件箱
<input type="radio" value="2" name="message[status]" /> 已发送
<input type="radio" value="1" name="message[status]" /> 草稿箱
<input type="radio" value="4" name="message[status]" /> 回收站
</td>
</tr>
<tr>
<td class="tl">日期范围</td>
<td class="tr">
<?php echo dcalendar('message[fromdate]', $fromdate);?> 至 <?php echo dcalendar('message[todate]', $todate);?>
</td>
</tr>
<tr>
<td class="tl">选项</td>
<td class="tr">
<input type="checkbox" value="1" name="message[isread]" checked/> 保留未读信件
</td>
</tr>
<tr>
<td class="tl"> </td>
<td class="tr" height="50">
<input type="submit" name="submit" value=" 清 理 " class="btn_r" onclick="if(!confirm('确定要清理吗？此操作将不可撤销')) return false;"/>
</td>
</tr>
</table>
</form>
<?php } else if($action == 'show') { ?>
<div class="message_head">
<strong class="px14"><?php echo $title;?></strong><br/>
<?php echo $addtime;?>&nbsp;&nbsp;&nbsp;
<?php if($status==4 || $status==3) { ?>
<?php if($fromuser) { ?>
<span>发件人：</span><a href="<?php echo userurl($fromuser);?>" target="_blank" class="t"><?php echo $fromuser;?></a><br/>
<?php } ?>
<?php } else if($status==2) { ?>
<span>收件人：</span><a href="<?php echo userurl($touser);?>" target="_blank" class="t"><?php echo $touser;?></a><br/>
<?php } ?>
</div>
<div class="message_body">
<?php echo $content;?>
</div>
<div class="message_foot">
<input type="button" value="返 回" class="btn" onclick="history.back(-1);"/>&nbsp; 
<?php if($status==4) { ?>
<input type="button" class="btn" value="还 原" onclick="Go('?action=restore&itemid=<?php echo $itemid;?>&forward=<?php echo urlencode('?action=inbox');?>');"/>&nbsp; 
<?php if($fromuser) { ?>
<input type="button" class="btn" value="回 复" onclick="Go('?action=send&touser=<?php echo $fromuser;?>&title=RE:<?php echo urlencode($title);?>');"/>&nbsp; 
<input type="button" class="btn" value="转 发" onclick="Dd('_send').submit();"/>
<input type="button" class="btn" value="拒 收" onclick="if(confirm('确定要拒绝来自 <?php echo $fromuser;?> 的站内信吗？'))Go('?action=refuse&username=<?php echo $fromuser;?>');"/>&nbsp;  
<?php } ?>
<input type="button" class="btn" value="彻底删除" onclick="if(confirm('确定要删除此信件吗？此操作不可撤销')) Go('?action=delete&itemid=<?php echo $itemid;?>&forward=<?php echo urlencode('?action=recycle');?>');"/>&nbsp; 
<?php } else if($status==3) { ?>
<?php if($fromuser) { ?>
<input type="button" class="btn" value="回 复" onclick="Go('?action=send&touser=<?php echo $fromuser;?>&title=RE:<?php echo urlencode($title);?>');"/>&nbsp; 
<input type="button" class="btn" value="转 发" onclick="Dd('_send').submit();"/>&nbsp;
<input type="button" class="btn" value="拒 收" onclick="if(confirm('确定要拒绝来自 <?php echo $fromuser;?> 的站内信吗？'))Go('?action=refuse&username=<?php echo $fromuser;?>');"/>&nbsp;  
<?php } ?>
<input type="button" class="btn" value="回收站" onclick="Go('?action=delete&itemid=<?php echo $itemid;?>&forward=<?php echo urlencode('?action=inbox');?>');"/>&nbsp;
<input type="button" class="btn" value="彻底删除" onclick="if(confirm('确定要删除此信件吗？此操作不可撤销')) Go('?action=delete&recycle=0&itemid=<?php echo $itemid;?>&forward=<?php echo urlencode('?action=inbox');?>');"/>&nbsp; 
<?php } else if($status==2) { ?>
 <?php if($fromuser) { ?>
 <input type="button" class="btn" value="转 发" onclick="Dd('_send').submit();"/>&nbsp;
 <?php } ?>
 <input type="button" class="btn" value="彻底删除" onclick="if(confirm('确定要删除此信件吗？此操作不可撤销')) Go('?action=delete&itemid=<?php echo $itemid;?>&forward=<?php echo urlencode('?action=outbox');?>');"/>&nbsp; 
<?php } else if($status==1) { ?>
 <?php if($fromuser) { ?>
 <input type="button" class="btn" value="转 发" onclick="Dd('_send').submit();"/>&nbsp;
 <?php } ?> 
 <input type="button" class="btn" value="彻底删除" onclick="if(confirm('确定要删除此信件吗？此操作不可撤销')) Go('?action=delete&itemid=<?php echo $itemid;?>&forward=<?php echo urlencode('?action=draft');?>');"/>&nbsp;
<?php } else if($status==0) { ?>
<?php } ?>
<form action="?" method="post" id="_send">
<input type="hidden" name="action" value="send"/>
<textarea name="title" class="dsn"><?php echo $title;?></textarea>
<textarea name="content" class="dsn"><?php echo $content;?></textarea>
</form>
</div>
<?php } else if($action == 'setting') { ?>
<form method="post" action="?">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="10" cellspacing="1" class="tb">
<tr>
<td class="tl" width="80">黑名单</td>
<td class="tr f_gray"><textarea name="black" id="black" style="width:90%;height:100px;overflow:visible;"><?php echo $user['black'];?></textarea><br/>[提示] 直接输入会员名即可将会员列入黑名单，多个会员名请用空格键隔开，禁止游客请填Guest</td>
</tr>
<tr style="display:<?php if(!$could_send) { ?>none<?php } ?>;">
<td class="tl">未读信转发</td>
<td class="tr f_gray">
<input type="radio" name="send" value="1" <?php if($user['send']) { ?>checked<?php } ?>/> 开启&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="send" value="0" <?php if(!$user['send']) { ?>checked<?php } ?>/> 关闭
&nbsp;&nbsp;
系统将自动转发未读站内信至注册邮箱
</td>
</tr>
<tr>
<td class="tl"> </td>
<td height="50" class="tr">
<input type="submit" name="submit" value=" 更 新 " class="btn_g"/>
</td>
</tr>
</table>
</form>
<?php } else { ?>
<div class="tt">
<form action="?">
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="status" value="<?php echo $status;?>"/>
<select name="typeid">
<option value="-1">类型</option>
<?php if(is_array($NAME)) { foreach($NAME as $k => $v) { ?>
<option value="<?php echo $k;?>"<?php if($k==$typeid) { ?> selected<?php } ?>><?php echo $v;?></option>
<?php } } ?>
</select>
<select name="style">
<option value="">标记</option>
<?php if(is_array($COLORS)) { foreach($COLORS as $v) { ?>
<option value="<?php echo $v;?>"<?php if($v==$style) { ?> selected<?php } ?> style="background:#<?php echo $v;?>;">&nbsp;</option>
<?php } } ?>
</select>
<select name="fields">
<option value="title"<?php if($fields=='title') { ?> selected<?php } ?>>标题</option>
<option value="content"<?php if($fields=='content') { ?> selected<?php } ?>>全文</option>
</select>
<input type="text" name="kw" value="<?php echo $kw;?>" size="50" title="关键词"/>&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>&nbsp;
<input type="button" value=" 重 置 " class="btn" onclick="Go('?action=<?php echo $action;?>');"/>
</form>
</div>
<div class="nav">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="<?php if($typeid==-1) { ?>nav_2<?php } else { ?>nav_1<?php } ?>"><a href="?action=<?php echo $action;?>">全部</a></td>
<?php if(is_array($NAME)) { foreach($NAME as $k => $v) { ?>
<td class="<?php if($typeid==$k) { ?>nav_2<?php } else { ?>nav_1<?php } ?>"><a href="?action=<?php echo $action;?>&typeid=<?php echo $k;?>"><?php echo $v;?></a></td>
<?php } } ?>
</tr>
</table>
</div>
<form method="post">
<div class="ls">
<table cellspacing="0" cellpadding="10" class="tb">
<tr>
<th width="20"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th width="28">类型</th>
<th>&nbsp;标 题</th>
<?php if($status>1) { ?><th width="150"><?php if($status==2) { ?>收件人<?php } else { ?>发件人<?php } ?></th><?php } ?>
<th width="160" align="center">时 间</th>
<?php if($status==3) { ?>
<th width="50" align="center">标记</th>
<?php } ?>
</tr>
<?php if($status==3) { ?>
<?php if(is_array($systems)) { foreach($systems as $v) { ?>
<tr align="center">
<td><input type="checkbox" disabled/></td>
<td><img src="image/message_sys.gif" width="16" height="16" title="系统广播" alt=""/></td>
<td align="left"><a href="?action=show&itemid=<?php echo $v['itemid'];?>"><span class="f_red" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></span></a></td>
<td><?php echo $v['user'];?></td>
<td><?php echo $v['adddate'];?></td>
<?php if($status==3) { ?><td>--</td><?php } ?>
</tr>
<?php } } ?>
<?php } ?>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<tr align="center">
<td><input type="checkbox" name="itemid[]" value="<?php echo $v['itemid'];?>"/></td>
<td><a href="?action=<?php echo $action;?>&typeid=<?php echo $v['typeid'];?>"><img src="image/message_<?php echo $v['typeid'];?>.gif" width="16" height="16" title="<?php echo $NAME[$v['typeid']];?>" alt=""/></a></td>
<td align="left"><a href="<?php if($status==1) { ?>?action=edit&itemid=<?php echo $v['itemid'];?><?php } else { ?>?action=show&itemid=<?php echo $v['itemid'];?><?php } ?>"<?php if($status>2 && !$v['isread']) { ?> class="f_b"<?php if($v['feedback']) { ?>onclick="if(confirm('该信件请求发送已读回执，是否发送？')){ Go(this.href+'&feedback=1');return false;}"<?php } ?><?php } ?><?php if($v['style']) { ?> style="color:#<?php echo $v['style'];?>;"<?php } ?> class="t" title="<?php echo $v['title'];?>&#10;编号：<?php echo $v['itemid'];?>"><?php echo $v['dtitle'];?></a></td>
<?php if($status>1) { ?><td align="center"><?php if($v['userurl']) { ?><a href="<?php echo $v['userurl'];?>" target="_blank"><?php echo $v['user'];?></a><?php } else { ?><?php echo $v['user'];?><?php } ?></td><?php } ?>
<td><?php echo $v['adddate'];?></td>
<?php if($status==3) { ?>
<td>
<select name="style" onchange="Go('?itemid=<?php echo $v['itemid'];?>&action=color&style='+this.value);">
<option value="">标记</option>
<option value="">取消</option>
<?php echo $color_select;?>
</select>
</td>
<?php } ?>
</tr>
<?php } } ?>
</table>
<div class="btns">
<?php if($status==4) { ?>
<input type="submit" value=" 还 原 " class="btn" onclick="this.form.action='?action=restore';"/>&nbsp;
<input type="submit" value=" 彻底删除 " class="btn" onclick="if(confirm('确定要删除选中信件吗？此操作不可撤销')){this.form.action='?action=delete';}else{return false;}"/>&nbsp;
<?php } else if($status==3) { ?>
<?php if($_message) { ?>
<input type="submit" value=" 标记已读 " class="btn" onclick="this.form.action='?action=mark';"/>&nbsp;
<input type="submit" value=" 全部已读 " class="btn" onclick="if(confirm('确定要标记全部信件为已读吗？此操作不可撤销')){this.form.action='?action=markall';}else{return false;}"/>&nbsp;
<?php } ?>
<input type="submit" value=" 回收站 " class="btn" onclick="this.form.action='?action=delete';"/>&nbsp;
<input type="submit" value=" 彻底删除 " class="btn" onclick="if(confirm('确定要删除选中信件吗？此操作不可撤销')){this.form.action='?action=delete&recycle=0';}else{return false;}"/>&nbsp;
<?php } else { ?>
<input type="submit" value=" 彻底删除 " class="btn" onclick="if(confirm('确定要删除选中信件吗？此操作不可撤销')){this.form.action='?action=delete';}else{return false;}"/>&nbsp;
<?php } ?>
<input type="submit" value=" 清 空 " class="btn" onclick="if(confirm('确定要清空<?php echo $name;?>信件吗？此操作不可撤销')){this.form.action='?action=clear&status=<?php echo $status;?>';}else{return false;}"/>&nbsp;
</div>
</form>
</div>
<?php if($status==3) { ?>
<?php if($MG['inbox_limit']) { ?>
<div class="limit">收件箱容量 <span class="f_b f_red"><?php echo $MG['inbox_limit'];?></span> 条&nbsp;&nbsp;&nbsp;当前接收 <span class="f_b"><?php echo $limit_used;?></span> 条&nbsp;&nbsp;&nbsp;还可以接收 <span class="f_b f_blue"><?php echo $limit_free;?></span> 条&nbsp;&nbsp;&nbsp;建议定期删除无用信件</div>
<?php } ?>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
<?php } ?>
<script type="text/javascript">s('message');m('<?php echo $menuid;?>');</script>
<?php include template('footer',$module);?>
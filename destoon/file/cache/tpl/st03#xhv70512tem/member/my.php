<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<?php if($MYMODS) { ?>
<?php if($_userid) { ?>
<?php } else { ?>
<div class="warn">您还没有登录，目前仅拥有以下栏目的发布权限，建议您 <a href="<?php echo $DT['file_login'];?>" class="t">立即登录</a> 或 <a href="<?php echo $DT['file_register'];?>" class="t">注册会员</a></div>
<?php } ?>
<table cellspacing="1" cellpadding="10" class="tb">
<?php if(is_array($MYMODS)) { foreach($MYMODS as $v) { ?>
<tr>
<td class="tl"><a href="<?php echo $MODULE[$v]['linkurl'];?>" target="_blank"><?php echo $MODULE[$v]['name'];?></a></td>
<td class="tr">
<?php if($_userid) { ?><a href="?mid=<?php echo $v;?>" class="b">管理</a>&nbsp;&nbsp;<?php } ?>
<?php if($MODULE[$v]['module'] == 'club') { ?>
<a href="?mid=<?php echo $v;?>&job=group&action=add" class="b">创建</a>
<?php } else { ?>
<a href="?mid=<?php echo $v;?>&action=add" class="b">发布</a>
<?php } ?>
</td>
</tr>
<?php } } ?>
<?php if($MG['resume']) { ?>
<?php if(is_array($MODULE)) { foreach($MODULE as $k => $v) { ?>
<?php if($v['module'] == 'job') { ?>
<tr>
<td class="tl"><a href="<?php echo $v['linkurl'];?>" target="_blank">简历</a></td>
<td class="tr">
<?php if($_userid) { ?><a href="?mid=<?php echo $k;?>&job=resume" class="b">管理</a>&nbsp;&nbsp;<?php } ?>
<a href="?mid=<?php echo $v;?>&job=resume&action=add" class="b">创建</a>
</td>
</tr>
<?php } ?>
<?php } } ?>
<?php } ?>
</table>
<?php } else { ?>
<?php if($_userid) { ?>
<div class="warn">尊敬的<strong><?php echo $MG['groupname'];?></strong>，您的会员组没有在本站发布信息的权限，请返回。&nbsp;&nbsp;<a href="./" class="t">点击返回商务中心首页</a></div>
<?php } else { ?>
<div class="warn">您还没有登录，目前没有信息发布权限，建议您 <a href="<?php echo $DT['file_login'];?>" class="t">立即登录</a> 或 <a href="<?php echo $DT['file_register'];?>" class="t">注册会员</a></div>
<?php } ?>
<?php } ?>
<?php include template('footer', 'member');?>
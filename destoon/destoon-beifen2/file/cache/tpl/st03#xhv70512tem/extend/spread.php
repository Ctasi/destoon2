<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="820"><a href="./" onfocus="this.blur();"><img src="<?php echo DT_SKIN;?>image/spread-banner.png" width="820" height="260"/></a></td>
<td valign="top">
<br/><br/>
<form action="index.php" onsubmit="return check();">
<div><input type="text" name="kw" id="spread_kw" class="sp_input" value="<?php if($kw) { ?><?php echo $kw;?><?php } else { ?>请输入关键词...<?php } ?>" onfocus="if(this.value=='请输入关键词...')this.value='';"/></div>
<div style="padding:16px 0;"><input type="image" src="<?php echo DT_SKIN;?>image/btn_spread.gif" align="absmiddle"/>&nbsp;&nbsp;<a href="<?php echo $MODULE['2']['linkurl'];?>spread.php" class="b">我的推广</a>&nbsp;&nbsp;<?php if($DT['telephone']) { ?>咨询电话：<?php echo $DT['telephone'];?><?php } ?></div>
</form>
<div class="new_head">最新出价</div>
<div class="new_body">
<div id="spread_up" style="height:75px;overflow:hidden;">
<ul>
<?php $tags=tag("table=spread&condition=status=3 and company<>''&pagesize=20&order=addtime desc&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $t) { ?>
<li><span class="f_r"><span class="new_price"><?php echo $t['price'];?><?php echo $unit;?></span></span><a href="<?php echo rewrite('list.php?kw='.urlencode($t['word']));?>" class="b"><?php echo $t['word'];?></a> <span class="f_gray"><?php echo $t['company'];?></span></li>
<?php } } ?>
</ul>
</div>
</div>
</td>
</tr>
</table>
<?php if($action == 'list') { ?>
<div class="list_tb">
<h1>关键词“<a href="<?php echo rewrite('list.php?kw='.urlencode($kw));?>"><span class="f_red"><?php echo $kw;?></span></a>”<?php if($mid) { ?>在“<span class="f_red"><?php echo $MODULE[$mid]['name'];?></span>”频道<?php } ?>推广记录&nbsp;&nbsp;&nbsp;&nbsp;<a href="./" class="b">重新选词</a></h1>
<?php if($lists) { ?>
<table cellpadding="8" cellspacing="1">
<tr>
<th>频道</th>
<th>公司</th>
<th>出价</th>
<th>单位</th>
<th>开始日期</th>
<th>结束日期</th>
<th>投放状态</th>
<th>申请时间</th>
<th>信息</th>
<th>我要推广</th>
</tr>
<tr>
<td colspan="10" height="10"> </td>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<?php if($v['bg']) { ?>
<tr>
<td colspan="10" class="list_dl">&nbsp;</td>
</tr>
<?php } ?>
<tr align="center">
<td><a href="<?php echo rewrite('list.php?mid='.$v[mid].'kw='.urlencode($kw));?>"><?php echo $MODULE[$v['mid']]['name'];?></a></td>
<td><a href="<?php echo userurl($v['username']);?>" target="_blank"><?php echo $v['company'];?></a></td>
<td class="f_red"><?php echo $v['price'];?><?php if($v['currency']=='money') { ?><?php echo $DT['money_unit'];?><?php } else { ?><?php echo $DT['credit_unit'];?><?php } ?></td>
<td><?php if($v['currency']=='money') { ?><?php echo $DT['money_unit'];?><?php } else { ?><?php echo $DT['credit_unit'];?><?php } ?></td>
<td><?php echo timetodate($v['fromtime'], 3);?></td>
<td><?php echo timetodate($v['totime'], 3);?></td>
<td><?php echo $v['process'];?></td>
<td class="f_gray"><?php echo timetodate($v['addtime'], 5);?></td>
<td><a href="<?php echo DT_PATH;?>api/redirect.php?mid=<?php echo $v['mid'];?>&itemid=<?php echo $v['tid'];?>" target="_blank">直达</a></td>
<td><a href="<?php echo $MODULE['2']['linkurl'];?>spread.php?action=list&mid=<?php echo $v['mid'];?>&kw=<?php echo urlencode($kw);?>" target="_blank" class="b">立即推广</a></td>
</tr>
<?php } } ?>
</table>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } else { ?>
<br/><br/><center><span class="px16 f_gray">暂无推广记录</span><br/><br/><br/><br/><a href="<?php echo $MODULE['2']['linkurl'];?>spread.php?action=list&mid=<?php echo $mid;?>&kw=<?php echo urlencode($kw);?>"><div class="btn-green">我要推广</div></a></center><br/><br/><br/><br/>
<?php } ?>
</div>
<?php } else { ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="380" valign="top">
<div class="rank_box">
<div class="rank_head">本周搜索排行</div>
<div class="rank_list">
<?php echo tag("table=keyword&condition=status=3 and updatetime>$today_endtime-86400*7&pagesize=10&order=week_search desc&key=week_search&template=list-search_spread");?>
</div>
</div>
</td>
<td width="30"></td>
<td valign="top">
<div class="rank_box">
<div class="rank_head">本月搜索排行</div>
<div class="rank_list">
<?php echo tag("table=keyword&condition=status=3 and updatetime>$today_endtime-86400*30&pagesize=10&order=month_search desc&key=month_search&template=list-search_spread");?>
</div>
</div>
</td>
<td width="30"></td>
<td width="380" valign="top">
<div class="rank_box">
<div class="rank_head">总搜索排行</div>
<div class="rank_list">
<?php echo tag("table=keyword&condition=status=3&pagesize=10&order=total_search desc&key=total_search&template=list-search_spread");?>
</div>
</div>
</td>
</tr>
</table>
<?php } ?>
</div>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/marquee.js"></script>
<script type="text/javascript">
new dmarquee(25, 30, 2000, 'spread_up');
function check() {
if(Dd('spread_kw').value.length < 1 || Dd('spread_kw').value == '请输入关键词...') {
alert('请输入关键词');
Dd('spread_kw').focus();
return false;
}
}
</script>
<?php include template('footer');?>
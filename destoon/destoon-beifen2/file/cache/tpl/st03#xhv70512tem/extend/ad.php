<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m m1 mt20">
<div class="m1l nobg">
<?php if($action == 'view') { ?>
<br/><br/><br/>
<center>
<?php if($ad_moduleid) { ?>
<?php echo ad($ad_moduleid,$ad_catid,$ad_kw,$typeid);?>
<?php } else if($pid) { ?>
<?php echo ad($pid);?>
<?php } ?>
</center>
<br/><br/><br/>
<br/><br/><br/>
<center class="f_gray">以上为广告效果预览，如未看到任何内容，表明此广告为空或不可预览</center>
<br/><br/><br/>
<?php } else { ?>
<table cellpadding="16" cellspacing="0" class="tb">
<tr>
<th width="60">编号</th>
<?php if(!$typeid) { ?><th>广告类型</th><?php } ?>
<th>广告位名称</th>
<th>规格(px)</th>
<th width="60">价格</th>
<th width="80">示意图</th>
<?php if($MOD['ad_buy']) { ?><th width="60">预定</th><?php } ?>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr align="center" title="<?php echo $v['introduce'];?>">
<td id="a_<?php echo $v['pid'];?>">A<?php echo $v['pid'];?></td>
<?php if(!$typeid) { ?><td><a href="<?php echo $url;?><?php echo list_url($v['typeid']);?>"><?php echo $v['typename'];?></a></td><?php } ?>
<td class="px14"><a href="<?php echo $url;?><?php echo show_url($v['pid']);?>" title="效果预览"><?php echo $v['name'];?></a></td>
<td class="f_gray"><?php echo $v['width'];?> x <?php echo $v['height'];?></td>
<td class="f_orange"><?php if($v['price']) { ?><?php echo $v['price'];?><?php echo $unit;?>/月<?php } else { ?>面议<?php } ?></td>
<td<?php if($v['thumb']) { ?> onmouseover="show_tip(Dd('a_<?php echo $v['pid'];?>'),'<?php echo $v['thumb'];?>');" onmouseout="show_tip(0,0);" onclick="View('<?php echo $v['thumb'];?>');" title="点击查看大图"<?php } ?> class="<?php if($v['thumb']) { ?>f_dblue c_p<?php } else { ?>f_gray<?php } ?>"><?php if($v['thumb']) { ?>查看<?php } else { ?>暂无<?php } ?></td>
<?php if($MOD['ad_buy']) { ?>
<td><a href="<?php echo $MODULE['2']['linkurl'];?>ad.php?action=add&pid=<?php echo $v['pid'];?>" class="b">预定</a></td>
<?php } ?>
</tr>
<?php } } ?>
</table>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php } ?>
</div>
<div class="m1r side nobg">
<ul>
<li class="side_li" id="type_0"><a href="<?php echo $url;?>">广告中心</a></li>
<li class="side_li" id="type_my"><a href="<?php echo $MODULE['2']['linkurl'];?>ad.php">我的广告</a></li>
<?php if(is_array($TYPE)) { foreach($TYPE as $k => $v) { ?>
<?php if($k) { ?><li class="side_li" id="type_<?php echo $k;?>"><a href="<?php echo $url;?><?php echo list_url($k);?>"><?php echo $v;?></a></li><?php } ?>
<?php } } ?>
</ul>
<form action="index.php"><input type="search" name="kw" value="<?php echo $kw;?>" ondblclick="if(this.value){Go('./');}" placeholder="搜索" title="输入关键词，按回车搜索"/></form>
</div>
<div class="c_b"></div>
</div>
<div class="img_tip" id="show_tip" style="display:none;">&nbsp;</div>
<script type="text/javascript">
function show_tip(o, i) {
if(i) {
var aTag = o; var leftpos = toppos = 0;
do {aTag = aTag.offsetParent; leftpos+= aTag.offsetLeft; toppos += aTag.offsetTop;
} while(aTag.offsetParent != null);
var X = o.offsetLeft + leftpos;
var Y = o.offsetTop + toppos + 30;
Dd('show_tip').style.left = X + 'px';
Dd('show_tip').style.top = Y + 'px';
Ds('show_tip');
Inner('show_tip', '<img src="'+i+'" onload="if(this.width>772){this.width=772;}Dd(\'show_tip\').style.width=this.width+\'px\';"/>');
} else {
Dh('show_tip');
}
}
$(function(){$('#type_<?php echo $typeid;?>').attr('class', 'side_on');});
</script>
<?php include template('footer');?>
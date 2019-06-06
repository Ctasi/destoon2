<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m m3 mt20">
<div class="m3l">
<div class="top-l">
<div class="headline">
<?php echo tag("moduleid=$moduleid&condition=status=3 and level=5&areaid=$cityid&order=".$MOD['order']."&pagesize=1&template=list-hl");?>
</div>
<div class="subline">
<?php echo tag("moduleid=$moduleid&condition=status=3 and level=1&areaid=$cityid&order=".$MOD['order']."&pagesize=5&target=_blank");?>
</div>
</div>
<div class="top-r">
<div class="headline">
<?php echo tag("moduleid=$moduleid&condition=status=3 and level=5&areaid=$cityid&order=".$MOD['order']."&pagesize=1&page=2&template=list-hl");?>
</div>
<div class="subline">
<?php echo tag("moduleid=$moduleid&condition=status=3 and level=1&areaid=$cityid&order=".$MOD['order']."&pagesize=5&page=2&target=_blank");?>
</div>
</div>
<div class="b16 c_b"></div>
<?php if($MOD['page_icat']) { ?>
<table cellpadding="0" cellspacing="0" width="100%">
<?php if(is_array($maincat)) { foreach($maincat as $i => $c) { ?>
<?php if($i%2==0) { ?><tr><?php } ?>
<td valign="top" width="430">
<div class="head-txt"><span><a href="<?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>">更多<i>&gt;</i></a></span><strong><?php echo $c['catname'];?></strong></div>
<div class="list-txt"><?php echo tag("moduleid=$moduleid&catid=".$c['catid']."&condition=status=3&areaid=$cityid&order=".$MOD['order']."&pagesize=".$MOD['page_icat']."&datetype=2&target=_blank");?></div>
</td>
<?php if($i%2==0) { ?><td>&nbsp;</td><?php } ?>
<?php if($i%2==1) { ?></tr><?php } ?>
<?php } } ?>
</table>
<?php } ?>
</div>
<div class="m3r">
<div class="head-sub"><span><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('product.php?page=1');?>">更多<i>&gt;</i></a></span><strong>产品报价</strong></div>
<?php $tags=tag("table=quote_product_$moduleid&condition=1&areaid=$cityid&pagesize=20&order=edittime desc&length=16&template=null");?>
<?php if($tags) { ?>
<table cellpadding="3" cellspacing="1" width="100%" bgcolor="#DDDDDD">
<tr bgcolor="#EEEEEE">
<th>品名</th>
<th width="80">价格</th>
<th width="30">单位</th>
<th width="60">报价数</th>
</tr>
</table>
<div id="products">
<table cellpadding="0" cellspacing="0" width="100%">
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<tr bgcolor="#FFFFFF" align="center">
<td><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('price.php?itemid='.$t['itemid']);?>" target="_blank" title="<?php echo $t['alt'];?>" class="b"><?php echo $t['title'];?></a></td>
<td<?php if($i==0) { ?> width="86"<?php } ?>><span class="f_red"><?php echo $DT['money_sign'];?><?php echo $t['price'];?></span></td>
<td<?php if($i==0) { ?> width="36"<?php } ?>><?php echo $t['unit'];?></td>
<td<?php if($i==0) { ?> width="65"<?php } ?>><?php echo $t['item'];?></td>
</tr>
<?php } } ?>
</table>
</div>
<div class="b10"></div>
<?php } ?>
<div class="head-sub"><strong>报价企业</strong></div>
<div class="list-txt">
<?php $tags=tag("table=quote_price_$moduleid&condition=username<>''&areaid=$cityid&pagesize=10&order=itemid desc&group=username&template=null");?>
<?php if($tags) { ?>
<ul>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li><span class="f_r"><?php echo area_pos($t['areaid'], '/', 1);?></span><a href="<?php echo userurl($t['username']);?>" target="_blank"><?php echo $t['company'];?></a></li>
<?php } } ?>
</ul>
<?php } ?>
</div>
<div class="head-sub"><strong>点击排行</strong></div>
<div class="list-rank"><?php echo tag("moduleid=$moduleid&condition=status=3 and addtime>$today_endtime-18000*86400&areaid=$cityid&order=hits desc&key=hits&pagesize=9&template=list-rank");?></div>
</div>
<div class="c_b"></div>
</div>
<?php echo load('marquee.js');?>
<script type="text/javascript">
new dmarquee(22, 20, 1000, 'products');
</script>
<?php include template('footer');?>
<?php defined('IN_DESTOON') or exit('Access Denied');?><div style='display:none' class="fiexd_nav g-dn float_nav" id="hyzd">
<div class="fd-header" id="fn_down_up"> </div>
<div class="fd-content" id="fn_body"> 
<ul>
<li class="hang"><a>楼层直达</a></li>
 <?php $mid=5?>
 <?php $child = get_maincat(0, $mid, 1);?>
 <?php if(is_array($child)) { foreach($child as $i => $c) { ?>
 <?php $kk=$i+1?>
 <?php if($i < 10) { ?> 
<li t="<?php echo $kk;?>" class="hang" style="display: list-item;"><div class="main_menuin_li"><a href="#<?php echo $kk;?>f" target="_self" title="<?php echo $c['catname'];?>"><?php echo $c['catname'];?></a></div></li>
<?php } ?>
 <?php } } ?>
<li class="line hang">line</li>
<li class="hang"><a href="#11f" target="_self" title="资讯快递">资讯快递</a></li>
<li class="hang"><a href="#12f" target="_self" title="友情链接">友情链接</a></li>
</ul>
</div>
<div class="fd-empty"> </div>
<div class="fd-footer" id="fn_up"><a class="show" href="javascript:" target="_self" title="收起">收起</a><a class="hid" target="_self" href="javascript:" title="展开">展开</a></div>
<!--div class="fd-top"><a href="#" target="_self" title="回到顶部">回到顶部</a></div-->
</div>
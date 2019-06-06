<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($share_icon == 'auto') { ?><div class="share_icon"><img src="<?php echo DT_PATH;?>apple-touch-icon-precomposed.png"/></div><?php } ?>
<?php if($foot) { ?>
<div class="foot-bar-fix"></div>
<div class="foot-bar">
<ul>
<li class="icon-home<?php if($foot=='home') { ?>-on<?php } ?>"><a href="<?php echo DT_MOB;?>" data-transition="none" data-ajax="false"><span>首页</span></a></li>
<li class="icon-channel<?php if($foot=='channel') { ?>-on<?php } ?>"><a href="<?php echo DT_MOB;?>channel.php" data-transition="none"><span>频道</span></a></li>
<li class="icon-my<?php if($foot=='my') { ?>-on<?php } ?>"><a href="<?php echo DT_MOB;?>my.php" data-transition="none"><span>我的</span></a><?php if($_message || $_chat || $_cart) { ?><em></em><?php } ?></li>
<li class="icon-more<?php if($foot=='more') { ?>-on<?php } ?>"><a href="<?php echo DT_MOB;?>more.php" data-transition="none"><span>更多</span></a></li>
</ul>
</div>
<?php } ?>
<?php if($DT_MOB['browser'] == 'weixin' || $DT_MOB['browser'] == 'qq') { ?>
<script type="text/javascript">
$(document).on('pageshow', function(event) {
$("[data-role='page']").each(function(i) {
if($(this).attr('class').indexOf('-active') != -1) {
$(this).find('.share_icon img').css('display', 'block');
} else {
$(this).find('.share_icon img').css('display', 'none');
}
});
});
</script>
<?php } ?>
</div>
</body>
</html>
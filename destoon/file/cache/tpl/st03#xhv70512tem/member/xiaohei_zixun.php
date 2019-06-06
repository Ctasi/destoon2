<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="zi"></div>
<div class="zixun" id="zixuns">
<strong class="px14"><a href="<?php echo $MODULE['2']['linkurl'];?>grade.php">付费会员优势</a></strong>
<ul>
<li>优势一：免审通道</a></li>
<li>优势二: 去第三方广告</a></li>
<li>优势三: 保证快速收录 </a></li>
<li>优势四: seo至尊网站样式  </a></li>
<li>优势五: 发布产品瞬间显示 </a></li>
<li>优势六: 百度效果巨大 </a></li>
</ul>
<div class="shengji"><a href="<?php echo $MODULE['2']['linkurl'];?>grade.php">了解更多</a></div>
<div class="dianhua">
<p class="dianhua_1">热线电话: <?php echo $DT['telephone'];?></p>
<p class="dianhua_1">客服QQ: <?php echo $DT['qq1'];?></p>
</div>
</div>
<script type="text/javascript">
//全站--悬浮右侧
$('.zixun').scrollToFixed({
marginTop: $('.zi').outerHeight(true) - 15,
limit: function() {
var limit = $('.other_item').offset().top ;
return limit;
},
minWidth: 1000,
zIndex: 999,
fixed: function() {  },
dontCheckForPositionFixedSupport: true
});
//右侧到位自动隐藏
function changeScreen() {
var itemTop = document.getElementById("other_item").offsetTop;
if ($(document).scrollTop() > itemTop - 0) {
$(".zixuns").hide();
} else if ($(window).width() < 1200) {
$(".zixuns").hide();
} else {
$(".zixuns").show();
}
}
$(window).scroll(function() {
changeScreen();
});
$(window).resize(function(e) {
changeScreen();
});
</script>
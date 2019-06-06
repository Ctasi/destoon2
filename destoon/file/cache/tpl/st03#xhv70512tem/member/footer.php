<?php defined('IN_DESTOON') or exit('Access Denied');?></td>
</tr>
</table>
</div>
<?php include template('qq', 'member');?>
<div class="work_footer">
<div>
    <ul class="work_footer-copyright">Copyright www.anxiety-info.net All Rights Reserved</ul>
    <ul class="work_footer-nav">
        <a href="<?php echo $MODULE['1']['linkurl'];?>" target="_blank">anxiety-info.net</a> <a href="<?php echo $MODULE['2']['linkurl'];?>grade.php" target="_blank"><?php echo VIP;?>服务</a> <a href="<?php echo $EXT['ad_url'];?>" target="_blank">广告服务</a> <a href="javascript:SendReport();">违规举报</a>  
    </ul>
    </div>
<?php if(DT_DEBUG) { ?><div><span class="px11"><?php echo debug();?></span></div><?php } ?>
</div>
<div class="other_item" id="other_item"></div>
<script type="text/javascript">
//全站--悬浮右侧
$('.menu').scrollToFixed({
marginTop: $('.ts').outerHeight(true) - 125,
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
$(".guess").hide();
} else if ($(window).width() < 1200) {
$(".guess").hide();
} else {
$(".guess").show();
}
}
$(window).scroll(function() {
changeScreen();
});
$(window).resize(function(e) {
changeScreen();
});
</script>
<script type="text/javascript">
$('.tb tr').find('>th:last').css('border-right', '#dedede 1px solid');
if(document.body.clientHeight > Dd('main').scrollHeight) Dd('main').style.height=document.body.clientHeight+'px';
if(get_cookie('m_side') == 11 && Dd('side_oh').className == 'side_h') {Dh('side');Dd('side_oh').className = 'side_s';}
var destoon_message = <?php echo $_message;?>;
var destoon_chat = <?php echo $_chat;?>;
<?php if($_message && $_sound) { ?>
if(window.location.href.indexOf('message.php') == -1) $('#destoon_space').html(sound('message_<?php echo $_sound;?>'));
<?php } ?>
<?php if($_chat) { ?>
if(window.location.href.indexOf('chat.php') == -1) $('#destoon_space').html(sound('chat_new'));
<?php } ?>
<?php if($_userid && $DT['pushtime']) { ?>
window.setInterval('PushNew()',<?php echo $DT['pushtime'];?>*1000);
<?php } ?>
</script>
</body>
</html>
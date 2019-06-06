<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($could_comment) { ?>
<?php if($EXT['comment_api'] == 'changyan') { ?>
<div id="comment_div">
<div class="head-txt">相关评论</div>
<div class="c_b" style="padding:0 15px 0 15px;">
<div id="SOHUCS" sid="<?php echo $moduleid;?>-<?php echo $itemid;?>"></div>
<script charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/changyan.js" ></script>
<script type="text/javascript">
window.changyan.api.config({
appid: '<?php echo $EXT['comment_api_id'];?>',
conf: '<?php echo $EXT['comment_api_key'];?>'
});
</script>
</div>
</div>
<?php } else if($EXT['comment_api'] == 'duoshuo') { ?>
<div id="comment_div">
<div class="head-txt">相关评论</div>
<div class="c_b" style="padding:10px 15px 10px 15px;">
<div class="ds-thread" data-thread-key="<?php echo $moduleid;?>-<?php echo $itemid;?>" data-title="<?php echo $title;?>" data-url="<?php echo $linkurl;?>" data-image="<?php if($thumb) { ?><?php echo str_replace('.thumb.'.file_ext($thumb), '', $thumb);?><?php } ?>"></div>
<script type="text/javascript">
var duoshuoQuery = {short_name:"<?php echo $EXT['comment_api_id'];?>"};
(function() {
var ds = document.createElement('script');
ds.type = 'text/javascript';ds.async = true;
ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
ds.charset = 'UTF-8';
(document.getElementsByTagName('head')[0] 
 || document.getElementsByTagName('body')[0]).appendChild(ds);
})();
</script>
</div>
</div>
<?php } else { ?>
<div id="comment_div" style="display:;">
<div class="head-txt"><span><a href="<?php echo $EXT['comment_url'];?><?php echo rewrite('index.php?mid='.$moduleid.'&itemid='.$itemid);?>"><b id="comment_count" class="px16 f_red">0</b> 条</a></span><strong>相关评论</strong></div>
<div class="c_b" id="comment_main"><div></div></div>
</div>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/comment.js"></script>
<?php } ?>
<?php } ?>
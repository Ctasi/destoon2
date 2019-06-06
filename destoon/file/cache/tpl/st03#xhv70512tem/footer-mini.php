<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="clear">
</div>
  <div class="footer">
        <div class="layout">
            <div class="f-btm">
                <div class="links">
  <?php echo tag("table=webpage&condition=item=1&areaid=$cityid&order=listorder desc,itemid desc&template=list-webpage");?> 
<a href="<?php echo $MODULE['1']['linkurl'];?>sitemap/">网站地图</a>
 | <a href="<?php echo $EXT['spread_url'];?>">排名推广</a> 
<?php if($EXT['ad_enable']) { ?> | <a href="<?php echo $EXT['ad_url'];?>">广告服务</a><?php } ?>
<?php if($EXT['gift_enable']) { ?> | <a href="<?php echo DT_PATH;?>gift/" target="_blank" rel="nofollow">积分商城</a><?php } ?>
 | <a href="javascript:SendReport();" rel="nofollow">违规举报</a>
 </div>
 
<div class="copyright">
<div id="copyright"><?php echo $DT['copyright'];?></div>
<?php if($DT['icpno']) { ?><div><a href="http://www.miibeian.gov.cn" target="_blank" rel="nofollow"><?php echo $DT['icpno'];?></a></div><?php } ?>
<?php if(DT_DEBUG) { ?><div><?php echo debug();?></div><?php } ?>
</div>
</div>
</div>
</div>
<?php include template('zxqq');?>
<?php include template('banquan');?>
<script type="text/javascript">
<?php if($destoon_task) { ?>
show_task('<?php echo $destoon_task;?>');
<?php } else { ?>
<?php include DT_ROOT.'/api/task.inc.php';?>
<?php } ?>
<?php if($lazy) { ?>$(function(){$("img").lazyload();});<?php } ?>
</script>
</body>
</html>
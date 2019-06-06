<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo DT_MOB;?>api/about.php?item=<?php echo $_item;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $title;?></div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="main">
<div class="content">
<?php if($islink) { ?>
<a href="<?php echo $linkurl;?>" rel="external" class="b"><?php echo $linkurl;?></a><br/>
<?php } else { ?>
<?php echo $content;?>
<?php } ?>
</div>
</div>
<?php include template('footer');?>
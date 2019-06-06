<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div class="dsn" id="pos_show"><a href="<?php echo $COM['linkurl'];?>">首页</a> <i>&gt;</i> 欢迎光临</div>
<?php if(is_array($HMAIN)) { foreach($HMAIN as $HM => $MAIN) { ?>
<?php include template('main_'.$main_file[$HM], $template);?>
<?php } } ?>
<?php include template('footer', $template);?>
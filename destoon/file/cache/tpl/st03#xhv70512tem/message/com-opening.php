<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m">
<div class="title bd-b">公司主页正在等待开通</div>
<div class="content t_c"><br/>
您正在访问的公司主页已经注册，将在所属公司完善详细资料后自动开通，请稍后访问...<br/>
<?php if($username == $_username) { ?>
系统检测到您为该公司所属会员，<a href="<?php echo $MODULE['2']['linkurl'];?>edit.php?tab=2" class="f_b">请点这里立即完善公司资料，激活公司主页</a><br/>
<?php } ?>
</div>
</div>
<?php include template('footer');?>
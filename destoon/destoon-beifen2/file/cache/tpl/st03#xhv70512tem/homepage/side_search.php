<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="side_head"><div><strong><?php echo $side_name[$HS];?></strong></div></div>
<div class="side_body">
<form action="<?php echo $MODULE['4']['linkurl'];?>home.php" onsubmit="return check_kw();">
<input type="hidden" name="action" value="search"/>
<input type="hidden" name="homepage" value="<?php echo $username;?>"/>
<input type="text" name="kw" value="<?php if($kw) { ?><?php echo $kw;?><?php } else { ?>输入关键词<?php } ?>" size="25" id="kw" class="inp" onfocus="if(this.value=='输入关键词')this.value='';"/>
<div style="padding:10px 0 0 0;">
<select name="file">
<?php if(is_array($MENU)) { foreach($MENU as $k => $v) { ?>
<?php if(in_array($menu_file[$k], array('sell', 'buy', 'news', 'credit', 'job', 'photo', 'info', 'brand', 'video', 'mall'))) { ?><option value="<?php echo $menu_file[$k];?>"<?php if($file==$menu_file[$k]) { ?> selected<?php } ?>><?php echo $v['name'];?></option><?php } ?>
<?php } } ?>
</select>&nbsp;
<input type="submit" value=" 搜 索 " class="sbm"/>
</div>
</form>
</div>
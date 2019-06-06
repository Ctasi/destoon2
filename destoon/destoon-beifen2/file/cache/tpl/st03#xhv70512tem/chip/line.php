<?php defined('IN_DESTOON') or exit('Access Denied');?>var destoon_userid = <?php echo $_userid;?>,destoon_username = '<?php echo $_username;?>',destoon_message = <?php echo $_message;?>,destoon_chat = <?php echo $_chat;?>,destoon_cart = get_cart(),destoon_member = destoon_guest = '';
<?php if($_userid) { ?>
destoon_member += '<img src="<?php echo DT_SKIN;?>image/ico-user.png" align="absmiddle"/><span class="f_b" title="<?php echo $MG['groupname'];?>"><?php echo $_truename;?></span> &nbsp;&nbsp; <a href="<?php echo $MODULE['2']['linkurl'];?>">管理入口</a> &nbsp;&nbsp; <a href="<?php echo $MODULE['2']['linkurl'];?>message.php">站内信(<span class="head_t" id="destoon_message"><?php if($_message) { ?><strong><?php echo $_message;?></strong><?php if($_sound) { ?>'+sound('message_<?php echo $_sound;?>')+'<?php } ?><?php } else { ?>0<?php } ?></span>)</a><?php if($DT['im_web']) { ?> &nbsp;&nbsp; <a href="<?php echo $MODULE['2']['linkurl'];?>im.php">新交谈(<span class="head_t" id="destoon_chat"><?php if($_chat) { ?><strong><?php echo $_chat;?></strong>'+sound('chat_new')+'<?php } else { ?>0<?php } ?></span>)</a><?php } ?> &nbsp;&nbsp; <a href="<?php echo $MODULE['2']['linkurl'];?>logout.php">退出登录</a>';
<?php } else { ?>
destoon_guest = '<img src="<?php echo DT_SKIN;?>image/ico-user.png" align="absmiddle"/><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_login'];?>">会员登录</a> &nbsp;&nbsp; <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_register'];?>">免费注册</a> &nbsp;&nbsp; <a href="<?php echo $MODULE['2']['linkurl'];?>send.php">忘记密码</a>';
<?php if($EXT['oauth']) { ?>
var oauth_site = '<?php echo get_cookie('oauth_site');?>';
var oauth_user = '<?php echo get_cookie('oauth_user');?>';
destoon_member += (oauth_user && oauth_site) ? '<img src="<?php echo DT_PATH;?>api/oauth/'+oauth_site+'/ico.png" align="absmiddle"/><strong>'+oauth_user+'</strong> &nbsp;&nbsp; <a href="<?php echo DT_PATH;?>api/oauth/'+oauth_site+'/index.php?time=<?php echo $DT_TIME;?>">绑定帐号</a> &nbsp;&nbsp; <a href="javascript:" onclick="oauth_logout();">退出登录</a>' : destoon_guest;
<?php } else { ?>
destoon_member += destoon_guest;
<?php } ?>
<?php } ?>
$('#destoon_member').html(destoon_member);
<?php if($DT['city']) { ?>
$('#destoon_city').html('<?php echo $city_name;?>');
<?php } ?>
<?php if($DT['max_cart']) { ?>
$('#destoon_cart').html(destoon_cart > 0 ? '<strong>'+destoon_cart+'</strong>' : 0);
<?php } ?>
<?php if($_message) { ?>
Dnotification('new_message', '<?php echo $MODULE['2']['linkurl'];?>message.php', '<?php echo useravatar($_username, 'large');?>', '站内信 (<?php echo $_message;?>)', '收到新的站内信件，点击查看');
<?php } ?>
<?php if($_chat) { ?>
Dnotification('new_chat', '<?php echo $MODULE['2']['linkurl'];?>im.php', '<?php echo useravatar($_username, 'large');?>', '新交谈 (<?php echo $_chat;?>)', '收到新的对话请求，点击交谈');
<?php } ?>
<?php if($_userid && $DT['pushtime']) { ?>window.setInterval('PushNew()',<?php echo $DT['pushtime'];?>*1000);<?php } ?>
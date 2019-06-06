<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="left-nav"> 
 <?php if($_userid) { ?>
  <!-- account message -->
  <div class="account clearfix">
    <div class="account-photo fl"><a href="avatar.php"><img src="<?php echo useravatar($_username, 'large');?>&time=<?php echo $DT_TIME;?>" title="<?php echo $_company;?>"></a></div>
    <div class="basic-message fl">
      <p class="company-name">
      <span class="f_r"><a href="edit.php"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/setting.gif" width="10" height="10" align="absmiddle" title="资料设置"/></a></span>
      <span class="f_b px14">欢迎，<?php echo $_truename;?></span> <br />
      (<?php echo $_username;?>) <a href="<?php echo $MODULE['2']['linkurl'];?>line.php" title="<?php if($_online) { ?>在线，点击隐身<?php } else { ?>隐身，点击上线<?php } ?>"><img src="<?php echo DT_SKIN;?>image/user_<?php if($_online) { ?>on<?php } else { ?>off<?php } ?>line.png" width="10" height="10" align="absmiddle"/></a> </p>
      <ul class="basic-message-list">
        <li class="basic-message-detail">
          <div class="menu-hd">
            <h4><a href="account.php">账户信息</a></h4>
            <i class="message-tip"></i></div>
          <div class="menu-bd hidden">
            <div class="message-menu clearfix">
              <h3>资金账号</h3>
              <div class="message-menu-list fund-account"> 
                <p onClick="Go('credit.php');">积分：<span class="orange"><?php echo $_credit;?></span>分 <?php if($MOD['credit_qd']) { ?><span class="f_r"><a href="credit.php?action=qiandao">签到赚积分</a></span><?php } ?></p>
                <p onClick="Go('record.php');">资金：<span class="orange"><?php echo $_money;?></span>元 <span class="f_r"><a href="charge.php?action=pay">充值</a></span></p>
                <p onClick="Go('message.php');">信件：<span class="orange"><?php echo $_message;?></span>封 <span class="f_r"><a href="message.php?action=send">发信件</a></span></p>
              </div>
            </div>
          </div>
        </li>
        <li class="basic-message-detail"> <a href="logout.php?forward=">退出</a> <?php if($admin_user) { ?>| <a href="index.php?action=logout" class=" f_red">注销授权</a><?php } ?></li>
      </ul>
    </div>
  </div>
  <?php } ?>
  <!-- member message -->
  <ul class="member">
  <?php if($_userid) { ?>
    <li>
      <p>会员ID号：<span><?php echo $_userid;?></span> </p>
      <span class="f_r f_red"><a href="account.php">账号详情</a></span>
    </li>
    <?php } ?>
    <li>
      <p>会员级别：<span><?php echo $MG['groupname'];?></span></p>
 </li>
 <?php if(!$_userid) { ?>
      <li>
      您还没有登录，建议您先 <a href="<?php echo $DT['file_login'];?>" class="f_b">登录</a > 或 <a href="<?php echo $DT['file_register'];?>" class="f_b">注册会员</a> 
       </li>
       <?php } ?>
  </ul>
  <!-- application -->
  <div class="application">
    <div class="nav-title apply-title"> <span class="title-tip"></span>
      <h3>基础应用</h3>
    </div>
    <dl>
<?php if($MYMODS) { ?>
<dt class="nav-dt nav-mes-dt"><span class="h0"></span><h4 class="appNav">信息管理</h4><i class="transform-tip"></i></dt>
<?php
//信息管理
$pageStyle_xxgl = @$_GET['mid']; 
if ($pageStyle_xxgl == "5"||$pageStyle_xxgl == "6"||$pageStyle_xxgl == "7"||$pageStyle_xxgl == "8"||$pageStyle_xxgl == "9"||$pageStyle_xxgl == "10"||$pageStyle_xxgl == "12"||$pageStyle_xxgl == "13"||$pageStyle_xxgl == "14"||$pageStyle_xxgl == "15"||$pageStyle_xxgl == "16"||$pageStyle_xxgl == "17"||$pageStyle_xxgl == "18"||$pageStyle_xxgl == "21"||$pageStyle_xxgl == "22"||$pageStyle_xxgl == "23"||$pageStyle_xxgl == "24"||$pageStyle_xxgl == "25"||$pageStyle_xxgl == "26"||$pageStyle_xxgl == "27"){
$pageStyle_xxgl="";
}else{
$pageStyle_xxgl="hidden";}
?>
      <dd class="<?php echo $pageStyle_xxgl;?>">
        <ul>
          <?php if(is_array($MENUMODS)) { foreach($MENUMODS as $k => $v) { ?>
          <?php if($v==9) { ?>
          <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="mid_job"><span class="f_r"><a href="<?php echo $DT['file_my'];?>?mid=9&action=add" class="m">发布</a></span><a href="<?php echo $DT['file_my'];?>?mid=9" class="<?php if(in_array($v, $MYMODS)) { ?>n<?php } else { ?>f<?php } ?>">招聘管理</a></li>
          <?php } else if($v==-9) { ?>
          <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="mid_resume"><span class="f_r"><a href="<?php echo $DT['file_my'];?>?mid=9&action=add&resume=1" class="m">创建</a></span><a href="<?php echo $DT['file_my'];?>?mid=9&resume=1" class="<?php if(in_array($v, $MYMODS)) { ?>n<?php } else { ?>f<?php } ?>">简历管理</a></li>
          <?php } else if($v==18) { ?>
          <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);"  id="mid_<?php echo $v;?>"><span class="f_r"><a href="<?php echo $DT['file_my'];?>?mid=<?php echo $v;?>&job=group&action=add" class="m">创建</a></span><a href="<?php echo $DT['file_my'];?>?mid=<?php echo $v;?>" class="<?php if(in_array($v, $MYMODS)) { ?>n<?php } else { ?>f<?php } ?>"><?php echo $MODULE[$v]['name'];?>管理</a></li>
          <?php } else { ?>
          <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);"  id="mid_<?php echo $v;?>"><span class="f_r"><a href="<?php echo $DT['file_my'];?>?mid=<?php echo $v;?>&action=add" class="m">发布</a></span><a href="<?php echo $DT['file_my'];?>?mid=<?php echo $v;?>" class="<?php if(in_array($v, $MYMODS)) { ?>n<?php } else { ?>f<?php } ?>"><?php echo $MODULE[$v]['name'];?>管理</a></li>
          <?php } ?>
          <?php } } ?>
        </ul>
      </dd>
      <?php } ?>
<?php if($_userid) { ?>
<dt class="nav-dt nav-sh-dt"><span class="h6"></span><h4 class="appNav">商户后台</h4><i class="transform-tip"></i></dt>
 <?php
 //商户后台
 $pageStyle_shht=$_SERVER['PHP_SELF'];
 if(stristr("$pageStyle_shht", "alert.php")){
 $pageStyle_shht="";
 }elseif(stristr("$pageStyle_shht", "trade.php")){
 $pageStyle_shht="";
 }elseif(stristr("$pageStyle_shht", "promo.php")){
 $pageStyle_shht="";
 }elseif(stristr("$pageStyle_shht", "group.php")){
 $pageStyle_shht="";
 }elseif(stristr("$pageStyle_shht", "deposit.php")){
 $pageStyle_shht="";
 }elseif(stristr("$pageStyle_shht", "sms.php")){
 $pageStyle_shht="";
 }elseif(stristr("$pageStyle_shht", "mail.php")){
 $pageStyle_shht="";
 }elseif(stristr("$pageStyle_shht", "spread.php")){
 $pageStyle_shht="";
 }elseif(stristr("$pageStyle_shht", "ad.php")){
 $pageStyle_shht="";
 }else{
 $pageStyle_shht="hidden";
 }
 ?>
      <dd class="<?php echo $pageStyle_shht;?>">
      <ul>
      <?php if($MG['trade_order']) { ?>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="trade"><span class="f_r"><a href="trade.php?action=express" class="m">快递</a></span><a href="trade.php" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>">订单管理</a></li>
      <?php } ?>
      <?php if($MG['group_order']) { ?>
      <?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?>
      <?php if($m['module'] == 'group') { ?>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="group-<?php echo $m['moduleid'];?>"><span class="f_r"><a href="group.php?mid=<?php echo $m['moduleid'];?>&action=express" class="m">快递</a></span><a href="group.php?mid=<?php echo $m['moduleid'];?>" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>"><?php echo $m['name'];?>订单</a></li>
      <?php } ?>
      <?php } } ?>
      <?php } ?>
      <?php if($MG['promo_limit']>-1) { ?>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="promo"><span class="f_r"><a href="promo.php?action=add" class="m">新增</a></span><a href="promo.php" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>">优惠促销</a></li>
      <?php } ?>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="deposit"><span class="f_r"><a href="deposit.php?action=add" class="m">增资</a></span><a href="deposit.php" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>">保 证 金</a></li>
      <?php if($MG['alert_limit']>-1) { ?>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="alert"><span class="f_r"><a href="alert.php?action=list" class="m">添加</a></span><a href="alert.php" class="<?php if($MG['alert_limit']>-1) { ?>n<?php } else { ?>f<?php } ?>">贸易提醒</a></li>
      <?php } ?>
      <?php if($MG['sms']) { ?>
      <?php if($DT['sms']) { ?><li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="sms"><span class="f_r"><a href="sms.php?action=buy" class="m">购买</a></span><a href="sms.php" class="<?php if($MG['sms']) { ?>n<?php } else { ?>f<?php } ?>">手机短信</a></li><?php } ?>
      <?php } ?>
      <?php if($MG['mail']) { ?>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="mail"><span class="f_r"><a href="mail.php?action=list" class="m">列表</a></span><a href="mail.php" class="<?php if($MG['mail']) { ?>n<?php } else { ?>f<?php } ?>">邮件订阅</a></li>
      <?php } ?>
      <?php if($MG['spread']) { ?>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="spread"><span class="f_r"><a href="spread.php?action=list" class="m">购买</a></span><a href="spread.php" class="<?php if($MG['spread']) { ?>n<?php } else { ?>f<?php } ?>">排名推广</a></li>
      <?php } ?>
      <?php if($MG['ad']) { ?>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="ad"><span class="f_r"><a href="ad.php?action=list" class="m">购买</a></span><a href="ad.php" class="<?php if($MG['ad']) { ?>n<?php } else { ?>f<?php } ?>">广告预定</a></li>
      <?php } ?>
        </ul>
      </dd>
      <?php } ?>
 <?php if($MG['homepage']) { ?>
 <?php
 //商铺管理
 $pageStyle_ypgl=$_SERVER['PHP_SELF'];
 if(stristr("$pageStyle_ypgl", "home.php")){
 $pageStyle_ypgl="";
 }elseif(stristr("$pageStyle_ypgl", "style.php")){
 $pageStyle_ypgl="";
 }elseif(stristr("$pageStyle_ypgl", "news.php")){
 $pageStyle_ypgl="";
 }elseif(stristr("$pageStyle_ypgl", "link.php")){
 $pageStyle_ypgl="";
 }elseif(stristr("$pageStyle_ypgl", "page.php")){
 $pageStyle_ypgl="";
 }elseif(stristr("$pageStyle_ypgl", "honor.php")){
 $pageStyle_ypgl="";
 }else{
 $pageStyle_ypgl="hidden";}
 ?>
      <dt class="nav-dt nav-store-dt"> <span class="h1"></span><h4 class="appNav">商铺管理</h4><i class="transform-tip"></i></dt>
      <dd class="<?php echo $pageStyle_ypgl;?>">
        <ul>
          <li class="pull-down "><a class="second-nav hover-class" href="home.php?action=1">商铺设置</a>
            <div class="third-nav clearfix">
            <a href="home.php?tab=2">基本设置</a>
            <a href="home.php?tab=0">菜单设置</a>
            <a href="home.php?tab=1">栏目设置</a>
            <a href="style.php?">模板设置</a>
            <a href="/index.php?homepage=<?php echo $_username;?>&update=1" target="homepage">更新主页</a>
            </div>
          </li>
          <li class="pull-down "> <a class="second-nav hover-class" href="home.php">店铺管理</a>
            <div class="third-nav clearfix">
            <a href="edit.php?tab=2">旺铺资料</a> 
            <a href="home.php?action=4">商铺设置</a>
            <a href="my.php?mid=12">公司相册</a> 
           <?php if(($MG['honor_limit']>-1 && $MG['homepage'])) { ?><a href="honor.php">荣誉资质</a> <?php } ?>
           <?php if(($MG['honor_limit']>-1 && $MG['homepage'])) { ?><a href="link.php">友情链接</a> <?php } ?>
           <?php if(($MG['news_limit']>-1 && $MG['homepage'])) { ?><a href="news.php">公司新闻</a><?php } ?>
           <?php if(($MG['page_limit']>-1 && $MG['homepage'])) { ?><a href="page.php">公司单页</a><?php } ?>
            </div>
          </li>
          <li ><a class="second-nav hover-class" href="home.php?tab=0">横幅管理</a></li>
        </ul>
      </dd>
      <?php } ?>
 <?php if($_userid) { ?>
 <?php
 //账号管理
 $pageStyle_zhgl=$_SERVER['PHP_SELF'];
 if(stristr("$pageStyle_zhgl", "edit.php")){
 $pageStyle_zhgl="";
 }elseif(stristr("$pageStyle_zhgl", "send.php")){
 $pageStyle_zhgl="";
 }elseif(stristr("$pageStyle_zhgl", "account.php")){
 $pageStyle_zhgl="";
 }else{
 $pageStyle_zhgl="hidden";}
 ?>
      <dt class="nav-dt nav-account-dt"><span class="h2"></span><h4 class="appNav">账号管理</h4><i class="transform-tip"></i></dt>
      <dd class="<?php echo $pageStyle_zhgl;?>">
        <ul>
          <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="edit"> <a class="m" href="edit.php?tab=0">个人资料</a> </li>
          <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);"> <a class="m" href="account.php">账号详情</a> </li>
          <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="send"> <a class="m" href="send.php">账号安全</a> </li>
          <li class="side_a"  onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="charge"> <a class="m" href="charge.php?action=record">充值记录</a> </li>
          <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="cash" > <a class="m" href="cash.php?action=index">申请提现</a> </li>
          <li class="side_a"  onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="address"> <a class="m" href="address.php?action=index">收货地址</a> </li>
          <li class="side_a"  onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="alert"> <a class="m" href="alert.php?action=index">提醒设定</a> </li>
          <li class="side_a"  onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="edit.php?tab=2"> <a class="m" href="edit.php?tab=2">公司资料</a> </li>
          <li class="side_a"  onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="edit.php?tab=3"> <a class="m" href="edit.php?tab=3">公司联系方式</a> </li>
          <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="edit.php?tab=4" > <a class="m" href="edit.php?tab=4">公司介绍</a> </li>
          <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="avatar"> <a class="m" href="avatar.php">头像设置</a> </li>
        </ul>
      </dd>
      <?php } ?>
      <?php if($_userid) { ?>
 <?php
 //交易管理
 $pageStyle_jygl= $_SERVER['PHP_SELF'];
 if(stristr("$pageStyle_jygl", "trade.php"))
 {$pageStyle_jygl="";
 }elseif(stristr("$pageStyle_jygl", "order.php"))
 {$pageStyle_jygl="";
 }elseif(stristr("$pageStyle_jygl", "record.php"))
 {$pageStyle_jygl="";
 }elseif(stristr("$pageStyle_jygl", "charge.php"))
 {$pageStyle_jygl="";
 }elseif(stristr("$pageStyle_jygl", "coupon.php"))
 {$pageStyle_jygl="";
 }elseif(stristr("$pageStyle_jygl", "deal.php"))
 {$pageStyle_jygl="";
 }elseif(stristr("$pageStyle_jygl", "cash.php"))
 {$pageStyle_jygl="";
 }elseif(stristr("$pageStyle_jygl", "credit.php"))
 {$pageStyle_jygl="";
 }elseif(stristr("$pageStyle_jygl", "address.php"))
 {$pageStyle_jygl="";
 }else{
 $pageStyle_jygl="hidden";}
 ?>
      <dt class="nav-dt nav-trade-dt"> <span class="h4"></span>
        <h4 class="appNav">交易管理</h4>
        <i class="transform-tip"></i> </dt>
      <dd class="<?php echo $pageStyle_jygl;?>">
        <ul>
        <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="order"><span class="f_r"><a href="order.php?action=express" class="m">快递</a></span><a href="order.php" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>">我的订单</a></li>
      <?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?>
      <?php if($m['module'] == 'group') { ?>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="deal-<?php echo $m['moduleid'];?>"><span class="f_r"><a href="deal.php?mid=<?php echo $m['moduleid'];?>&action=express" class="m">快递</a></span><a href="deal.php?mid=<?php echo $m['moduleid'];?>" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>">团购订单</a></li>
      <?php } ?>
      <?php } } ?>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="coupon"><span class="f_r"><a href="coupon.php?action=my" class="m">我的</a></span><a href="coupon.php" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>">领券中心</a></li>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="record"><span class="f_r"><a href="record.php?action=pay" class="m">站内</a></span><a href="record.php" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>"><?php echo $DT['money_name'];?>流水</a></li>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="charge"><span class="f_r"><a href="charge.php?action=pay" class="m">支付</a></span><a href="charge.php?action=record" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>">支付记录</a></li>
      <?php if($MG['cash']) { ?>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="cash"><span class="f_r"><a href="cash.php" class="m">提现</a></span><a href="cash.php?action=record" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>"><?php echo $DT['money_name'];?>提现</a></li>
      <?php } ?>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="credit"><span class="f_r"><a href="credit.php?action=buy" class="m">购买</a></span><a href="credit.php" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>"><?php echo $DT['credit_name'];?>管理</a></li>
      <?php if($MG['address_limit']>-1) { ?>
      <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="addr"><span class="f_r"><a href="address.php?action=add" class="m">添加</a></span><a href="address.php" class="<?php if($MG['address_limit']>-1) { ?>n<?php } else { ?>f<?php } ?>">收货地址</a></li>
      <?php } ?>
        </ul>
      </dd>
      <?php } ?>
    </dl>
     <?php if($_userid) { ?>
    <div class="nav-title increase-title"> <span class="title-tip"></span><h3>增值应用</h3></div>
    <dl>  
      <?php
//会员服务
$pageStyle_sjgl= $_SERVER['PHP_SELF'];
if(stristr("$pageStyle_sjgl", "message.php"))
{$pageStyle_sjgl="";
}elseif(stristr("$pageStyle_sjgl", "chat.php"))
{$pageStyle_sjgl="";
}elseif(stristr("$pageStyle_sjgl", "friend.php"))
{$pageStyle_sjgl="";
}elseif(stristr("$pageStyle_sjgl", "favorite.php"))
{$pageStyle_sjgl="";
}elseif(stristr("$pageStyle_sjgl", "alert.php"))
{$pageStyle_sjgl="";
}elseif(stristr("$pageStyle_sjgl", "sms.php"))
{$pageStyle_sjgl="";
}elseif(stristr("$pageStyle_sjgl", "mail.php"))
{$pageStyle_sjgl="";
}elseif(stristr("$pageStyle_sjgl", "spread.php"))
{$pageStyle_sjgl="";
}elseif(stristr("$pageStyle_sjgl", "ad.php"))
{$pageStyle_sjgl="";
}elseif(stristr("$pageStyle_sjgl", "oauth.php"))
{$pageStyle_sjgl="";
}elseif(stristr("$pageStyle_sjgl", "weixin.php"))
{$pageStyle_sjgl="";
}elseif(stristr("$pageStyle_sjgl", "avatar.php"))
{$pageStyle_sjgl="";
}elseif(stristr("$pageStyle_sjgl", "ask.php"))
{$pageStyle_sjgl="";
}else{
$pageStyle_sjgl="hidden";}
?>
      <dt class="nav-dt nav-bus-dt"><span class="h3"></span><h4 class="appNav">会员服务</h4><i class="transform-tip"></i></dt>
      <dd class="<?php echo $pageStyle_sjgl;?>">
        <ul>
          <?php if($MG['inbox_limit']>-1) { ?>
              <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="message"><span class="f_r"><a href="message.php?action=send" class="m">发信</a></span><a href="message.php" class="<?php if($MG['inbox_limit']>-1) { ?>n<?php } else { ?>f<?php } ?>">站内信件</a><?php if($_message) { ?><em><?php echo $_message;?></em><?php } ?></li>
              <?php } ?>
              
              <?php if($MG['chat']) { ?>
              <?php if($DT['im_web']) { ?>
              <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="chats"><span class="f_r"><a href="chat.php?action=add" class="m">查看</a></span><a href="chat.php" class="<?php if($MG['inbox_limit']>-1) { ?>n<?php } else { ?>f<?php } ?>">站内交谈</a><?php if($_chat) { ?><em><?php echo $_chat;?></em><?php } ?></li>
              <?php } ?>
              <?php } ?>
              
              <?php if($MG['friend_limit']>-1) { ?>
              <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="friend"><span class="f_r"><a href="friend.php?action=add" class="m">添加</a></span><a href="friend.php" class="<?php if($MG['friend_limit']>-1) { ?>n<?php } else { ?>f<?php } ?>">我的商友</a></li>
              <?php } ?>
              
              <?php if($MG['favorite_limit']>-1) { ?>
              <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="favorite"><span class="f_r"><a href="favorite.php?action=add" class="m">添加</a></span><a href="favorite.php" class="<?php if($MG['favorite_limit']>-1) { ?>n<?php } else { ?>f<?php } ?>">商机收藏</a></li>
              <?php } ?>
              
              <?php if($MG['alert_limit']>-1) { ?>
              <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="alert"><span class="f_r"><a href="alert.php?action=add" class="m">添加</a></span><a href="alert.php" class="<?php if($MG['alert_limit']>-1) { ?>n<?php } else { ?>f<?php } ?>">贸易提醒</a></li>
              <?php } ?>
              
              <?php if($MG['sms']) { ?>
              <?php if($DT['sms']) { ?>
              <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="sms"><span class="f_r"><a href="sms.php?action=add" class="m">发送</a></span><a href="sms.php" class="<?php if($MG['sms']) { ?>n<?php } else { ?>f<?php } ?>">手机短信</a></li>
              <?php } ?>
              <?php } ?>
              
              <?php if($MG['mail']) { ?>
              <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="mail"><span class="f_r"><a href="sendmail.php" class="m">电邮</a></span><a href="mail.php" class="<?php if($MG['mail']) { ?>n<?php } else { ?>f<?php } ?>">邮件订阅</a></li>
              <?php } ?>
              <?php if($MG['spread']) { ?>
              <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="spread"><span class="f_r"><a href="spread.php?action=add" class="m">购买</a></span><a href="spread.php" class="<?php if($MG['spread']) { ?>n<?php } else { ?>f<?php } ?>">排名推广</a></li>
              <?php } ?>
              <?php if($MG['ad']) { ?>
              <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="ad"><span class="f_r"><a href="ad.php?action=add" class="m">购买</a></span><a href="ad.php" class="<?php if($MG['ad']) { ?>n<?php } else { ?>f<?php } ?>">广告预定</a></li>
              <?php } ?>
              <?php if($show_oauth) { ?>
              <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="oauth"><span class="f_r"><a href="oauth.php" class="m">绑定</a></span><a href="oauth.php" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>">一键登录</a></li>
              <?php } ?>
              <?php if($EXT['weixin']) { ?>
              <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="weixin"><span class="f_r"><a href="weixin.php" class="m">绑定</a></span><a href="weixin.php" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>">微信关注</a></li>
              <?php } ?>
              <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="edit"><span class="f_r"><a href="edit.php?tab=1p" class="m">密码</a></span><a href="edit.php" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>">修改资料</a></li>
              <?php if($MG['ask']) { ?>
              <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="ask"><span class="f_r"><a href="ask.php?action=add" class="m">提问</a></span><a href="ask.php" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>">客服中心</a></li>
              <?php } ?>
        
        </ul>
      </dd>
    </dl>
     <dl>
 <?php
 //扩展项目
 $pageStyle_qd=$_SERVER['PHP_SELF'];
 if(stristr("$pageStyle_qd", "qiandao.php"))
 {$pageStyle_qd="";
 }else{
 $pageStyle_qd="hidden";
 }
 ?>
      <dt class="nav-dt nav-ev-dt"><span class="h5"></span><h4 class="appNav">扩展项目</h4><i class="transform-tip"></i></dt>
      <dd class="<?php echo $pageStyle_qd;?>">
        <ul>
             <?php if($MOD['credit_qd']) { ?>
              <li class="side_a" onMouseOver="v(this.id);" onMouseOut="t(this.id);" id="credit"><span class="f_r"><a href="credit.php?action=qiandao" class="m">查看</a></span><a href="qiandao.php" class="<?php if($_userid) { ?>n<?php } else { ?>f<?php } ?>" target="_blank">每日签到</a></li>
              <?php } ?>
      
        </ul>
      </dd>
    </dl>
 <?php } ?>
  </div>
</div>
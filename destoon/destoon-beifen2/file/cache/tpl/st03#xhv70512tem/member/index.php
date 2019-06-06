<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $index=1;?>
<?php include template('header', 'member');?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/index.css"/>
<style type="text/css">
.content{padding:0;}
.wrap-infor {border: 0}
span.sqb_02 {display: inline-block;width: 20px;height: 20px;background: url('<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/ico_member.gif');background-repeat: no-repeat;background-position: 2px;vertical-align: top;float: left;}
</style>
<div class="wrap-content fl">
  <div class="content">
    <div id="warn"> <?php if($_groupid == 4) { ?>
      <div class="warn">尊敬的会员，您的帐号<span class="f_red">正在审核中..</span>，本站部分功能和服务可能受到一定的使用限制，<?php if($MOD['checkuser']==2) { ?><a href="send.php?action=check" class="l">请点这里验证您的邮箱</a>，系统将自动审核<?php } else { ?>请稍候，等待网站审核<br/>
        完善的商业信息有助于获得别人的信任，结交潜在的商业伙伴，获取商业机会，增加系统审核通过的概率&nbsp;&nbsp;<a href="edit.php?tab=2" class="t">现在就去完善&raquo;</a><?php } ?></div>
      <?php } ?>
      <?php if($_groupid > 5 && !$_edittime) { ?>
      <div class="warn">贵公司尚未完善详细资料！完善的商业信息有助于获得别人的信任，结交潜在的商业伙伴，获取商业机会&nbsp;&nbsp;<a href="edit.php?tab=2" class="t">现在就去完善&raquo;</a></div>
      <?php } ?>
      <?php if($vip && $havedays < 30 && $havedays > 0) { ?>
      <div class="warn">尊敬的<?php echo $MG['groupname'];?>，您的<?php echo VIP;?>服务将在 <strong class="f_red"><?php echo $havedays;?></strong> 天后到期，为了不影响您的正常使用，请您尽快续费&nbsp;&nbsp;<a href="vip.php?action=renew" class="t">立即续费&raquo;</a></div>
      <?php } ?> </div>
    <div class="wrap-notice">
      <div class="notice-title">
        <h3 class="fl"><strong class="px16" ><a href="<?php echo userurl($_username);?>" target="_blank"><?php echo $_company;?></a></strong></h3>
        <span class="fr"><em><a href="profile.php" class="t px11">账户详情>></a></em></span> </div>
      <ul class="notice-list">
        <li class="first"><a href="<?php echo userurl($username);?>" target="_blank"><span style="color:#FF0000">热烈欢迎<<?php echo $_company;?>>入驻本站</span></a></li>
      </ul>
    </div>
    <!-- 首页账户信息列表 -->
    <div class="wrap-account-list" style="margin-top:20px;">
      <div class="spread-tip spread"><i class="triangle-tip"><span></span></i></div>
      <script>
    $(function(){
$(".spread-tip").on("click",function(){
    $(this).toggleClass("spread").toggleClass("packup");
$(".spread-line").toggleClass("hidden");
});
$(".spread-tip").click();
});
    </script>
      <ul class="account-list">
        <li class="account-line"> <em class="list-tip tip2"></em>
          <div class="list-line"> <span class="list-name">信件：</span>
            <p class="account-number"><b><?php echo $_message;?></b>封<a href="message.php">未读站内信</a></p>
            <p class="account-operate"> <a href="message.php?typeid=1">询价</a>| <a href="message.php?typeid=2">报价</a>| <a href="message.php?typeid=3">留言</a>| <a href="message.php?typeid=4">信使</a>| <a href="message.php?action=send">发信</a> </p>
          </div>
        </li>
        <!--积分-->
        <li class="account-line"> <em class="list-tip tip3"></em>
          <div class="list-line"> <span class="list-name">积分：</span>
            <p class="account-number"><b><?php echo $_credit;?></b></p>
            <p class="account-operate"> <a href="credit.php">积分记录</a>| <a href="credit.php?action=buy">购买积分</a>| <a href="credit.php?action=invite">推广赚积分</a> </p>
          </div>
        </li>
        <!--资金-->
        <li class="account-line spread-line hidden"> <span class="sqb_02"></span>
          <div class="list-line"> <span class="list-name">资金：</span>
            <p class="account-number"> <b><?php echo $_money;?></b> </p>
            <p class="account-number"> <a href="deposit.php">&nbsp;&nbsp;保证金: <b><?php echo $deposit;?></b></a></p>
            <?php if($DT['sms'] && $MG['sms']) { ?>
            &nbsp;&nbsp;
            <p class="account-number"> <a href="sms.php">短信余额:<b><?php echo $_sms;?></b></a></p>
            <?php } ?>
            <p class="account-operate"> <a href="record.php">资金流水</a>| <a href="trade.php?action=pay">付款</a>| <a href="charge.php?action=pay">在线充值</a> </p>
          </div>
        </li>
        <li class="account-line spread-line hidden"> <em class="list-tip tip5"></em>
          <div class="list-line"> <span class="list-name">销售（买、卖）：</span>
          <?php if(isset($MODULE['16'])) { ?>
<p class="account-number"><a href="<?php echo $MODULE['16']['linkurl'];?>cart.php">购物车: <b><script type="text/javascript">document.write(get_cart());</script></b></a>&nbsp;&nbsp;</p>
<?php } ?>
            <p class="account-number"><b>订单：<?php echo $trade;?></b></p>
            <p class="account-operate"> <a href="trade.php?action=myorder"><?php echo $MODULE['17']['name'];?>订单</a>| <a href="trade.php">收到的订单（卖）</a>| <a href="trade.php?action=order">发出的订单（买）</a> </p>
          </div>
        </li>
        
      </ul>
    </div>
    <div class="ihead"> <strong>系统消息</strong> </div>
    <div class="ibody">
      <div class="isys">
        <ul>
          <?php if($sys) { ?>
          <?php if(is_array($sys)) { foreach($sys as $v) { ?>
          <li><span class="f_r px11 f_gray"><?php echo timetodate($v['addtime'], 3);?></span>&nbsp;<a href="message.php?action=show&itemid=<?php echo $v['itemid'];?>" title="<?php echo $v['title'];?>" class="l"><?php echo $v['title'];?></a></li>
          <?php } } ?>
          <?php } else { ?>
          <li>&nbsp;暂无消息</li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <div class="wrap-common-list"> 
      <!-- 常见应用 -->
      <div class="common-apply" style="background-color: #fffded;border: 1px solid #ffbf7a; margin-bottom: 10px;color:#ff7200; ">
        <h3 style="padding: 5px">我的产品（供应）状态：</h3>
        <ul>
          <li class="common-apply-zt"><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=5">已上线（<font class="f_red"><?php echo $db->count($DT_PRE.'sell_5', 'status=3 and username="'.$_username.'"', 1800);?></font>）</a></li>
          <li class="common-apply-zt"> <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=5&status=2">审核中（<font class="f_red"><?php echo $db->count($DT_PRE.'sell_5', 'status=2 and username="'.$_username.'"', 1800);?></font>）</a> </li>
          <li class="common-apply-zt"> <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=5&status=1">审核拒绝（<font class="f_red"><?php echo $db->count($DT_PRE.'sell_5', 'status=1 and username="'.$_username.'"', 1800);?></font>）</a> </li>
          <li class="common-apply-zt"> <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=5&status=4">已下线（<font class="f_red"><?php echo $db->count($DT_PRE.'sell_5', 'status=4 and username="'.$_username.'"', 1800);?></font>）</a> </li>
        </ul>
      </div>
      <div class="common-apply">
        <div class="common-apply-title fl">
          <ul>
            <li>常</li>
            <li>见</li>
            <li>应</li>
            <li>用</li>
          </ul>
        </div>
        <div class="common-apply-list fl"> <a href="<?php echo $DT['file_my'];?>?mid=5&action=add" class="apply-tip apply-tip1"><em></em><span>发产品</span></a> <a href="home.php?tab=1" class="apply-tip apply-tip2"><em></em><span>旺铺设置</span></a> 
          <!-- <a href="" class="apply-tip apply-tip3"> --> 
          <a class="apply-tip apply-tip3" href="spread.php"><em></em><span>营销推广</span></a> <a href="message.php" class="apply-tip apply-tip4"><em></em><span>留言</span></a> </div>
      </div>
      <!-- 三网合一 -->
      <div class="common-apply" style="position: relative; top: -1px;">
        <div class="common-apply-title fl">
          <ul>
            <li>三</li>
            <li>网</li>
            <li>合</li>
            <li>一</li>
          </ul>
        </div>
        <div class="common-apply-list fl"> <a href="<?php if($homepage) { ?><?php echo $homepage;?><?php } else { ?><?php echo $linkurl;?><?php } ?>" target="_blank" class="apply-tip apply-tip5"><em></em><span>企业官网</span></a> <a href="<?php echo userurl($_username);?>" target="_blank" class="apply-tip apply-tip6"><em></em><span>本站旺铺</span></a>  <a href="javascript:;" class="apply-tip apply-tip8" onclick="document.getElementById('divwap').style.display=(document.getElementById('divwap').style.display=='none')?'':'none'"><em></em><span>手机旺铺</span></a> <a class="apply-tip"><em></em><span></span></a> </div>
              </div>
        <div class="tiele_ewm" id="divwap" style="display:none"><b class="px18"><?php echo $company;?></b><div class="ewm_none"><p>扫描商铺二维码</p><img src="<?php echo DT_PATH;?>api/qrcode.png.php?auth=<?php echo userurl($_username);?>" width="150" height="150" alt="<?php echo $_company;?>二维码"></div>
    </div>
    </div>
    <div class="ihead"> <strong>商务便笺</strong> </div>
    <div class="ibody">
      <div class="inote">
        <form method="post" action="index.php" onsubmit="return check();">
          <table cellspacing="2" cellpadding="2" width="100%">
            <tr>
              <td colspan="2"><textarea name="note" id="note"><?php echo $note;?></textarea></td>
            </tr>
             <tr>
              <td height="10"></td>
            </tr>
            <tr>
              <td width="80"><input type="submit" name="submit" value=" 更 新 " class="btn_g"/></td>
              <td class="f_gray">[可记录一些文字备忘，限5000字]</td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <!-- 最新供应 -->
    <div class="wrap-trade">
      <div class="trade-title">
        <h3 class="fl"><a href="<?php echo $DT['file_my'];?>?mid=5" target="_blank">我的供应</a></h3>
        <div class="more-trade fr"> <a href="<?php echo $DT['file_my'];?>?mid=5" target="_blank" class="fl"><span><i class="m-text">更多></i></span></a> </div>
      </div>
      <div class="trade-list">
        <div class="text"> 
          <?php $tags=tag("moduleid=5&condition=status=3 and username='".$username."'&areaid=$cityid&pagesize=5&order=addtime desc&template=null")?>
          <ul>
            <?php if(is_array($tags)) { foreach($tags as $t) { ?>
            <li><a href="<?php echo $t['linkurl'];?>" target="_blank" ><?php echo $t['title'];?></a></li>
            <?php } } ?>
          </ul>
        </div>
      </div>
    </div>
    <!-- 最新求购 -->
    <div class="wrap-trade">
      <div class="trade-title">
        <h3 class="fl"><a href="<?php echo $DT['file_my'];?>?mid=6" target="_blank">我的采购</a></h3>
        <div class="more-trade fr"> <a href="<?php echo $DT['file_my'];?>?mid=6" target="_blank" class="fl"><span><i class="m-text">更多></i></span></a> </div>
      </div>
      <div class="trade-list">
        <div class="text"> 
          <?php $tags=tag("moduleid=6&condition=status=3 and username='".$username."'&areaid=$cityid&pagesize=5&order=addtime desc&template=null")?>
          <ul>
            <?php if(is_array($tags)) { foreach($tags as $t) { ?>
            <li><a href="<?php echo $t['linkurl'];?>" target="_blank" ><?php echo $t['title'];?></a></li>
            <?php } } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="right-content fr"> 
 <?php if($MOD['credit_qd']) { ?>
   <?php include template('qiandaomini', $module);?>
   <?php } ?>
  <!-- 公告 -->
  <div class="wrap-notice">
    <div class="notice-title">
      <h3 class="fl">公告：</h3>
      <?php $week = array('日','一','二','三','四','五','六');?>
      <?php $weeks = date('w');?>
      <span class="fr"><em>周<?php echo $week[$weeks];?></em><em><?php echo date('n月j日');?></em></span> </div>
<?php $tags = tag("table=announce&condition=totime=0 or totime>$today_endtime-86400&areaid=$cityid&pagesize=1&length=27&datetype=2&order=listorder desc,addtime desc&target=_blank&template=null");?>
    <ul class="notice-list">
      <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
      <li class="first"><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></li>
      <?php } } ?>
    </ul>
  </div>
  <!-- 公告 -->
  <div class="wrap-notice" style="margin-top:20px;">
    <div class="notice-title">
      <h3 class="fl">
        <p class="f_b px14">账户余额</p>
      </h3>
    </div>
    <div class="iuser_money" style="padding-left:10px;"> <span class="my_money"><?php echo $DT['money_sign'];?><?php echo $my_money;?></span> <?php echo $DT['money_unit'];?>
      &nbsp;&nbsp; <a href="record.php" class="t">流水</a> <span class="f_gray">&nbsp;|&nbsp;</span> <a href="cash.php" class="t">提现</a> <span class="f_gray">&nbsp;|&nbsp;</span> <a href="charge.php?action=pay" target="_blank"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/btn_charge.gif" width="40" height="18" alt="" align="absmiddle"/></a> </div>
  </div>
  <!-- 搜索排名 -->
  <?php if(!$vip) { ?>
  <ul class="search-list">
    <!-- <li class="slist1"><span></span><a href="##">搜索排名系数</a></li> -->
    <li class="slist3"><span></span><a href="grade.php" target="_blank">开通<?php echo VIP;?>会员</a></li>
  </ul>
  <?php } ?>
  <!--最新产品-->
  <div class="wrap-notice wrap-infor">
    <div class="notice-title">
      <h3>推荐产品：</h3>
    </div>
    <?php $tags = tag("moduleid=5&condition=status=3 and level>0&group=username&areaid=$cityid&pagesize=8&length=36&datetype=2&order=addtime desc&target=_blank&template=null");?>
    <ul class="notice-list">
      <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
      <li <?php if($k==7) { ?>class="last"<?php } ?>><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></li>
      <?php } } ?>
    </ul>
  </div>
  <!--最新采购-->
  <div class="wrap-notice wrap-infor">
    <div class="notice-title">
      <h3>推荐采购：</h3>
    </div>
    <?php $tags = tag("moduleid=6&condition=status=3 and level>0&group=username&areaid=$cityid&pagesize=8&length=36&datetype=2&order=addtime desc&target=_blank&template=null");?>
    <ul class="notice-list">
      <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
      <li <?php if($k==7) { ?>class="last"<?php } ?>><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></li>
      <?php } } ?>
    </ul>
  </div>
  <!--最新资讯-->
  <div class="wrap-notice wrap-infor">
    <div class="notice-title">
      <h3>推荐资讯：</h3>
    </div>
    <?php $tags = tag("moduleid=21&condition=status=3 and level>0&areaid=$cityid&pagesize=8&length=36&datetype=2&order=addtime desc&target=_blank&template=null");?>
    <ul class="notice-list">
      <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
      <li <?php if($k==7) { ?>class="last"<?php } ?>><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></li>
      <?php } } ?>
    </ul>
  </div>
</div>
</div>
</div>
<?php include template('footer', 'member');?>
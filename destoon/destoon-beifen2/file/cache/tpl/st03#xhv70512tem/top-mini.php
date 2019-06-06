<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="topbar" id="topbar">
  <div class="toptab">
  <?php if($DT['city']) { ?>
  <ul class="greet">
      <li>[<span id="destoon_city"><?php echo $city_name;?></span>] <a href="<?php echo DT_PATH;?>api/city.php" title="点击切换城市" rel="nofollow">切换</a></li>
      <i class="line"></i>
    </ul>
   <?php } ?> 
   <?php if($EXT['mobile_enable']) { ?>
    <ul class="greet">
      <li><i class="mobile"></i><a href="javascript:Dmobile();">手机版</a></li>
      <i class="line"></i>
    </ul>
    <?php } ?> 
    <?php if($head_mobile) { ?>
    <ul class="greet">
      <li><i class="qrcode"></i><a href="javascript:Dqrcode();">二维码</a></li>
      <i class="line"></i>
    </ul>
    <?php } ?>
    <?php if(isset($MODULE['16'])) { ?>
     <ul class="greet">
      <li><i class="h_cart"></i><a href="<?php echo $MODULE['2']['linkurl'];?>cart.php" rel="nofollow">购物车</a>(<span class="head_t" id="destoon_cart">0</span>)</li>
      <i class="line"></i>
    </ul><?php } ?>
    <ul class="greet us" id="destoon_member"></ul>
    <div class="site-nav nounder">
      <ul class="quick-menu">
        <li class="myxiaohei menu-item">
          <div class="menu"> <a class="menu-hd" href="<?php echo $MODULE['2']['linkurl'];?>" target="_top" rel="nofollow">我的贸易<b></b></a>
            <div class="menu-bd">
              <div class="menu-bd-panel">
                <dl>
                  <dt> 供应商</dt>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=5&action=add" target="_blank" rel="nofollow"> 发布产品</a></dd>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=5" target="_blank" rel="nofollow"> 产品管理</a></dd>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?>home.php" target="_blank" rel="nofollow"> 管理商铺</a></dd>
                </dl>
                <dl>
                  <dt> 采购商</dt>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=6&action=add" target="_blank" rel="nofollow"> 发布采购</a></dd>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=6" target="_blank" rel="nofollow"> 采购清单</a></dd>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?>message.php?action=inbox&typeid=1" target="_blank" rel="nofollow"> 询价信息</a></dd>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?>favorite.php" target="_blank" rel="nofollow"> 收藏管理</a></dd>
                </dl>
                <dl>
                  <dt> 服务</dt>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=6&action=add" target="_blank" rel="nofollow"> 委托代购</a></dd>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=6" target="_blank" rel="nofollow"> 应用工具</a></dd>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?>ad.php" target="_blank" rel="nofollow"> 广告推广</a></dd>
                  <dd> <a href="<?php echo $MODULE['1']['linkurl'];?>spread/" target="_blank" rel="nofollow"> 排名推广</a></dd>
                </dl>
              </div>
            </div>
          </div>
        </li>
        <li class="services menu-item">
          <div class="menu"> <a class="menu-hd" href="<?php echo $MODULE['2']['linkurl'];?>grade.php" target="_top" rel="nofollow"><?php echo VIP;?>服务<b></b></a>
            <div class="menu-bd">
              <div class="menu-bd-panel">
                <dl>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?>grade.php" target="_blank" rel="nofollow"> 了解咨询</a></dd>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?>grade.php" rel="nofollow">服务特权</a></dd>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?>grade.php" target="_blank" rel="nofollow"> 新会员申请</a></dd>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?>grade.php" target="_blank" rel="nofollow"> 老会员续费</a></dd>
                  <dd> <a href="<?php echo $MODULE['2']['linkurl'];?>grade.php" target="_blank" rel="nofollow"> 优惠活动</a></dd>
                  <dd> <a href="<?php echo $MODULE['1']['linkurl'];?>gift/" target="_blank" rel="nofollow"> 积分商城</a></dd>
                </dl>
              </div>
            </div>
          </div>
        </li>
        <li class="rdhelp menu-item">
          <div class="menu"> <a class="menu-hd" href="<?php echo $MODULE['23']['linkurl'];?>" target="_top" rel="nofollow">帮助中心<b></b></a>
            <div class="menu-bd">
              <div class="menu-bd-panel">
                <dl>
                  <dd> <a href="<?php echo $MODULE['23']['linkurl'];?>" target="_blank" rel="nofollow"> 新手指南</a></dd>
                  <dd> <a href="<?php echo $MODULE['23']['linkurl'];?>" target="_blank" rel="nofollow">采购帮助</a></dd>
                  <dd> <a href="<?php echo $MODULE['23']['linkurl'];?>" target="_blank" rel="nofollow"> 供应帮助</a></dd>
                  <dd> <a href="<?php echo $EXT['guestbook_url'];?>" target="_blank" rel="nofollow"> 联系客服</a></dd>
                </dl>
              </div>
            </div>
          </div>
        </li>
        <li class="rdhelp menu-item">
          <div class="menu"> <a class="menu-hd" href="<?php echo $MODULE['1']['linkurl'];?>sitemap/" target="_top" rel="nofollow">更多频道<b></b></a>
            <div class="menu-bd dh1">
              <div class="menu-bd-panel">
                <dl>
                  <dd><a href="<?php echo DT_PATH;?>" rel="nofollow">首页</a> </dd>
                <?php if(isset($MODULE['5'])) { ?><dd><a href="<?php echo $MODULE['5']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['5']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['6'])) { ?><dd><a href="<?php echo $MODULE['6']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['6']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['7'])) { ?><dd><a href="<?php echo $MODULE['7']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['7']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['8'])) { ?><dd><a href="<?php echo $MODULE['8']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['8']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['9'])) { ?><dd><a href="<?php echo $MODULE['9']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['9']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['10'])) { ?><dd><a href="<?php echo $MODULE['10']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['10']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['11'])) { ?><dd><a href="<?php echo $MODULE['11']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['11']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['12'])) { ?><dd><a href="<?php echo $MODULE['12']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['12']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['13'])) { ?><dd><a href="<?php echo $MODULE['13']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['13']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['14'])) { ?><dd><a href="<?php echo $MODULE['14']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['14']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['15'])) { ?><dd><a href="<?php echo $MODULE['15']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['15']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['16'])) { ?><dd><a href="<?php echo $MODULE['16']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['16']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['17'])) { ?><dd><a href="<?php echo $MODULE['17']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['17']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['18'])) { ?><dd><a href="<?php echo $MODULE['18']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['18']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['21'])) { ?><dd><a href="<?php echo $MODULE['21']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['21']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['22'])) { ?><dd><a href="<?php echo $MODULE['22']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['22']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['23'])) { ?><dd><a href="<?php echo $MODULE['23']['linkurl'];?>"  target="_blank" rel="nofollow"><?php echo $MODULE['23']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['24'])) { ?><dd><a href="<?php echo $MODULE['24']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['24']['name'];?></a></dd><?php } ?>
<?php if(isset($MODULE['27'])) { ?><dd><a href="<?php echo $MODULE['27']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['27']['name'];?></a></dd><?php } ?>
<dd><a href="<?php echo $MODULE['4']['linkurl'];?>" target="_blank" rel="nofollow"><?php echo $MODULE['4']['name'];?></a></dd>
                </dl>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>